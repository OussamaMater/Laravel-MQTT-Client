<div>
    @if ($paginator->hasPages())
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    @if ($paginator->onFirstPage())
                        <li class="page-item">
                            <button class="page-link">Previous</button>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link" wire:click="previousPage">Previous</button>
                        </li>
                    @endif
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled d-none d-md-block" aria-disabled="true">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active d-none d-md-block" aria-current="page"><span
                                            class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item d-none d-md-block"><button type="button" class="page-link"
                                            wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <button class="page-link" wire:click="nextPage">Next</button>
                        </li>
                    @else
                        <li class="page-item">
                            <button class="page-link">Next</button>
                        </li>
                    @endif
                </ul>
            </nav>
            {{-- <div class="fw-normal small mt-4 mt-lg-0">A total of {{ \App\Models\Payload::count() }} entries</div> --}}
        </div>
    @endif
</div>
