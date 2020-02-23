@inject('levels', 'App\StudentAffairs\Level')

@extends('index')

@section('title')
    {{__('lang.classes')}}
@endsection

@section('content')
    @if(!empty($records))
    <div class="card">
        <div class="card-header">
            <h1 >{{__('lang.classes')}}</h1><br>
            <a class="btn btn-outline-primary" style="width: 100px;" href="{{route('class.create')}}">
              <span class="float-md-left @if(app()->getLocale() == 'ar') float-md-right @endif">
                  <i class="fa fa-plus"></i>
              </span>{{__('lang.new')}}
            </a>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-striped" style="@if(app()->getLocale() == 'ar') direction:rtl @endif">

                            <thead>
                            <tr role="row">
                                <th class="text-center" style="width:10px">
                                    #
                                </th>
                                @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                                <th class="sorting text-center">
                                    {{__('lang.name_ar')}}
                                </th>

                                @endif
                                @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                                <th class="sorting text-center">
                                    {{__('lang.name_en')}}
                                </th>
                                @endif

                                <th class="text-center">
                                    {{__('lang.levels')}}
                                </th>

                                
                                <th class="text-center">
                                    {{__('lang.stages')}}
                                </th>
                                                       
                                <th class="text-center" style="width:50px">
                                    {{__('lang.actions')}}
                                </th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                        <tr role="row">
                                            <td class="text-center">{{$loop->iteration}}</td>
                                            @if($supersetting->lang == "Arabic" || $supersetting->lang == "Both" )
                                            <td class="text-center">{{$record->name_ar}}</td>

                                            @endif
                                            @if($supersetting->lang == "English" || $supersetting->lang == "Both" )
                                            <td class="text-center">{{$record->name_en}}</td>
                                            @endif

                                            <td class="text-center">{{$record->level()->pluck('name_'.app()->getLocale())}}</td>

                                            <td class="text-center">{{$record->level->stage()->pluck('name_'.app()->getLocale())}}</td>

                                            <td class="text-center" >
                                                <a class="btn btn-info btn-group-vertical" href="{{route('class.edit', $record->id)}}">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                
                                                <form action="{{route('class.destroy', $record->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                   
                                                        <button onclick="alert()" class="btn btn-danger btn-group-vertical">
                                                            <i class="fas fa-trash-alt" ></i>
                                                        </button>
                                                </form>
                                            </td>

                                        </tr>
                  
                                @endforeach
                            </tbody>
                        </table></div></div>
                        <div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of {{floor($records->count()/10)}} entries</div></div><div class="col-sm-12 col-md-7"><div class="float-md-right">{{ $records->links() }} </div></div></div></div>
        </div>

        <!-- /.card-body -->
    </div>

@else
    <div class="alert alert-danger">
        whoops! : You don`t have Data.
    </div>
    @endif

  
@endsection