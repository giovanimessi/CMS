@extends('site.layouts')

@section('title',$page['title'])



@section('content') <!--corpo do sistema-->

 
 <div class="bradcam_area bradcam_bg_1">
    <div class="container my-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                <h3>{!!$page['title']!!}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-4">


    <div class="features_area ">
        <div class="container">
            <div class="features_main_wrap">
                    <div class="row  align-items-center">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                <div class="features_info2">
                                    <h3>{!!$page['title']!!}
                                        </h3>

                                        <div class="col-xl-12 col-lg-5 offset-xl-1 offset-lg-1 col-md-12 ">
                                            <div class="about_draw wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".5s">
                                                 
                                                {!!$page['body']!!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                            
                    </div>
            </div>
        </div>
           
    </div>


</div>  





@endsection