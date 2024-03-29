@extends('layouts.frontend.app')

@section('title', 'Beranda')

@section('css')
	<link href="{{ asset('assets/frontend/plugin/star-polling/css/star-rating.css') }}" media="all" rel="stylesheet" type="text/css" />
	<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
	<link href="{{ asset('assets/frontend/plugin/star-polling/themes/krajee-svg/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- SLIDER -->
<section class="hero-unit-slider slider-responsive no-margin">
	<div id="carousel-hero" class="slick-carousel">
		<div class="carousel-inner" role="listbox">
			@foreach($banner as $val)
				<div class="item {{ $loop->first ? 'active' : '' }}">
					<img src="{{ asset($val->banner) }}" class="img-responsive" alt="{{ $val->hero }}">
					<div class="carousel-caption">
						<h2 class="hero-heading">{{ $val->hero }}</h2>
						<p class="lead">{{ $val->lead }}</p>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</section>

<!-- BAHAN BERBAHAYA DAN PROGRAM -->
<div class="main-features ">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6"></div>
			<a href="{{ url('bahan-berbahaya') }}" class="col-md-3 col-sm-6 feature-button">
				<i class="fa fa-warning"></i>
				<h3 class="feature-heading">BAHAN BERBAHAYA</h3>
			</a>
			<a href="{{ url('program') }}" class="col-md-3 col-sm-6 feature-button">
				<i class="fa fa-list-alt "></i>
				<h3 class="feature-heading">PROGRAM</h3>
			</a>
			<div class="col-md-3 col-sm-6"></div>
		</div>
	</div>
</div>

<!-- LATEST NEWS -->
<section>
	<div class="container">
		<h2 class="heading">BERITA TERBARU</h2>
		<div class="row">
			<div class="col-md-9">

				<?php $idx = 0; $i = 1; ?>
				@foreach($berita as $val)
					
					@if($idx == 0 || $idx % 2 == 0)
						<div class="row">
					@endif

					<div class="col-md-6" style="padding-top: 1em; padding-bottom: 1em;">
						<div class="news-item news-featured">
							<a href="{{ route('berita.lihat', [base64_encode(config('app.salt').$val->id), str_slug($val->judul, '-')]) }}">
								<img src="{{ asset($val->foto) }}" class="Item Thumbnail" alt="{{ $val->judul }}" width="50" height="200" >
							</a>
							<h3 align="justify"><a href="{{ route('berita.lihat', [base64_encode(config('app.salt').$val->id), str_slug($val->judul, '-')]) }}" type="{{ $val->judul }}" >{{ $val->judul }}</a>
							</h3>
							<p align="justify">{!! substr(strip_tags($val->konten), 0, 200).'...' !!}</p>
						</div>
					</div>

					@if($i == 2)
						</div>
						<?php $i = 1; ?>
					@else
						<?php $i++; ?>
					@endif

					<?php $idx++; ?>
				@endforeach

			</div>
			<div class="col-md-3">
				<a href="http://www.depkes.go.id/article/print/1657/pasar-sehat-upaya-cegah-penularan-penyakit.html" target="_blank">
					<img src="{{ asset('assets/frontend/img/sidebar/bakti-husada.png') }}" class="img-responsive">
				</a>
				<a href="http://sisni.bsn.go.id/index.php/sni_main/sni/detail_sni/22560" target="_blank">
					<img src="{{ asset('assets/frontend/img/sidebar/bsni.png') }}" class="img-responsive">
				</a>
				<a href="http://www.kemendagri.go.id/" target="_blank">
					<img src="{{ asset('assets/frontend/img/sidebar/kementerian-dalam-negeri.png') }}" class="img-responsive">
				</a>
				<a href="http://ews.kemendag.go.id/revitalisasi/index.aspx" target="_blank">
					<img src="{{ asset('assets/frontend/img/sidebar/ministry-of-trade.png') }}" class="img-responsive">
				</a>
				<a href="http://pasarjaya.co.id/" target="_blank">
					<img src="{{ asset('assets/frontend/img/sidebar/pasar-jaya.png') }}" class="img-responsive">
				</a>
				<a href="http://www.searo.who.int/indonesia/areas/promoting_health/Healthy-Market-for-Our-SafeFood/en/" target="_blank">
					<img src="{{ asset('assets/frontend/img/sidebar/world-health.png') }}" class="img-responsive">
				</a>
			</div>
		</div>
	</div>
