<?php

namespace App\Http\Controllers\Forum;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Forum\Thread;
use App\Models\Forum\ThreadImage;

use App\Http\Requests\Forum\ForumRequests;

class ForumFasilitatorController extends Controller
{

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function __construct()
	{
		$this->middleware('auth:forum', ['except' => ['index', 'show']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$threads = Thread::all();
		return view('pages.forum-fasilitator.index', ['threads' => $threads]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		$threadImages = ThreadImage::where('forum_user_id', auth('forum')->user()->id)->get();
		return view('pages.forum-fasilitator.create', ['threadsImages' => $threadImages]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ForumRequests $request)
	{
		//
		$thread = new Thread;
		$thread->forum_user_id = auth('forum')->user()->id;
		$thread->judulThread = $request->get('judul-thread');
		$thread->tipe = "umum";
		$thread->konten = $request->get('konten');
		$thread->save();
		return redirect()->route('thread.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id, $judul)
	{
		//
		$id = str_replace(config('app.salt'), '', base64_decode($id));
		$thread = Thread::where('id', $id)->orWhere('judulThread', 'like', str_replace('-', ' ', $judul))->first();
		$thread->comment()->count() > 0 ? $comments = $thread->comment()->paginate(10) : $comments = null;
		return view('pages.forum-fasilitator.show', ['thread' => $thread, 'comments' => $comments]);
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
		//
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
