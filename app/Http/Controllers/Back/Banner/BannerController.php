<?php

namespace App\Http\Controllers\Back\Banner;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Banner\Banner;
use Storage;

class BannerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		$banners = Banner::orderBy('id', 'desc')->get();
		return view('pages.backend.banner.index', compact('banners'))->withTitle('Kelola Banner');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('pages.backend.banner.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
		Storage::makeDirectory('banner');
		$filename = '';
		if($request->hasFile('banner')){
			$filename = 'banner/'.str_random(10).'.'.$request->file('banner')->getClientOriginalExtension();
			Storage::put($filename, file_get_contents($request->file('banner')));
		}

		$banner = new Banner;
		$banner->user_id = auth()->user()->id;
		$banner->banner = !is_null($filename) ? Storage::url($filename) : '';
		$banner->hero = $request->get('hero');
		$banner->lead = $request->get('lead');
		$banner->isenabled = 1;
		$banner->save();

		$banners = Banner::orderBy('id', 'desc')->get();
		return view('pages.backend.banner._tableBanner', compact('banners'));
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
		$banner = Banner::find(decrypt($id));

		return view('pages.backend.banner.edit', compact('banner'));
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
		Storage::makeDirectory('banner');

		$banner = Banner::find(decrypt($id));
		$banner->user_id = auth()->user()->id;

		// $filename = '';
		// if($request->hasFile('banner')){
		// 	$filename = 'banner/'.str_random(10).'.'.$request->file('banner')->getClientOriginalExtension();
		// 	Storage::put($filename, file_get_contents($request->file('banner')));
		// 	$banner->banner = Storage::url($filename);
		// }

		$banner->hero = $request->get('hero');
		$banner->lead = $request->get('lead');
		$banner->isenabled = $banner->isenabled;
		$banner->update();

		$banners = Banner::orderBy('id', 'desc')->get();
		return view('pages.backend.banner._tableBanner', compact('banners'));
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
		$banner = Banner::find(decrypt($id));
		Storage::delete($banner->banner);
		$banner->delete();

		$banners = Banner::orderBy('id', 'desc')->get();
		return view('pages.backend.banner._tableBanner', compact('banners'));
	}

	public function enabled($id, $isenabled)
	{
		$banner = Banner::find(decrypt($id));
		Storage::delete($banner->banner);
		$banner->isenabled = $isenabled;
		$banner->update();

		$banners = Banner::orderBy('id', 'desc')->get();
		return view('pages.backend.banner._tableBanner', compact('banners'));
	}
}