@if($errors->any())
@foreach($errors->all() as $error)
    <div class="alert alert-danger @if(app()->getLocale() == 'ar') text-right @endif">
        {{$error}}
    </div>
@endforeach
@endif

@if(session('success'))
<div class="alert alert-success @if(app()->getLocale() == 'ar') text-right @endif">
    {{session('success')}}
</div>
@elseif(session('warning'))
<div class="alert alert-warning @if(app()->getLocale() == 'ar') text-right @endif">
    {{session('warning')}}
</div>
@elseif(session('danger'))
<div class="alert alert-danger @if(app()->getLocale() == 'ar') text-right @endif">
    {{session('danger')}}
</div>
@endif