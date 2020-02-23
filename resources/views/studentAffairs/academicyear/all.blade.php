@extends('index')

@section('title')
    {{__('lang.ac_years')}}
@endsection

@section('content')
    @if(!empty($records))
    <div class="card">
        <div class="card-header">
            <h1 >{{__('lang.ac_years')}}</h1><br>
            <a class="btn btn-outline-primary" style="width: 100px;" href="{{route('academicyear.create')}}">
              <span class="float-md-left @if(app()->getLocale() == 'ar') float-md-right @endif">
                  <i class="fa fa-plus"></i>
              </span>{{__('lang.new')}}
            </a>
        </div><!-- /.card-header -->
        <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped" style="@if(app()->getLocale() == 'ar') direction:rtl @endif">

                            <thead>
                            <tr role="row">
                                <th class="text-center" style="width:10px">
                                    #
                                </th>
                                <th class="sorting text-center">
                                    {{__('lang.year')}}
                                </th>
                                <th class="sorting text-center">
                                    {{__('lang.active')}}
                                </th>
                                {{-- <th class="sorting text-center">
                                    {{__('lang.order')}}
                                </th> --}}
                            
                                <th class="text-center" style="width:50px">
                                    {{__('lang.actions')}}
                                </th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                        <tr>
                                            <td class="text-center">{{$loop->iteration}}</td>

                                            <td class="text-center">{{$record->year}}</td>

                                            @if($record->active == 1)
                                                <td><i class="fas fa-check" style="color:red"></i></td>
                                            @else
                                                <td><i class="fas fa-times"></i></td>
                                            @endif    

                                            {{-- <td class="text-center">{{$record->order}}</td>     --}}

                                            <td class="text-center" >
                                                <a class="btn btn-info btn-group-vertical" href="{{route('academicyear.edit', $record->id)}}">
                                                    <i class="fas fa-user-edit"></i>
                                                </a>
                                
                                                <form action="{{route('academicyear.destroy', $record->id)}}" method="POST">
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
                        </table>
                    </div>
                </div>
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