@extends('adminlte::page')
@section('title', 'Users')

@section('content_header')
 
<h1>Usuarios:


<a href="{{route('users.create')}}" class=" btn btn-sm btn-success">Adicionar novo Usuarios</a>
</h1>

@endsection

@section('content')

<table  class="table table-hover">

 <thead>

   <tr>
   <th>ID</th>
   <th>NOME</th>
   <th>E-MAIL</th>
   <th>AÇÕES</th>

   </tr>

 </thead>  
@foreach($users as $user)

<tr>
   <td>{{$user->id}}</td>
   <td>{{$user->name}}</td>
   <td>{{$user->email}}</td>
   <td>
   <a href="{{route('users.edit',['user'=>$user->id])}}"class="btn btn-info">Editar</a>

   @if($loggedId !== intval($user->id))
   
   <form class="d-inline" method="POST" action="{{route('users.destroy',['user'=>$user->id])}}" onsubmit="return confirm('Tem certeza que deseja fazer essa ação!')">
    @method('DELETE')
    @csrf

<button class="btn btn-danger" >Excluir</button>

   </form>
@endif

   

   </td>

</tr>

@endforeach

</table>

{{$users->links()}}
@endsection