</section>
<!-- END LATEST NEWS -->

<!-- PASAR AMAN -->
<section class="recent-works">
	<div class="container">
		<h2 class="heading">PASAR AMAN DARI BAHAN BERBAHAYA</h2>
		<h4>Periode pengawasan: {{ $periode['periode'] }}</h4>
		<div class="clearfix"></div>
		<div class="portfolio-static">
			<div class="row">
				<div class="col-md-8">
					<?php $idx = 0; $i = 1; ?>
					@foreach($pasarAman as $pasar)
						<?php $pasarRemote = App\Models\Remote\Pasar::find($pasar->kode_pasar); ?>

						@if($idx == 0 || $idx % 4 == 0)
							<div class="row" style="padding-top: 0.5em; padding-bottom: 0.5em;">
						@endif

						<div class="col-md-3">
							<div class="portfolio-item">
								<div class="overlay"></div>
								<div class="info">
									<h4 class="title">{{ $pasarRemote->nama_pasar }}</h4>
									<a class="fancybox" rel="group" href="{{ $pasarRemote->photo != '' ? str_replace('../', 'http://sipaman.pom.go.id/sipaman/', $pasarRemote->photo) : asset('assets/frontend/img/logo-bpom.png') }}" title="{{ $pasarRemote->nama_pasar }}">
										<button class="btn btn-primary">Lihat</button>
									</a>
								</div>
								<div class="media-wrapper">
									<img src="{{ $pasarRemote->photo != '' ? str_replace('../', 'http://sipaman.pom.go.id/sipaman/', $pasarRemote->photo) : asset('assets/frontend/img/logo-bpom.png') }}" alt="Item Thumbnail" width="180" height="140" />
									<br><center>{{ $pasarRemote->nama_pasar }}</center>
								</div>
							</div>
						</div>

						@if($i == 4)
							</div>
							<?php $i = 1; ?>
						@else
							<?php $i++; ?>
						@endif

						<?php $idx++; ?>
					@endforeach

				</div>
				
				<div class="col-md-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2 class="panel-title section-heading no-margin" align="justify">Bagaimana pendapat Anda tentang tampilan dan konten website Pusat Informasi Pasar Aman dari Bahan Berbahaya?</h2>
						</div>
						<div class="panel-body" id="formPollingContainer">
							@include('pages.frontend.beranda._polling')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>		
<!-- END PASAR AMAN -->
@stop

@section('js')
	<script src="{{ asset('assets/frontend/plugin/star-polling/js/star-rating.js') }}" type="text/javascript"></script>
 
	<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
	<script src="{{ asset('assets/frontend/plugin/star-polling/themes/krajee-svg/theme.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			// with plugin options
			$("#star").rating({showCaption: false, showClear: false});

			$(document).on('submit', '#formPolling', function(e){
				e.preventDefault();

				$.ajax({
					method: "POST",
					url: "{{ route('polling.store') }}",
					data: $('#formPolling').serialize(),
					cache: false,
					success: function(data){
						$('#formPollingContainer').html(data);
						swal({
							title: "Terima Kasih",
							text: "Atas Polling yang sudah diberikan",
							type: "success"
						}, function(){
							// window.location.href = '{{ url('/') }}';
						});
		 
						// with plugin options
						$("#star").rating({showCaption: false, showClear: false});
					}
				});
			});
		});
	</script>
@stop
