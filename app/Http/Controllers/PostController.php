<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\Models\PostComments;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->paginate(13);

        return view('Post_list', compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // function postComment(Post $post, $commentId)
    // {
    //     return view('comment_list')
    //     // return PostComments::find($commentId);
    //     // return $post->where($commentId->$post['post_id'])->first();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create is not used for now

        $request->validate([
            'link' => 'required',
            'title' => 'required',
            'fb_shares' => 'required',
            'comment_count' => 'required',
            'photo_name' => 'required',
            'post_id' => 'required',
            'author' => 'required'
        ]);

        return Post::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('post_id', '=', $id)->get();
        $comments = PostComments::where('post_id', '=', $id)->paginate(5);
        return view('post_w_comments', compact('posts', 'comments'))->with(0, $posts)->with(0, $comments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
    }

    /**
     *  Search for an atribute anywhere in the text
     *
     * @param  int  $param
     * @return \Illuminate\Http\Response
     */
    public function searchAll($param)
    {
        return Post::where('title', 'like', '%' . $param . '%')->get();
    }

    /**
     *  Search for an atribute anywhere in the text
     *
     * @param  int  $param
     * @return \Illuminate\Http\Response
     */
    public function searchStarting($param)
    {
        return Post::where('title', 'like', $param . '%')->get();
    }


    /**
     *  Search for an atribute anywhere in the text
     *
     * @param  int  $param
     * @return \Illuminate\Http\Response
     */
    public function searchEnding($param)
    {
        return Post::where('title', 'like', '%' . $param)->get();
    }
}
