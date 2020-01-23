@extends('adminlte::page')
@section('title', 'Página')

@section('content_header')

<h1>Nova Página:
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

	<form action="{{route('pages.store')}}" method="POST" class="form-horizontal">

		@csrf

		<div class="form-group row">

		  <label class="col-sm-2 col-form-label">Titulo:</label>
		  <div class="col-sm-8">
		   <input type="text" name="title" value="{{old('title')}}" class="form-control @error('title')is-invalid @enderror"/>



		</div>
		</div>

		<div class="form-group row">

		  <label class="col-sm-2 col-form-label">Conteúdo:</label>
		  <div class="col-sm-8">
          <textarea name="body" class="form-control">{{old('body')}}</textarea>
		  

		</div>
		</div>


		   <input type="submit" value="Salvar" class="btn btn-success"/>


		</div>
		


	</form>

	@endsection



</div>


</div>

