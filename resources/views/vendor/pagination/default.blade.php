<style> #navegador ul{
   list-style-type: none;
   text-align: center;
} 
</style>
@if ($paginator->hasPages())
    <nav class="text-xs-right">
                        <ul class="pagination">
                        @if ($paginator->onFirstPage())
                        <li class="page-item disabled"> <a class="page-link" href="#!">
                Prev
            </a> </li>
 
            
 
        @else
        <li class="page-item "> <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                Prev
            </a> </li>
            
 
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
 
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active"> <a class="page-link" href="#">
                {{ $page }}
            </a> </li>
                        
                    @else
                        
                        <li class="page-item"> <a class="page-link" href="{{ $url }}">{{ $page }}</a> </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item"> <a class="page-link" href="{{ $paginator->nextPageUrl() }}">
                Next
            </a> </li>
            
        @else
        <li class="page-item disabled"> <a class="page-link" href="#!">
                Next
            </a> </li>
           
 
        @endif
    </ul>
    
</nav>
@endif