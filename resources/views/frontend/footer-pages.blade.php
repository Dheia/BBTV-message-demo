@extends('frontend.main')
@section('content')
<div class="container">
    
    <div class="row">
  
<div class="col-sm-12 col-md-12 col-lg-12 mt-5 mb-5">
{!!$data->content!!}
</div>
</div>
</div>
@endsection
@section('scripts')
@parent
@endsection
