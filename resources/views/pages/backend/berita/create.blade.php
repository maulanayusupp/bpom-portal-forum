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
					{!! Breadcrumbs::render('admin.berita.create') !!}
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
				
				{!! Form::open(['url' => 'admin/berita','class' =>'col s12','files' => true, 'id' => 'formBerita', 'name' => 'formBerita']) !!}
					<div class="row">
						<div class="input-field col s8">
							{!! Form::text('judul', null, ['class'=>'validate']) !!}
							<label for="first_name">Judul Berita</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s8">
							{!! Form::textarea('konten', null, ['class'=>'materialize-textarea']) !!}
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<div class="file-field input-field">
								<div class="btn">
									<span>Foto</span>
									{!! Form::file('photo', null, ['id' => 'photo']) !!}
								</div>
								<div class="file-path-wrapper">
									<input class="file-path validate" type="text">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s8">
							{!! Form::textarea('ket_foto', null, ['class'=>'materialize-textarea']) !!}
							<label for="first_name">Keterangan Foto</label>
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

<div id="modal1" class="modal">
	<div id="modal-body">
		<div class="modal-content">
			
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-blue btn-flat" id="submit">Submit</button>
			<button class="waves-effect waves-red btn-flat" id="closeModal">Close</button>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			CKEDITOR.replace('konten');

			// $(document).on('click', '#uploadFoto', function(e){
			// 	e.preventDefault();

			// 	if($('#photo').val() == ""){
			// 		alert('image kosong.');
			// 	}else{
			// 		var form = document.forms.namedItem("formBerita");
			// 		var formdata = new FormData(form);
			// 		$.ajax({
			// 			async: true,
			// 			url: "{{ route('admin.gambar-berita.store') }}",
			// 			type: 'POST',
			// 			processData: false,
			// 			contentType: false,
			// 			data: formdata,
			// 			cache: false,
			// 			error: function(data){
			// 				var errors = data.responseJSON;
			// 				console.log(errors['image']);
			// 				// Render the errors with js ...
			// 			},
			// 			success: function(data) {
			// 				$('.modal-content').html(data);
			// 				$('#modal1').openModal();
			// 				$('#photo').val('');
			// 			}
			// 		});
			// 	}
			// });

			// $(document).on('click', '#deletePhoto', function(e){
			// 	e.preventDefault();

			// 	$.ajax({
			// 		url: "{{ url('admin/gambar-berita') }}"+"/"+this.getAttribute('data-id'),
			// 		type: 'DELETE',
			// 		data: { _token: this.getAttribute('data-token')},
			// 		cache: true,
			// 		success: function(data) {
			// 			$('.modal-content').html(data);
			// 		}
			// 	})
			// });

			// $(document).on('click', '#lihatFoto', function(e){
			// 	e.preventDefault();

			// 	$.ajax({
			// 		method: "GET",
			// 		url: "{{ route('admin.gambar-berita.index') }}",
			// 		cache: false,
			// 		success: function(data){
			// 			$('.modal-content').html(data);
			// 			$('#modal1').openModal();
			// 		}
			// 	});
			// });

			// $(document).on('click', '#closeModal', function(e){
			// 	e.preventDefault();
			// 	$('#modal1').closeModal();
			// });
		});
	</script>
@endsection