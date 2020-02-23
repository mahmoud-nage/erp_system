<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\StudentAffairs\Level;
use App\StudentAffairs\Stage;
use App\StudentAffairs\Parentt;
use App\StudentAffairs\Student;
use App\StudentAffairs\AcademicYear;

class StudentController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      // return $dataTable->render('studentAffairs\admin\all');
      $records = Student::paginate(10);
      return view('studentAffairs\student\all', compact('records'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $record = new Student();
    return view('studentAffairs\student\create&edit_student', compact('record'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    // dd($request->request);
    $ay = AcademicYear::where('active', 1)->first();
    $lstd = Student::latest()->first();
    if($lstd){
      $scode=Str::substr($lstd->student_code,0,6).str_pad(Str::substr($lstd->student_code,6)+1 , 4, "0", STR_PAD_LEFT) ;

      $request->merge(['student_code'=>$scode, 'password' => $scode]);
    }else{
      $scode='5555'.str_pad($ay->id, 2, "0", STR_PAD_LEFT).str_pad('1' , 4, "0", STR_PAD_LEFT);

      $request->merge(['student_code'=>$scode, 'password' => $scode]);
    }


    $request->validate([
      'dob'  => 'required',
      'phone'  => 'required',
      'parent_phone'  => 'required',
      'student_code'  => 'unique:students',
      'national_id'  => 'required',
      'religion'  => 'required',
      'gender'  => 'required',
      'nationality_id'  => 'required',
      'place_id'  => 'required',
      'region_id'  => 'required',
  ]);
  
  if($request->name_ar==null && $request->name_en==null){
    return back()->with('danger', __('lang.error'));
  }elseif($request->has('name_ar') && !$request->has('name_en')){
    $request->merge(['name_en' => $request->input('name_ar')]);
  }elseif(!$request->has('name_ar') && $request->has('name_en')){
    $request->merge(['name_ar' => $request->input('name_en')]);
  }
  if($request->address_ar==null && $request->address_en==null){
    return back()->with('danger', __('lang.error'));
  }elseif($request->has('address_ar') && !$request->has('address_en')){
    $request->merge(['address_en' => $request->input('address_ar')]);
  }elseif(!$request->has('address_ar') && $request->has('address_en')){
    $request->merge(['address_ar' => $request->input('address_en')]);
  }

  // parent section
  if($request->parent_name_ar==null && $request->parent_name_en==null){
    return back()->with('danger', __('lang.error'));
  }elseif($request->has('parent_name_ar') && !$request->has('parent_name_en')){
    $request->merge(['parent_name_en' => $request->input('parent_name_ar')]);
  }elseif(!$request->has('parent_name_ar') && $request->has('parent_name_en')){
    $request->merge(['parent_name_ar' => $request->input('parent_name_en')]);
  }

    $record = Student::create($request->except('parent_name_ar','parent_name_en','parent_status'
    ,'user_name','kindship','parent_email','parent_phone','parent_job'));

    $rel = $record->levels()->attach($request->level_id,['stage_id' => $request->stage_id, 'class_id'=> $request->class_id, 'student_code'=> $request->student_code,'academic_year_id' => $ay->id]);
    
    $parent = Parentt::create($request->only(['parent_name_ar','parent_name_en','parent_status'
    ,'user_name','kindship','parent_email','parent_phone','parent_job','password']));
    $record->update(['parent_id' => $parent->id]);


    return redirect(route('student.index'))->with('success',__('lang.inserted'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $record = Student::find($id);
    $parent = Parentt::find($record->parent_id);
    return view('studentAffairs\student\create&edit_student', compact('record','parent'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([

    ]);


    $record = Student::find($id);
    $request->merge(['password' => Hash::make($request->input('password'))]);

    $record->update($request->except('parent_name_ar','parent_name_en','parent_status'
    ,'user_name','kindship','parent_email','parent_phone','parent_job'));
   

    $rel = $record->levels()->where('academic_year_id', AcademicYear::where('active',1)->pluck('id'))->sync($request->level_id,['stage_id' => $request->stage_id, 'class_id'=> $request->class_id, 'student_code'=> $request->student_code,'academic_year_id' => AcademicYear::where('active',1)->pluck('id')]);
    
    $parent = Parentt::create($request->only(['parent_name_ar','parent_name_en','parent_status'
    ,'user_name','kindship','parent_email','parent_phone','parent_job','password']));
    $record->update(['parent_id' => $parent->id]);


    return redirect(route('student.index'))->with('success', __('lang.updated'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $record = Student::find($id)->delete();
    return redirect(route('student.index'))->with('Warrning', __('lang.deleted'));
  }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|exists:admins',
    //         'password' => 'required'
    //     ]);
        

    //     $record = Student::where('email', $request->email)->first();
    //     if ($record) {
    //         if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'active' => 1])) {                
    //           return redirect('/');
    //         } else {
    //             return redirect('/sys-login')->with('danger', 'this user not found in our system');
    //         }
    //     }
    // }
  
  
}

?>