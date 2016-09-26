@extends('layouts.frontend.app')

@section('title')Forum Fasilitator
@stop

@section('content')
<!-- SLIDER -->
<section class="hero-unit-slider slider-responsive no-margin">
	<div id="carousel-hero" class="slick-carousel">
		<div class="carousel-inner" role="listbox">
			<div class="item">
				<img src="{{ asset('assets/frontend/img/sliders/slider2-h500.png') }}" class="img-responsive" alt="Slider Image">
				<div class="carousel-caption">
					<h2 class="hero-heading">FORUM</h2>
					<p class="lead">Badan Pengawasan Obat dan Makanan</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- SLIDER -->

<!-- BREADCRUMBS -->
<div class="page-header">
	<div class="container">
		<h1 class="page-title pull-left">@yield('title')</h1>
		<ol class="breadcrumb">
			<li>Navigasi</li>
			<li class="active">@yield('title')</li>
		</ol>
	</div>
</div>
<!-- END BREADCRUMBS -->
<!-- TOPBAR -->
<!-- PAGE CONTENT -->
<div class="page-content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				{{-- ALERT ERROR --}}
				@if(count($errors) > 0)
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<ul>
							@foreach($errors->all() as $message)
								<li>{{ $message }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				{{-- END ALERT ERROR --}}

				<!-- THREAD BARU -->
				<h2 class="section-heading">Thread Baru</h2>
				{!! Form::open(['url' => 'forum-fasilitator', 'class' => 'form-horizontal left-aligned', 'role' => 'form']) !!}
					<div class="form-group">
						<label for="komentar" class="col-sm-2 control-label">Komentar</label>
						<div class="col-sm-10">
							{!! Form::textarea('komentar', null, ['id' => 'komentar', 'class' => 'form-control']) !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2"></div>
						<div class="col-sm-10">
							{!! Recaptcha::render() !!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-2"></div>
						<div class="col-sm-10">
							<button type="submit" class="btn btn-primary">Submit Reply</button>
						</div>
					</div>
				{!! Form::close() !!}
				<!-- END THREAD BARU -->
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
	<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			CKEDITOR.replace('komentar');
		});
	</script>
@stop