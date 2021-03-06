@if($errors->any())
@foreach($errors->all() as $error)
    <div class="alert alert-danger @if(app()->getLocale() == 'ar') text-right @endif">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{$error}}
    </div>
@endforeach
@endif

@if(session('success'))
<div class="alert alert-success @if(app()->getLocale() == 'ar') text-right @endif"">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{session('success')}}
</div>
@elseif(session('warning'))
<div class="alert alert-warning @if(app()->getLocale() == 'ar') text-right @endif">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{session('warning')}}
</div>
@elseif(session('danger'))
<div class="alert alert-danger @if(app()->getLocale() == 'ar') text-right @endif">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{session('danger')}}
</div>
@endif