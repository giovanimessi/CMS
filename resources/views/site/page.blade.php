@extends('site.layouts')

@section('title',$page['title'])



@section('content') <!--corpo do sistema-->

 <!-- bradcam_area  -->
 <div class="bradcam_area bradcam_bg_1">
    <div class="container my-4">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                <h3>{!!$page['body']!!}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /bradcam_area  -->

@endsection