@if($errors->all())

@foreach($errors->all() as $error)
<div class="alert alert-danger">
    {{$error}}
</div>

@endforeach
@endif
@if (session()->has("warning"))
<div class="alert alert-warning alert-dismissible fade show">
    <strong>{{session()->get("warning")}}</strong>
    <button class="close"
    data-dissmiss="alert">
 

    </button>
</div>
@endif
@if (session()->has("info"))
<div class="alert alert-info alert-dismissible fade show">
    <strong>{{session()->get("info")}}</strong>
    <button class="close"
    data-dissmiss="alert">
   

    </button>
</div>
@endif
@if (session()->has("success"))
<div class="alert alert-success alert-dismissible fade show">
    <strong>{{session()->get("success")}}</strong>
    <button class="close"
    data-dissmiss="alert">
    </button>
</div>
@endif