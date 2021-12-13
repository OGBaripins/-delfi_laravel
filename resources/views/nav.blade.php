
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<nav>
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <form>
                    <div class="input-field">
                        <input id="search" type="search" name="term" placeholder="Search post" id="term" type="text">
                        <label class="label-icon" form="search"><i class="material-icons">search</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </form>
            </li>
            @if($var ==  'posts')
                <li class="active"><a href="/">Posts</a></li>
            @else
                <li><a href="/">Posts</a></li>
            @endif

            @if($var ==  'comment')
                <li class="active"><a href="/comments">Comments</a></li>
            @else
            <li><a href="/comments">Comments</a></li>
            @endif
        </ul>
    </div>
</nav>
