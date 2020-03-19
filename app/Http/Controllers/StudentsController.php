<?php

namespace App\Http\Controllers;

use App\SuperAdmin;
use Illuminate\Http\Request;
use App\StudentAffairs\Level;
use App\StudentAffairs\Classs;
use App\StudentAffairs\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class StudentsController extends Controller
{
    public function login(Request $request){
        
            $request->validate([
                'user_name' => 'required',
                'password' => 'required'
            ]);
            
            $s_admin = SuperAdmin::first();
            $record = $s_admin->type==0?
                Level::where('user_name', $request->user_name)->first() : 
                Classs::where('user_name', $request->user_name)->first() ;


            if ($record) {
                if (Auth::guard('std')->attempt(['user_name' => $request->user_name, 'password' => $request->password])) { 
                    return redirect()->intended('/std-courses')->with('success', __('lang.welcome_msg'));
                } else {
                    return redirect('/std-login')->with('danger', 'this password is wrong');
                }
            }
            return redirect('/std-login')->with('danger', 'this user not found in our system');

        
    }

    public function videos($course_id){
        $record = Course::find($course_id);
        $videos = $record->files()->where('type', 'video')->get();
        return view('front.std-courses.video', compact('videos'));
    }
    public function files($course_id){
        $record = Course::find($course_id);
        $files = $record->files()->where('type', 'file')->get();
        return view('front.std-courses.files', compact('files'));
    }

    public function courses(){

        $s_admin = SuperAdmin::first();
        $record = $s_admin->type == 0 ?
        Level::find(auth()->guard('std')->user()->id) :
        Classs::find(auth()->guard('std')->user()->id);

        $records = $record->courses;
        return view('front.std-courses.courses', compact('records'));
    }


}
