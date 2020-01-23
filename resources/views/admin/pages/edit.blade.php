@extends('adminlte::page')
@section('title', 'Editar')

@section('content_header')

<h1>Editar Página:
</h1>

@endsection

@section('content')

@if($errors->any())

<div class="alert alert-danger">
<ul>
<h5>
	<i class="icon fa fa-ban"></i>

	Ocorreu erro</h5>
@foreach($errors->all() as $erro)

<li>{{$erro}}</li>

@endforeach

</ul>

</div>
@endif









<div class="card">

<div class="card-header">

	<form action="{{route('pages.update',['page'=>$page->id])}}" method="POST" class="form-horizontal">
     @method('PUT')
		@csrf

		<div class="form-group row">

		  <label class="col-sm-2 col-form-label">Titulo:</label>
		  <div class="col-sm-8">
		   <input type="text" name="title" value="{{$page->title}}" class="form-control @error('title')is-invalid @enderror"/>



		</div>
		</div>

		<div class="form-group row">

		  <label class="col-sm-2 col-form-label">Conteudo:</label>
		  <div class="col-sm-8">
            <textarea name="body" class="form-control bodyfield">{{$page->body}}</textarea>
		  
		
		</div>
		</div>

		
	
		<div class="form-group row">

		  <label class="col-sm-2 col-form-label"></label>
		  <div class="col-sm-8">
		   <input type="submit" value="Salvar" class="btn btn-success"/>


		</div>
		</div>


	</form>
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>



	<script>
		tinymce.init({
		  selector: 'textarea.bodyfield',
		  heigth:300,
		  menubar:false,
		  plugins:['link','table', 'image', 'autoresize','lists'],
		  toolbar: "undo redo |  bold italic backcolor | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link image |table",
          content_css:[
            '{{asset('Assets/css/content.css')}}'

		  ],
		  images_upload_url:'{{route('imageupload')}}',
		  images_upload_credentials:true
       

		});
	  </script>

	@endsection



