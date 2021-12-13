
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<span>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($var ->onFirstPage())
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        @else
        <li class="waves-effect"><a href="{{ $var->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
        @endif

        {{-- Page Number Links --}}
        @for($i=1; $i<=$var->lastPage(); $i++)
            @if($i==$var->currentPage())
                <li class="active"><a href="?page={{$i}}">{{$i}}</a></li>
            @else
                <li class="waves-effect"><a href="?page={{$i}}">{{$i}}</a></li>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($var->hasMorePages())
        <li class="waves-effect"><a href="{{ $var->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
        @else
        <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
</span>
