@extends('adminlte::page')
@section('title', 'Editar')

@section('content_header')

<h1>Editar Usuario:
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

	<form action="{{route('users.update',['user'=>$user->id])}}" method="POST" class="form-horizontal">
     @method('PUT')
		@csrf

		<div class="form-group row">

		  <label class="col-sm-2 col-form-label">Nome Completo:</label>
		  <div class="col-sm-8">
		   <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name')is-invalid @enderror"/>



		</div>
		</div>

		<div class="form-group row">

		  <label class="col-sm-2 col-form-label">E-mail:</label>
		  <div class="col-sm-8">
		   <input type="email" name="email"value="{{$user->email}}"  class="form-control  @error('name')is-invalid @enderror"/>


		</div>
		</div>

		<div class="form-group row">

		  <label class="col-sm-2 col-form-label">Nova Senha:</label>
		  <div class="col-sm-8">
		   <input type="password" name="password" class="form-control  @error('name')is-invalid @enderror"/>


		</div>
		</div>

		<div class="form-group row">

		  <label class="col-sm-2 control-label">Confirma Senha:</label>
		  <div class="col-sm-8">
		   <input type="password" name="password_confirmation" class="form-control  @error('name')is-invalid @enderror"/>


		</div>
		</div>
		<div class="form-group row">

		  <label class="col-sm-2 col-form-label"></label>
		  <div class="col-sm-8">
		   <input type="submit" value="Salvar" class="btn btn-success"/>


		</div>
		</div>


	</form>

	@endsection



</div>


</div>

