@extends('master')
@include('nav', ['var' => 'comment'])
@section('content')
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<div class="row">
    <div class="col s10 push-s1">
        <table border='1' class="highlight">
            <tr>
                <td>Subject </td>
                <td>Body</td>
                <td>Author</td>
                <td>Date</td>
                <td>Upvotes</td>
                <td>Downvotes</td>
                <td>Parent Comment ID</td>
                <td>Reply Count</td>
                <td>Comment ID</td>
                <td>Post ID</td>
            </tr>
            <div class = 'divider'></div>
            @foreach($comments as $comment)
            <tr>
                <td>{{$comment['comment_subject']}}</td>
                <td>{{$comment['comment_body']}}</td>
                <td>{{$comment['author']}}</td>
                <td>{{$comment['date']}}</td>
                <td>{{$comment['upvote_count']}}</td>
                <td>{{$comment['downvote_count']}}</td>
                <td>{{$comment['parent_id']}}</td>
                <td>{{$comment['reply_count']}}</td>
                <td>{{$comment['comment_id']}}</td>
                <td>{{$comment['post_id']}}</td>
            </tr>
            @endforeach
        </table>
        @include('pagination', ['var' => $comments])
    </div>
</div>

@endsection
