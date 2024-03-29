<?php

namespace App\Http\Controllers\Back\PasarAman;
use App\Models\PasarAman\PasarAman;
use App\Models\PasarAman\MonitoringPasar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengawasanPasarController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth:web');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$pasarAman = PasarAman::all();
		return view('pages.backend.pengawasan-pasar.index', compact('pasarAman'))->withTitle('Pengawasan Pasar');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
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
		// for($i=0;$i<count($request->get('nilai_bb'));$i++){
		// 	$monitoringPasar = new MonitoringPasar;
		// 	$monitoringPasar->user_id = auth('forum')->user()->id;
		// 	$monitoringPasar->pasar_aman_id = $request->get('id')[$i];
		// 	$monitoringPasar->tahun_survey = date('Y', strtotime($request->get('awal_periode')));
			
		// }
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
