<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostComments;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $comments = PostComments::where([
            ['comment_body', '!=', Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('comment_body', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])->paginate(10);

        return view('comment_list', compact('comments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create is not used for now
        $request->valiadte([
            'post_id' => 'required',
            'comment_id' => 'required',
            'author' => 'required',
            'date' => 'required',
            'comment_subject' => 'required',
            'comment_body' => 'required',
            'upvote_count' => 'required',
            'downvote_count' => 'required',
            'parent_id' => 'required',
            'reply_count' => 'required',
        ]);
        return PostComments::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        return PostComments::find($post_id);
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
        $postComm = PostComments::find($id);
        $postComm->update($request->all());
        return $postComm;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return PostComments::destroy($id);
    }
}
