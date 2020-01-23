@extends('adminlte::page')
@section('title', 'Configurações')


@section('content_header')

<h1>Configuração do Site:
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

<div class="card-body bg-info">

<form method="POST" action="{{route('settings.save')}}" class="form-horizontal">
 @method('PUT')
 @csrf
 
 <div class="form-group row">

  <label class="col-sm-2 col-form-label">Titulo do Site  </label>

  <div class="col-sm-10">
  <input type="text" name="title" value="{{$settings['title']}}" class="form-controls"/>

  </div>

 </div>




  <div class="form-group row">

    <label class="col-sm-2 col-form-label">SubTitulo  </label>
  
    <div class="col-sm-10">
    <input type="text" name="subtitle"  value="{{$settings['subtitle']}}" class="form-controls"/>
  
    </div>

  </div>
    <div class="form-group row">

        <label class="col-sm-2 col-form-label">E-mail de Contato </label>
      
        <div class="col-sm-10">
        <input type="email" name="email" value="{{$settings['email']}}"  class="form-controls"/>
      
        </div>
    </div>

        <div class="form-group row">

            <label class="col-sm-2 col-form-label">Cor do fundo  </label>
          
            <div class="col-sm-10">
             <input type="color" name="bgcolor" value="{{$settings['bgcolor']}}"   class="form-controls"/>
          
            </div>
        </div>



            <div class="form-group row">

                <label class="col-sm-2 col-form-label">Cor do texto  </label>
              
                <div class="col-sm-10">
                 <input type="color" name="textcolor"  value="{{$settings['textcolor']}}"   class="form-controls"/>
              
                </div>

            </div>



  <div class="form-group row">

    <label class="col-sm-2 col-form-label"></label>
  
    <div class="col-sm-10">
     <input type="submit" value="Salvar" class="form-controls"/>
  
    </div>



 </div>

</form>

</div>

</div>


@endsection