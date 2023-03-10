@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
        <div>
            <h1 class="page-title">Feeds</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Feeds</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </div>
    
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
@php use Illuminate\Support\Str; @endphp
    <!-- ROW-1 OPEN -->
    <div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
        <div class="addnew-ele">
        {{--  <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-info-light ">
            {{$buton_name}}
        </a>  --}}
    </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="paging-section">
                    <form method="get" class="page-number"  >
                            <h6 class="page-num">Show</h6>
                              <select id="pagination" name="paginate"class="form-control select2">
                                <option value="10" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 10) ? 'selected':''}}>10</option>
                                <option value="20" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 20) ? 'selected':''}}>20</option>
                                <option value="30" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 30) ? 'selected':''}}>30</option>
                                <option value="50" {{ isset($_GET['paginate']) && ($_GET['paginate'] == 40) ? 'selected':''}}>40</option>
                           @if(isset($_GET['page']))<input type="hidden" name="page" value="{{$_GET['page']}}">@endif
                           <input type="submit" name="" style="display:none;">
                       </form>
                        <form>
                          <div class="search_bar d-flex">  
                           <input type="" class="form-control" id="search" name="search" value="{{ (request()->get('search') != null) ? request()->get('search') : ''}}" placeholder="Search"></input>
                          <button type="submit" class="form-control src-btn" ><i class="angle fe fe-search"></i></button>
                           <a class="form-control src-btn" href="{{ route('dashboard.blogs.index') }}"><i class="angle fe fe-rotate-ccw"></i></a>
                      </div>
                  </form> 
                       </div>
                       <div class="container-fluid">
                        @if(count($blogs)>0)
                            @foreach($blogs as $key => $item)
                          
                        <div class="row feed" style="background-color: #f1f1f9;">
                            <div class="col-sm-12 col-md-6 col-xl-6 p-0 bor">
                             <div class="main-contain d-flex">
                                <div class="col-4 p-0"> <div class="feed_image">
                                    @foreach($item->feedmedia as $key1 => $feed_media)
                                   
                                   @if($key1==0)
                                  
                                   @if($feed_media->media_type=='jpg' OR $feed_media->media_type=='png'OR $feed_media->media_type=='jpeg'OR $feed_media->media_type=='gif')
                                  
                                   <img src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}" style="object-fit: cover;" height="150px" width="150px" alt="" />
                                   @endif
                                   @if($feed_media->media_type=='mp4')
                                   <video controls class="feed_video" width="200px" height="160px">
                                    <source src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}" type="video/mp4">
                                    <source src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}" type="video/ogg">
                                    Your browser does not support the video tag.
                                  </video>
                                   @endif 
                                    @endif
                                        @endforeach
                                </div>
                            </div>
                                <div class="col-8">
                                    <div class="titlee mb-5 mt-2">
                                        <h6>	
                                            {!! (nl2br(e(Str::words($item->description, '20')))) !!}</h6>
                                    </div>
                                    <div class="upload-date mt-3 mb-1">
                                       <h6 class="pt-5"> Posted by :{{ $item->user->first_name ?? '' }} {{ $item->user->last_name ?? '' }} </h6>
                                    </div>
                                    <div class="upload-date mt-5 mb-1">
                                       <h6 class=""> Posted: 07/27/2022 05:35 PM</h6>
                                    </div>
                                </div>
                               
                             </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-xl-6 p-0">
                            <div class="main-contain  ml-4">
                               <div class="top-item d-flex">
                                <div class="Impressions mt-3 mr-5">
                                    <p class="p-0 m-0">Impressions <br><h4>109</h4></p><br>
                                  
                                  </div>
                                <div class="likes mt-3 ml-5 pl-4">
                                    <p class="p-0 m-0">Likes <br><h4>109</h4></p><br>
                                  
                                  </div>
                                <div class="action mt-3 ml-5 pl-4">
                                    <p class="p-0 m-0">Action <br><h4><form action="{{ route('dashboard.blogs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-sm btn-danger" value=""><i class="fa fa-trash"></i></button>
                                    </form></h4></p><br>
                                  
                                  </div>
                               </div>
                               <div class="price mt-3">
                                 <p class="p-0 m-0">Price <br><h4>@if($item->price<=0)
                                    FREE
                                    @else
                                    ${{$item->price}}
                                 @endif</h4></p><br>
                               
                               </div>
                            </div>
                            </div>
                           </div>
                           @endforeach
                        @endif
                       </div>
                    {{--  <table id="" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th class="wd-15p">Title</th>
                                <th class="wd-15p">Author</th>
                                <th class="wd-15p">Image</th>
                                <th class="wd-15p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($blogs)>0)
                            @foreach($blogs as $key => $item)
                                <tr>
                                    <td>{{ $item->id ?? '' }}</td>
                                    <td>{!! (nl2br(e(Str::words($item->description, '20')))) !!}</td>
                                    <td>{{ $item->user->first_name ?? '' }} {{ $item->user->last_name ?? '' }}</td>
                                     <td> @foreach($item->feedmedia as $key => $feed_media)
                                        @if($feed_media->media_type=='png' OR $feed_media->media_type=='jgp'OR $feed_media->media_type=='jpeg'OR $feed_media->media_type=='gif')
                                        <img src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}" style="object-fit: cover;" height="50px" width="50px" alt="" />
                                        @endif
                                        @if($feed_media->media_type=='mp4')
                                        <video controls class="feed_video" width="50px" height="50px">
                                         <source src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}" type="video/mp4">
                                         <source src="{{ url('images/Feed_media') . '/' . $feed_media->medai ?? '' }}" type="video/ogg">
                                         Your browser does not support the video tag.
                                       </video>
                                        @endif 
                                        
                                     @endforeach
                                       
                                    <td>
                                        {{--<a class="btn btn-sm btn-primary" href=""><i class="fa fa-eye"></i></a>--}}
                                        {{--  <a class="btn btn-sm btn-secondary" href="{{ route('dashboard.blogs.edit', $item->id) }}"><i class="fa fa-edit"></i> </a>  --}}
                                        {{--  <form action="{{ route('dashboard.blogs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn btn-sm btn-danger" value=""><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>  --}}  
                </div>
                  <div id="pagination">{{{ $blogs->links() }}}</div>
            </div>
            <!-- TABLE WRAPPER -->
        </div>
        <!-- SECTION WRAPPER -->
    </div>
</div>
<!-- ROW-1 CLOSED -->               
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#pagination').on('change', function() {
    var $form = $(this).closest('form');
    //$form.submit();
    $form.find('input[type=submit]').click();
    console.log( $form);
  });
});
</script>
@endsection
<style>
    .row.feed {
        padding: 10px;
        border-radius: 12px;
        margin-top: 15px;
    }
    img {
        border-radius: 9px;
    }
    .titlee.ml-4.mt-2 {
        font-style: oblique;
    }
    .col-sm-12.col-md-6.col-xl-6.p-0.bor {
        border-right: 1px solid #c5bbbbd1;
    }
</style>