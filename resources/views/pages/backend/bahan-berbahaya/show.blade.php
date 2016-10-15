@extends('layouts/backend/backend')

@section('title', $title)

@section('content')
<!--breadcrumbs start-->
	<div id="breadcrumbs-wrapper">
		<!-- Search for small screen -->
		<div class="header-search-wrapper grey hide-on-large-only">
			<i class="mdi-action-search active"></i>
			<input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
		</div>
	</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="container">
	<div class="section">
	</div>
	<div id="input-fields">
		<div class="row">
			<div class="col s12">
				<h4 class="header">DAFTAR BAHAN BERBAHAYA</h4>
				<div class="row">
					<div class="col s8">
						{{ $bahanBerbahaya->nama }}
					</div>
				</div>
				<div class="row">
					<div class="col s8">
						{{ $bahanBerbahaya->deskripsi }}
					</div>
				</div>
				<div class="row">
					<div class="col s6">
						<img src="{{ asset($bahanBerbahaya->media_foto) }}">
					</div>
				</div>
				<div class="row">
					<div class="col s6">
						<img src="{{ asset($bahanBerbahaya->media_video) }}">
					</div>
				</div>
				<div class="row">
					<div class="col s6">
						<img src="{{ asset($bahanBerbahaya->media_dokumen) }}">
					</div>
				</div>
				<div class="row">
					<center>
						<a href="{{ url('admin/bahan-berbahaya') }}" class="btn waves-effect waves-light indigo"> KEMBALI </a>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end container-->
@endsection