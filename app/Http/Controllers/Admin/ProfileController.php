<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use  Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');//fazer autenticação de usuario
    }

    public function index(){
//pega o usuario que esta logado ,especificamente o id

$loggedId = intval(Auth::id());

 //pegar o usuário especifico

 $user = User::find($loggedId);

         if($user){
        return view('admin.profile.index', [
          'user' => $user

        ]);
         }

         return redirect()->route('admin');
    
}
public function save(Request $request)
{
    //salva
    $loggedId = intval(Auth::id());

    $user = User::find($loggedId);

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
            
            //vai informa que a quantidade de caractere tem que ser min
            if(strlen($data['password']) >=4){

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
            return redirect()->route('profile',[
                'user'=>$loggedId

               ])->withErrors($validator);



        }

        $user->save();

        return redirect()->route('profile')
        ->with('warning', 'Usuario alterado com sucesso!');
        }
   return redirect()->route('profile');

 }

}