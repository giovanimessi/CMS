@extends('adminlte::page')
@section('plugins.Chartjs',true)

@section('title','Painel')



@section('content_header')
<div class="row">
<div class="col-md-6">
<h1>Dashboard</h1>

</div>
<div class="col-sm-6">
<form action="" method="post" form="form-inline">
      @csrf
     

      <input type="date"  name="date" >

      <button type="submit" class="btn btn-info btn-sm" title="Pesquisar">Pesquisar
      </button>
  </form>
</div


@endsection




@section('content')

<div class="row">
       <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">

            <h3>{{$visitsCount}}</h3>

           <p>Visitas</p>
            </div>
            <div class="icon">

                <i class="far fa-fw fa-eye"></i> 
            </div>
       </div>
</div>

<div class="col-md-3">
    <div class="small-box bg-success">
        <div class="inner">

        <h3>{{$onlineCount}}</h3>

       <p>Usuários Online</p>
        </div>
        <div class="icon">

            <i class="far fa-fw fa-heart"></i> 
        </div>
   </div>
</div>

<div class="col-md-3">
    <div class="small-box bg-warning">
        <div class="inner">

        <h3>{{$pageCount}}</h3>

       <p>Quantidade de Paginas</p>
      

        </div>
        <div class="icon">

            <i class="far fa-fw fa-sticky-note"></i> 
        </div>

   </div>
   
</div>



<div class="col-md-3">
    <div class="small-box bg-danger">
      <div class="inner">

      <h3>{{$userCount}}</h3>

       <p>Visitantes</p>
      

        </div>
        <div class="icon">

            <i class="far fa-fw fa-user"></i> 
        </div>

   </div>
</div>


  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Paǵinas mais visitadas</h5>
      </div>
      <div class="card-body">
          <canvas id="pagePie"></canvas>
      </div>
    </div>
  </div>


  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Sobre o Sistema</h5>
      </div>
      <div class="card-body">
          ...............
      </div>
    </div>
  </div>

<script>

window.onload = function(){

  let ctx = document.getElementById('pagePie').getContext('2d');
  window.pagePie = new Chart(ctx, {

    type:"pie",
    data:{
      datasets:[{
        data:{{$pgeValues}},  //valores
        backgroundColor:'#00ffff'
      }],

      labels:{!! $pagesLabels !!} 

    },
    options:{
      responsive:true,
      legend:{
        display:false
      }
    }


  })

}


</script>


@endsection

