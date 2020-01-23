<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

     //se nao tive logado nao terá acesso as funçoes d painel
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('can:edit-users');
 
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //listar

        $users = User::paginate(2);//aqui pegar todos e faz a paginação
        //mandado meu usuario
        $loggedId = intval(Auth::id());
        
          
    
        return view('admin.users.index', [
            'users' => $users, //vai receber o valor
             'loggedId' => $loggedId

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //criar

        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //receber os dados do create 

        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'


        ]);
          //criado o validador
          $validator = Validator::make($data,[
              'name' => ['required', 'string', 'max:100'],
              'email' => ['required', 'string', 'max:100','unique:users'],
              'password' => ['required', 'string', 'min:4','confirmed']


          ]);

          if($validator->fails()){
              return redirect()->route('users.create')
              ->withErrors($validator)
              ->withInput();
          }

          $users = new User;
        
          $users->name =$data['name'];
          $users->email = $data['email'];
          $users->password = Hash::make($data['password']);
          $users->save();

          return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //exibi com id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //editar com id
        //manda id

       
        $user = User::find($id);

        if($user){
            
        return view('admin.users.edit', [
            'user' =>$user

        ]);
           
        }
        return redirect()->route('users.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //atualizar

        $user = User::find($id);

        if($user){

            $data = $request->only([
                
                'name',
                'email',
                'password',
                'password_confirmation'
                 

            ]);
                
            $validator = Validator::make([
                
                'name' => $data['name'],
                'email' =>$data['email']
            ],[

                'name'=> ['required', 'string', 'max:100'],
                'email' =>['required', 'string', 'email', 'max:100']//sem unique se colocar unique da erro

            
            ]);
            
           

                  
              
 
            //alteração do nome
          $user->name = $data['name'];

    
            //verificar se o email foi alterado
            if($user->email != $data['email']){

                //verificar se existe o email alterado
                $hasEmail = User::where('email',$data['email'])->get();

                //verificar se tem o email caso nao tenha podemos alterar
                if(count($hasEmail) === 0){

                    $user->email = $data['email'];


                }else{

                    $validator->errors()->add('email', __('$validator.unique', [
                        'attribute'=>'email'
                        
  
                       ]));
                       
                
                }

            }
            //verificar se o usuario digito a senha
            if(!empty($data['password'])){
                
                //vai iforma que a quantidade de caractere tem que ser min
                if(strlen($data['password']) >= 4){

                //verificar se a confirmação esta ok!
                if($data['password'] === $data['password_confirmation']){

                    //altera a senha

                    $user ->password = Hash::make($data['password']);
                }else{
                    $validator->errors()->add('password', __('$validator.confirmed', [
                        'attribute' =>'password',
                
  
                       ]));

                }

                }else{
                     $validator->errors()->add('password', __('$validator.min.string', [
                      'attribute' =>'password',
                      'min'=> 4

                     ]));
                     

                }

            }
            //mostar error geral

            if(count($validator->errors()) > 0){
                return redirect()->route('users.edit',[
                    'user'=>$id
   
                   ])->withErrors($validator);
   
   

            }

            $user->save();
            }
       return redirect()->route('users.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete

            //pegar o id do usuario que ta logado

            $loggedId = intval(Auth::id());

        //verificar se o id logado e mesmo do usuario se for igual nao podera deletar e se for diferente terá permissao
        if($loggedId !== intval($id)){
            
             $user = User::find($id);
             $user->delete();

        }
        return redirect()->route('users.index');


    }
}
