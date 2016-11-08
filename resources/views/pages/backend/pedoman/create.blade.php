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
					{!! Breadcrumbs::render('admin.pedoman.create') !!}
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
				@if(sizeof($errors) > 0)
					<div id="card-alert" class="card red">
						<div class="card-content white-text">
							<p><i class="mdi-alert-error"></i> PERHARTIAN, Terjadi Kesalahan Input Data!</p>
							<p>
								<ol>
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ol>
							</p>
						</div>
						<button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
				@endif
				{!! Form::open(['url' => 'admin/pedoman','class' =>'col s12','files' => true]) !!}
					{{ csrf_field() }}
					<div class="row">
						<div class="input-field col s9">
							{!! Form::text('judul', null, ['class'=>'validate']) !!}
							<label for="first_name">Judul Pedoman</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s9">
							{!! Form::textarea('konten', null, ['class'=>'materialize-textarea']) !!}
							<label for="textarea1">Konten</label>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<div class="file-field input-field">
								<div class="btn">
									<span>Dokumen</span>
									{!! Form::file('media_dokumen', null) !!}
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>
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