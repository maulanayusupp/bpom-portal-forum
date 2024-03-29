<!-- CALL-TO-ACTION -->
<section class="call-to-action">
	<div class="container">
		<div class="pull-left">
			<h2 class="section-heading"></h2>
		</div>
		<div class="pull-right">
			<span>Hubungi Kami - 1500533</span>&nbsp;&nbsp;<a href="{{ url('hubungi-kami') }}" class="btn btn-lg btn-primary">Halo BPOM</a>
		</div>
	</div>
</section>
<!-- END CALL-TO-ACTION -->

<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<!-- COLUMN 1 -->
				<h3 class="sr-only">BPOM</h3>
				<img src="{{ asset('assets/frontend/img/halo-bpom.png') }}" class="logo" alt="Repute">
				<address class="margin-bottom-30px">
					<ul class="list-unstyled">
						<li>Telepon: 1500533</li>
						<li>SMS: 0812199995333</li>
						<li>Email: halobpom@pom.go.id</li>
					</ul>
				</address>
				<!-- END COLUMN 1 -->
			</div>
			<div class="col-md-4">
				<!-- COLUMN 2 -->
				<h3 class="footer-heading">Navigasi</h3>
				<div class="row margin-bottom-30px">
					<div class="col-xs-6">
						<ul class="list-unstyled footer-nav">
							<li><a href="{{ route('galeri.index') }}">Galeri</a></li>
							<li><a href="{{ route('program.index') }}">Program</a></li>
							<li><a href="{{ route('pedoman.index') }}">Pedoman</a></li>
							<li><a href="{{ route('media-promosi.index') }}">Media Promosi</a></li>
						</ul>
					</div>
					<div class="col-xs-6">
						<ul class="list-unstyled footer-nav">
							<li><a href="{{ route('thread.index') }}">Forum Fasilitator</a></li>
							<li><a href="{{ route('pasar-aman.index') }}">Pasar Aman</a></li>
							<li><a href="{{ route('faq.index') }}">FAQ</a></li>
							<li><a href="{{ route('hubungi-kami.index') }}">Hubungi Kami</a></li>
						</ul>
					</div>
				</div>
				<!-- END COLUMN 2 -->
			</div>
			<div class="col-md-4">
				<!-- COLUMN 3 -->
				<div class="newsletter">
					<h3 class="footer-heading">BPOM</h3>
					<p>Direktorat Pengawasan<br>Produk dan Bahan Berbahaya<br>Badan POM<br>Jalan Percetakan Negara</p>
				</div>
				<div class="social-connect">
					<h3 class="footer-heading">SOSIAL MEDIA</h3>
					<ul class="list-inline social-icons">
						<li><a href="https://id-id.facebook.com/BadanPOM/" target="_blank" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/bpom_ri" target="_blank" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
					</ul>
				</div>
				<!-- END COLUMN 3 -->
			</div>
		</div>
	</div>
	<!-- COPYRIGHT -->
	<div class="text-center copyright">
		&copy;2016 {{ config('app.name') }}
	</div>
	<!-- END COPYRIGHT -->
</footer>