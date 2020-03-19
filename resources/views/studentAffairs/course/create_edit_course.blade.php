@inject('stages', 'App\StudentAffairs\Stage')
@inject('levels', 'App\StudentAffairs\Level')
@inject('classes', 'App\StudentAffairs\Classs')

@extends('index')

@section('css')

@endsection
@section('title')

@if(!empty($record) && $record['name_'.app()->getLocale()] == null)
{{__('lang.course_course')}}
@else
{{__('lang.edit_course')}}

@endif
@endsection
@section('content')

<div class="row">
  <div class="col-sm-12">
    {{-- <div class="content-header">Add course User</div> --}}
  </div>
</div>
<!-- Input Validation start -->
<section class="input-validation">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      
        <div class="card-content">
          <div class="card-body">

            @if(!empty($record) && $record['name_'.app()->getLocale()] == null)
                   {{-- @dd('create') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.course_course')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('course.store')}}" enctype="multipart/form-data">

                @else
                   {{-- @dd('update') --}}
                   <div class=" content-header col-lg-12 @if(app()->getLocale() == 'ar') text-right @endif">{{__('lang.edit_course')}}</div><br>
                    <form class="form-horizontal"  method="POST" action="{{route('course.update', $record->id)}}" enctype="multipart/form-data">

                @endif


            @csrf
              <div class="row">
                
                <div class="col-lg-6 col-md-12">
                  @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                  <h5>{{__('lang.name_en')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <input value="{{$record->name_en}}" type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('name_en')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif
                </div>

                <div class="col-lg-6 col-md-12">
                  @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                      <h5>{{__('lang.name_ar')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls mb-1">
                      <input value="{{$record->name_ar}}" type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('name_ar')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div>
                    @endif
                </div>   

                <div class="col-lg-6 col-md-12">
                  @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                  <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                  <h5>{{__('lang.teacher_en')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <input value="{{$record->teacher_en}}" type="text" name="teacher_en" class="form-control @error('teacher_en') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('teacher_en')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                  </div>
                  @endif
                </div>

                <div class="col-lg-6 col-md-12">
                  @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                      <h5>{{__('lang.teacher_ar')}}<span class="required" style="color:red">*</span></h5>
                      <div class="controls mb-1">
                      <input value="{{$record->teacher_ar}}" type="text" name="teacher_ar" class="form-control @error('teacher_ar') is-invalid @enderror " required data-validation-required-message="This field is required">
                      @if(session('danger'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{session('danger')}}</strong>
                      </span>
                      @endif
                      @error('teacher_ar')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>
                    </div>
                    @endif
                </div>
              </div>

              <div class="row">

                <div class="col-lg-6 col-md-12">     
            

                  <div class="form-group">
                    <h5>{{__('lang.stage')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="stage" id="stage" name="stage_id" required data-placeholder="@if($stages->where('id', $record->stage_id)->first()) {{$stages->where('id', $record->stage_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_stage')}} @endif">
                        <option value="">Stage</option>
                        @foreach ($stages->all() as $stage)
                          <option value="{{$stage->id}}" @if(isset($rel)) @foreach($rel as $l) @if($stage->id == $l->pivot->stage_id) selected @endif @endforeach @endif>{{$stage['name_'.app()->getLocale()]}}</option>
                        @endforeach
                      </select>
                    </div>
                </div>


                </div>
                {{-- end left side --}}
                <div class="col-lg-6 col-md-12">

                  <div class="form-group">
                    <h5>{{__('lang.level')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="level" id="level" name="level_id" required data-placeholder="@if($levels->where('id', $record->level_id)->first()) {{$levels->where('id', $record->level_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_level')}} @endif">
                      @if(isset($rel))  @foreach($rel as $l)  <option value="{{$l->id}}"   @if($l) selected @endif >{{$l['name_'.app()->getLocale()]}}</option> @endforeach @endif
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <h5>{{__('lang.class')}}<span class="required" style="color:red">*</span></h5>
                    <div class="controls">
                      <select class="class" id="class" name="classs_id" required data-placeholder="@if($classes->where('id', $record->classs_id)->first()) {{$classes->where('id', $record->classs_id)->pluck('name_'.app()->getLocale())}} @else {{__('lang.select_class')}} @endif">
                      @if(isset($rel)) @foreach($rel as $l)  <option value="{{$l->pivot->classs_id}}" @if($l->pivot->classs_id) selected @endif >{{$classes->where('id', $l->pivot->classs_id)->pluck('name_'.app()->getLocale())[0]}}</option>@endforeach @endif
                      </select>
                    </div>
                  </div>

                </div>
                
                  <div class="col-lg-12 col-md-12">
                    <div class="form-group @if(app()->getLocale() == 'ar') text-right @endif">
                      @if(!empty($record) && $record['name_'.app()->getLocale()] == null)
                      <button type="submit" class="btn btn-success">{{__('lang.submit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                  @else
                  @method("PUT")
                  <button type="submit" class="btn btn-success">{{__('lang.edit')}} <i class="fa fa-thumbs-o-up position-right"></i></button>
                  @endif
                      <button type="reset" class="btn btn-danger">{{__('lang.reset')}} <i class="fa fa-refresh position-right"></i></button>
                    </div>
                  </div>

              
                  <br>
                  <div class="row">
                    @if ($record->title)
                      @foreach ($record->files as $file)
                      @if($file->type == 0)  {{--  0 means this is video --}}
                      <div class="col-md-6">
                          <a href="" style="color:red; position: absolute; top:-13px; right:45px" class="btn btn-link delete_file" data-course_id="{{$record->id}}" data-file_id="{{$file->id}}">
                            <i class="fa fa-times"></i>
                          </a>
                        </div>
                      </div>
                      @else
                      <div class="col-md-6">
                        <div class="col-4 file">
                          <img src="{{url('/uploads').'/'.$file->source}}" width="100" height="100" alt="file">
                          <a href="" style="color:red; position: absolute; top:-13px; right:45px" class="btn btn-link delete_file" data-course_id="{{$record->id}}" data-file_id="{{$file->id}}">
                            <i class="fa fa-times"></i>
                          </a>
                        </div>
                      </div>
                      @endif

                      @endforeach
                      @endif

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@push('scripts')
<script>
 $(document).ready(function(){
   $('#stage').on('change',function(){
        var stage_id = $('#stage').val();
        if(stage_id){
            $.ajax({
                url : "{{url('/level?stage_id=')}}" + stage_id,
                type: "GET",
                success:function(data){

                    if(data.status === 1){
                      $("#level").empty();
                      $("#level").append('<option>Level</option>');
                        $.each(data.data, function(index, level){
                            $("#level").append(new Option(level.name_ar, level.id));
                            console.log(level.name_ar, $("#class").val(), $("#level").val());
                        });
                    }

                    },
            });
        }
    });

    $('#level').on('change',function(){
        var level_id = $('#level').val();
        if(level_id){
            $.ajax({
                url : "{{url('/class?level_id=')}}" + level_id,
                type: "GET",
                success:function(data){
                    if(data.status === 1){
                      $("#class").empty();
                      $("#class").append('<option>class</option>');
                        $.each(data.data, function(index, level){
                            $("#class").append(new Option(level.name_ar, level.id));
                            console.log(level.name_ar, $("#class").val(), $("#level").val());
                        });
                    }

                    },
            });
        }
 });

 $('.delete_file').on('click', function(e){
    e.preventDefault();
    let course_id = $(this).data('course_id');
    let file_id = $(this).data('file_id');
    console.log(course_id,file_id);

        if(confirm("Are you sure you want to delete this iamge?")){
            $.ajax({
                type : 'DELETE',
                url : '{{url("/destroyfile")}}',
                data : {
                    'course_id' : course_id,
                    'file_id' : file_id,
                    _token: '{{csrf_token()}}'
                },
                success : function(data){
                  console.log(data.data);
                  $(this).parents('.file').slideUp().remove();
                }.bind(this)
            })
        }
    });

 });
</script>
@endpush
<!-- Input Validation end -->

@endsection