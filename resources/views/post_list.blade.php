@extends('master')
@include('nav', ['var' => 'posts'])
@section('content')
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<div class="row">
    <div class="col s10 push-s1">
        <table border='1' class="highlight">
            <tr onclick= (href = $post['post_id'])>
                <td>Title</td>
                <td>Link</td>
                <td>Date</td>
                <td>FB Shares</td>
                <td>Comment Count</td>
                <td>Photo Name</td>
                <td>Post ID</td>
                <td>Author</td>
            </tr>
            <div class = 'divider'></div>
            @foreach($posts as $post)
            <tr >
                <td onclick="window.location='{{ route('comment', $post['post_id'])}}'" style="cursor: pointer;">{{$post['title']}}</td>
                <td>{{$post['link']}}</td>
                <td>{{$post['date']}}</td>
                <td>{{$post['fb_shares']}}</td>
                <td>{{$post['comment_count']}}</td>
                <td>{{$post['photo_name']}}</td>
                <td>{{$post['post_id']}}</td>
                <td>{{$post['author']}}</td>
            </tr>
            @endforeach
        </table>
        @include('pagination', ['var' => $posts])
    </div>


@endsection
