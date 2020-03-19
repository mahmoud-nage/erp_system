@inject('stages', 'App\StudentAffairs\Stage')


@extends('front.user_index')

@section('css')

@endsection
@section('title')

{{__('lang.materials')}}

@endsection
@section('content')
<div class="row">

<div class="col-12">
<a href="{{url('/std-courses')}}" class="btn btn-primary">{{__('lang.courses')}}</a>
</div>

    @foreach ($videos as $video)
    <div class="media" style="border-bottom: 2px solid #0f4d75;background-color: rgba(0,0,0,0.7); border-radius: 10px ">
        <div class="col-lg-8 col-12 ">
        <div class="media-body" style="color: white;">
            {!! Embed::make($video->source)
            ->setAttribute(['width' => 1000, "frameborder" =>"0",
            "allowfullscreen"=>"allowfullscreen"])
            ->parseUrl()->getIframe() !!}
            <h4 class="mt-0" style="font-weight: 600">{{ $video->title}}</h4>
            <h4 class="mt-0">{{ $video->created_at }}</h4>
        </div>
    </div>
    </div>
    
    <br>
    <br>
@endforeach
</div>



@endsection