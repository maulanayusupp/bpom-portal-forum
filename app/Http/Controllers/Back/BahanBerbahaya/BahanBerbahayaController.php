<?php

namespace App\Http\Controllers\Back\BahanBerbahaya;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\BahanBerbahaya\BahanBerbahaya;
use Auth;
use Storage;

class BahanBerbahayaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahanBerbahaya = BahanBerbahaya::orderBy('created_at','desc')->get();
        return view('pages.backend.bahan-berbahaya.index', compact('bahanBerbahaya'))->withTitle('Kelola Bahan Berbahaya');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.backend.bahan-berbahaya.create')->withTitle('Tambah Bahan Berbahaya');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
        ]);
        /* make directory */
        Storage::makeDirectory('bahan-berbahaya/foto');
        Storage::makeDirectory('bahan-berbahaya/video');
        Storage::makeDirectory('bahan-berbahaya/dokumen');
        $file_foto = '';
        $file_video = '';
        $file_dokumen = '';
        if($request->hasFile('media_foto')){
            $file_foto = 'bahan-berbahaya/foto/'.str_random(10).'.'.$request->file('media_foto')->getClientOriginalExtension();
            Storage::put($file_foto, file_get_contents($request->file('media_foto')));
        }
        if($request->hasFile('media_video')){
            $file_video = 'bahan-berbahaya/video/'.str_random(10).'.'.$request->file('media_video')->getClientOriginalExtension();
            Storage::put($file_video, file_get_contents($request->file('media_video')));
        }
        if($request->hasFile('media_dokumen')){
            $file_dokumen = 'bahan-berbahaya/dokumen/'.str_random(10).'.'.$request->file('media_dokumen')->getClientOriginalExtension();
            Storage::put($file_dokumen, file_get_contents($request->file('media_dokumen')));
        }

        $bahan = new BahanBerbahaya;
        $bahan->user_id = Auth::user()->id;
        $bahan->nama = $request->input('nama');
        $bahan->deskripsi = $request->input('deskripsi');
        $bahan->media_foto = !is_null($file_foto) ? Storage::url($file_foto) : '';
        $bahan->media_video = !is_null($file_video) ? Storage::url($file_video) : '';
        $bahan->media_dokumen = !is_null($file_dokumen) ? Storage::url($file_dokumen) : '';
        $bahan->save();
        return redirect('admin/bahan-berbahaya');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bahanBerbahaya = BahanBerbahaya::findOrFail(decrypt($id));
        return view('pages.backend.bahan-berbahaya.show', compact('bahanBerbahaya'))->withTitle('Lihat Bahan Berbahaya');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahanBerbahaya = BahanBerbahaya::findOrFail(decrypt($id));
        return view('pages.backend.bahan-berbahaya.edit', compact('bahanBerbahaya'))->withTitle('Edit Bahan Berbahaya');
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
        $this->validate($request, [
            'nama' => 'required',
        ]);
        /* make directory */
        Storage::makeDirectory('bahan-berbahaya/foto');
        Storage::makeDirectory('bahan-berbahaya/video');
        Storage::makeDirectory('bahan-berbahaya/dokumen');
        $file_foto = '';
        $file_video = '';
        $file_dokumen = '';
        if($request->hasFile('media_foto')){
            $file_foto = 'bahan-berbahaya/foto/'.str_random(10).'.'.$request->file('media_foto')->getClientOriginalExtension();
            Storage::put($file_foto, file_get_contents($request->file('media_foto')));
        }
        if($request->hasFile('media_video')){
            $file_video = 'bahan-berbahaya/video/'.str_random(10).'.'.$request->file('media_video')->getClientOriginalExtension();
            Storage::put($file_video, file_get_contents($request->file('media_video')));
        }
        if($request->hasFile('media_dokumen')){
            $file_dokumen = 'bahan-berbahaya/dokumen/'.str_random(10).'.'.$request->file('media_dokumen')->getClientOriginalExtension();
            Storage::put($file_dokumen, file_get_contents($request->file('media_dokumen')));
        }
        
        $bahanBerbahaya = BahanBerbahaya::findOrFail($id);
        $bahanBerbahaya->nama = $request->input('nama');
        $bahanBerbahaya->deskripsi = $request->input('deskripsi');
        $bahanBerbahaya->media_foto = !is_null($file_foto) ? Storage::url($file_foto) : '';
        $bahanBerbahaya->media_video = !is_null($file_video) ? Storage::url($file_video) : '';
        $bahanBerbahaya->media_dokumen = !is_null($file_dokumen) ? Storage::url($file_dokumen) : '';
        $bahanBerbahaya->save();
        return redirect('admin/bahan-berbahaya');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bahanBerbahaya = BahanBerbahaya::find($id);
        BahanBerbahaya::find($id)->delete();
        return redirect('admin/bahan-berbahaya');
    }
}