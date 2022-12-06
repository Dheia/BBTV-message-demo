@extends('frontend.fan.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="col-sm-12 col-md-8 col-lg-9  mb-5">
<div class="heading mt-5 ">  <h4 class="text-white"><b>{{$title}}</b></h4></div>
{!!$data->content!!}
</div>
@endsection
@section('scripts')
@parent
@endsection