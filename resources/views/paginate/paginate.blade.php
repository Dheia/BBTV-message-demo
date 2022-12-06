  @if ($paginator->hasPages())
<div class="pagination">
          <div class="pagination-wrapp">
          @if ($paginator->onFirstPage())
            <button class="disabled btn"><span><i class="fa fa-chevron-left"></i></span></button>
        @else
            <button  class=" btn"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn"><i class="fa fa-chevron-left"></i></a></button>
        @endif

           
            <div class="pages">
            @foreach ($elements as $element)
           
           @if (is_string($element))
               <a class="disabled page"><span>{{ $element }}</span></a>
           @endif


          
           @if (is_array($element))
               @foreach ($element as $page => $url)
                   @if ($page == $paginator->currentPage())
                       <a class="page active" href="{{ $url }}"><span>{{ $page }}</span></a>
                   @else
                       <a  class="page" href="{{ $url }}"><span>{{ $page }}</span></a>
                   @endif
               @endforeach
           @endif
       @endforeach
       
             
          
          </div>
          @if ($paginator->hasMorePages())
      
            <button class=" btn "><a  href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn"> <i class="fa fa-chevron-right"></i></a></button>

        @else
            <button class=" btn disabled"><span> <i class="fa fa-chevron-right"></i></span></button>
        @endif
       <!-- <div class="page_redirect">
        <p>Go to page </p>
        <input type="text" name="page_number">
        <a class="serch_icon_right_btn">Go <span class="serch_icon_right"><i class="fa fa-chevron-right"></i></span></a>
        </div> -->
       
        </div>
        @endif 
