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
	<div class="container">
		<div class="row">
			<div class="col s12 m12 l12">
				<h5 class="breadcrumbs-title">{{ $title }}</h5>
				{!! Breadcrumbs::render('admin.media-promosi.edit', $media) !!}
			</div>
		</div>
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
				{!! Form::model($media, ['route' => ['admin.media-promosi.update', encrypt($media->id)],'class' =>'col s12','files' => true, 'method' => 'PUT']) !!}
					{{ csrf_field() }}
					<div class="row">
						<div class="input-field col s9">
							{!! Form::text('nama', $media->nama, ['class'=>'validate']) !!}
							<label for="nama">Nama</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s9">
							{!! Form::textarea('deskripsi', $media->deskripsi, ['class'=>'materialize-textarea']) !!}
							<label for="textarea1">Deskripsi</label>
						</div>
					</div>
					<div class="row">
						<center>
							<button class="btn waves-effect waves-light indigo" type="submit" name="action">Submit
					        	<i class="mdi-content-send right"></i>
					      	</button>
						</center>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
<!--end container-->
@endsection