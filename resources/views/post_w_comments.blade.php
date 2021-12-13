@extends('master')
@include('nav', ['var' => 'posts'])
@section('content')

<div class="row">
    <div class="col s6 push-s3">
        <table border='1' class="highlight">
            <tr>
                <td>Title</td>
                <td>Link</td>
                <td>Date</td>
                <td>FB Shares</td>
                <td>Comment Count</td>
                <td>Photo Name</td>
                <td>Post ID</td>
                <td>Author</td>
            </tr>
            @foreach($posts as $post)
            <tr >
                <td>{{$post['title']}}</td>
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
    </div>
    <div class="divider"></div>
    <div class="col s12 ">
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
            <div class="divider"></div>
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

{{-- @include('pagination', ['var' => $posts]) --}}

@endsection
