@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}">

    <div class="hidden sm:flex sm:items-center sm:justify-between">

        {{-- Info --}}
        <div>
            <p class="text-sm text-pink-600 dark:text-pink-400">
                {!! __('Mostrando') !!}
                @if ($paginator->firstItem())
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('a') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                    {{ $paginator->count() }}
                @endif
                {!! __('de') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('resultados') !!}
            </p>
        </div>

        {{-- PAGINACIÓN --}}
        <div>
            <span class="inline-flex rounded-lg overflow-hidden shadow-md bg-pink-600">

                {{-- Previous --}}
                @if ($paginator->onFirstPage())
                    <span class="inline-flex items-center px-3 py-2 
                    text-white bg-pink-400 opacity-60 cursor-not-allowed">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"/>
                        </svg>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="inline-flex items-center px-3 py-2 
                    text-white bg-pink-600 hover:bg-pink-700 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"/>
                        </svg>
                    </a>
                @endif

                {{-- Pages --}}
                @foreach ($elements as $element)

                    @if (is_string($element))
                        <span class="inline-flex items-center px-4 py-2 text-sm text-white">
                            {{ $element }}
                        </span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)

                            @if ($page == $paginator->currentPage())
                                <span class="inline-flex items-center px-4 py-2 text-sm font-bold 
                                text-white bg-pink-700">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium 
                                text-white bg-pink-600 hover:bg-pink-700 transition">
                                    {{ $page }}
                                </a>
                            @endif

                        @endforeach
                    @endif

                @endforeach

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="inline-flex items-center px-3 py-2 
                    text-white bg-pink-600 hover:bg-pink-700 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </a>
                @else
                    <span class="inline-flex items-center px-3 py-2 
                    text-white bg-pink-400 opacity-60 cursor-not-allowed">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"/>
                        </svg>
                    </span>
                @endif

            </span>
        </div>

    </div>

</nav>
@endif