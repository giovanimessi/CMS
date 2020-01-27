<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\ Visitors;
use App\User;
use App\Page;

class HomeController extends Controller
{
    //

    public function __construct() {
       $this->middleware('auth');

    }

    public function index(){
         
      $visitsCount =0;
      $onlineCount =0;
      $pageCount = 0;
      $userCount =0;
        
         
      //contagem de visitantes
      $visitsCount =  Visitors::count();
    

      //contagem de usuarios online
       $datelimit = date('Y-m-d H:i:s', strtotime('-5 minutes'));
       $onlineList = Visitors::select('ip')->where('date_acess', '>=', $datelimit)->groupBy('ip')->get();
       $onlineCount = count($onlineList);


      $userCount = User::count();
       //contagem de pagina 

       $pageCount = Page::count();
           
       $pagePie =[
         'visitas' => $visitsCount,
         'Páginas' =>   $pageCount,
         'Usuários' => $userCount


       ];

       $pagesLabels = json_encode(array_keys($pagePie));
       $pgeValues = json_encode(array_values($pagePie));


 
         return view('admin.home', [
            
            'visitsCount' => $visitsCount,
            'onlineCount' =>$onlineCount,
            'pageCount' => $pageCount,
            'userCount' => $userCount,
            'pagesLabels' => $pagesLabels,
            'pgeValues' => $pgeValues
           




         ]);
        

  }

  public function data (Request $request){
    



  }

  
}
