<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Forum\Thread;
use App\Models\Forum\Comment;

use App\Http\Requests\Forum\CommentRequest;

class CommentController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:forum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $id = str_replace(config('app.salt'), '', base64_decode($id));
        $thread = Thread::find($id);
        $comments = $thread->comment()->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.forum-fasilitator.reply-thread', ['thread' => $thread, 'comments' => $comments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        //
        $id = str_replace(config('app.salt'), '', base64_decode($request->get('id')));
        $thread = Thread::find($id);
        $comment = Thread::find($id)
                   ->newComment()
                   ->withComment($request->get('komentar'))
                   ->withCounter($thread->comment()->commentThread($thread->id)->count())
                   ->saveComment();

        return redirect()->route('thread.show.detail', [base64_encode(config('app.salt').$thread->id), str_slug($thread->judulThread)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comment = Comment::find(decrypt($id));
        return view('pages.forum-fasilitator.edit-reply-thread', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        //
        $comment = Comment::find(decrypt($id));
        $comment->comment = $request->get('komentar');
        $comment->update();

        return redirect()->route('thread.show.detail', [base64_encode(config('app.salt').$comment->thread->id), strtolower(str_replace(' ', '-', $comment->thread->judulThread))]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function quote($id)
    {
        //
        $comment = Comment::find(decrypt($id));
        $comment->comment = "<blockquote><b>".$comment->ForumUsers->name." menulis:</b><br><br>".$comment->comment."</blockquote>"."<p></p>";

        return view('pages.forum-fasilitator.quote-reply-thread', ['comment' => $comment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
