<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //verifica antes de tudo a autenticação sempre
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //listagem
     
           $settings = [];
           //pega informaçoes do banco de dados

           $dbsettings = Setting::get();

           foreach($dbsettings as $dbsetting){
            $settings [ $dbsetting ['name'] ] = $dbsetting['content'];
             

           }


        return view ('admin.settings.index',[
        'settings' => $settings

        ]);
    }

    public function save(Request $request){

        $data = $request->only([

            'title','subtitle', 'email', 'bgcolor','textcolor'

        ]);
        //criar o validador
        $validator = $this->validator($data);

        if($validator->fails()){
            //vai ser redirecionado
            return redirect()->route('settings')
            ->withErrors($validator);
            
        }

          foreach($data as $item => $value){
              Setting ::where ('name', $item)->update([
                  'content' => $value

              ]);

          }




              // e sera redireacionado 

             return redirect()->route('settings');


    }
    //criar validadador
    protected function validator($data){
        return Validator::make($data,[

            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string','email'],
            'bgcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i']


        ]);

     

    }

}
