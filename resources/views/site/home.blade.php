@extends('site.layouts')

@section('title','Home')





@section('content') <!--corpo do sistema-->
 
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-6">
                        <div class="slider_text ">
                            <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s" >{{$front_config['title']}}<br></h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">{{$front_config['subtitle']}}</p>
                            <div class="video_service_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="phone_thumb wow fadeInDown" data-wow-duration="1.1s" data-wow-delay=".2s">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3">

        <h3>Conteudo aqui</h3>


    </div>
    
    
    
@endsection