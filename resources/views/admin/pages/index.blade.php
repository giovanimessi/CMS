@extends('adminlte::page')
@section('title', 'Páginas')

@section('content_header')
 
<h1>Minha Páginas


<a href="{{route('pages.create')}}" class=" btn btn-sm btn-success">Nova Página</a>
</h1>

@endsection

@section('content')

<table  class="table table-hover">
 <thead>

   <tr>

   <th width="50">ID</th>
   <th>Titulo</th>
   
   <th width="300">AÇÕES</th>

 </tr>  

 </thead>
@foreach($pages as $page)

<tr>
   <td>{{$page->id}}</td>
   <td>{{$page->title}}</td>
   
   <td>

      <a href="" target="_blank"  class=" btn btn-success">Ver</a>
   <a href="{{route('pages.edit',['page'=>$page->id])}}"class="btn btn-info">Editar</a>
   

  
   
   <form class="d-inline" method="POST" action="{{route('pages.destroy',['page'=>$page->id])}}" onsubmit="return confirm('Tem certeza que deseja fazer essa ação!')">
    @method('DELETE')
    @csrf

            <button class="btn btn-danger" >Excluir</button>



   

   </td>

</tr>

@endforeach

</table>

{{$pages->links()}}
@endsection