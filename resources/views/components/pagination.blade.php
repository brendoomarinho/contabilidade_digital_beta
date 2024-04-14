     @php
         $maxPages = 5; // Define o máximo de páginas a serem exibidas
         $currentPage = $registros->currentPage();
         $lastPage = $registros->lastPage();
         $start = max($currentPage - floor($maxPages / 2), 1);
         $end = min($start + $maxPages - 1, $lastPage);
     @endphp
     <!-- Pagination Style 3 -->
     <nav aria-label="Page navigation" class="pagination-style-3">
         <ul class="pagination justify-content-end mb-3 flex-wrap">
             <!-- Link para a página anterior -->
             <li class="page-item {{ $registros->onFirstPage() ? 'disabled' : '' }}">
                 <a class="page-link" href="{{ $registros->previousPageUrl() }}" aria-label="Previous">
                     <i class="fa fa-chevron-left"></i>
                 </a>
             </li>

             <!-- Links para as páginas -->
             @if ($start > 1)
                 <li class="page-item"><a class="page-link" href="{{ $registros->url(1) }}">1</a></li>
                 @if ($start > 2)
                     <li class="page-item">
                         <a class="page-link" href="javascript:void(0);">
                             <i class="fas fa-ellipsis-h"></i>
                         </a>
                     </li>
                 @endif
             @endif
             @for ($i = $start; $i <= $end; $i++)
                 <li class="page-item {{ $registros->currentPage() == $i ? 'active' : '' }}">
                     <a class="page-link" href="{{ $registros->url($i) }}">{{ $i }}</a>
                 </li>
             @endfor
             @if ($end < $lastPage)
                 @if ($end < $lastPage - 1)
                     <li class="page-item">
                         <a class="page-link" href="javascript:void(0);">
                             <i class="fas fa-ellipsis-h"></i>
                         </a>
                     </li>
                 @endif
                 <li class="page-item"><a class="page-link"
                         href="{{ $registros->url($lastPage) }}">{{ $lastPage }}</a></li>
             @endif

             <!-- Link para a próxima página -->
             <li class="page-item {{ $registros->hasMorePages() ? '' : 'disabled' }}">
                 <a class="page-link" href="{{ $registros->nextPageUrl() }}" aria-label="Next">
                     <i class="fa fa-chevron-right"></i>
                 </a>
             </li>
         </ul>
     </nav>

