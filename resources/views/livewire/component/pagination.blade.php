@if ($paginator->hasPages())
    <div class="text-center">
        <ul class="pagination justify-content-center pagination-rounded">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a href="javascript:void(0);" class="page-link">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a href="javascript:void(0);" class="page-link" wire:click="previousPage" rel="prev">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled">
                        <a href="javascript:void(0);" class="page-link">{{ $element }}</a>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a href="javascript:void(0);" class="page-link">{{ $page }}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link"
                                    wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="javascript:void(0);" class="page-link" wire:click="nextPage" rel="next">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <a href="javascript:void(0);" class="page-link">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif
