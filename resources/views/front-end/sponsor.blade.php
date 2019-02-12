@extends('front-end.layouts.master')

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Our sponsor</h1>
                <ul class="title-menu clearfix">
                    <li><a href="index-2.html">home</a></li>
                    <li>Our sponsor</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--sponsors section-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Event <span>Sponsors</span></h3>
            </div>
            <div class="sponsors-logo text-center">
                {{--<ul class="sponsors-five-cloumn">
                    <h6>Platinum Sponsors</h6>
                    @foreach($platinumSponsors as $pltsp)--}}
<?php
// $checkHttpsPl = $pltsp->sponsor_name->website;
// if (strpos($checkHttpsPl, 'https://') !== false) {
    
// }else{
//     $checkHttpsPl = 'https://'.$pltsp->sponsor_name->website;
// }
?>
                       {{-- <li>
                            <figure>
                                <a href="{{$checkHttpsPl}}"><img src="{!! asset('public/uploads/sponsor-logo/'.$pltsp->sponsor_name->logo) !!}" alt="...." width="20%" height="30px"></a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <ul class="sponsors-three-cloumn">
                    <h6>Gold Sponsors</h6>
                    @foreach($goldSponsors as $gldsp)--}}
<?php
// $checkHttpsGl = $pltsp->sponsor_name->website;
// if (strpos($checkHttpsGl, 'https://') !== false) {
    
// }else{
//     $checkHttpsGl = 'https://'.$pltsp->sponsor_name->website;
// }
?>
                        {{--<li>
                            <figure>
                                <a href="{{$checkHttpsGl}}"><img src="{!! asset('public/uploads/sponsor-logo/'.$gldsp->sponsor_name->logo) !!}" width="30%" height="40px"></a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <div class="link-btn">
                    <a href="{{URL::to('sponsor/become-sponsor')}}" class="btn-style-one">Become A Sponsor</a>
                </div>--}}
                
                <div class="row">
                    @foreach($sponsorManageForThisYear as $spmfty)
<?php 
$checkHttpsPlll = $spmfty->sponsor_name->website;
if (strpos($checkHttpsPlll, 'http://') !== false) {
    
}else{
    $checkHttpsPlll = 'http://'.$spmfty->website;
}
?>                     
                        <div class="col-md-4">
                            <h3 style="color: #e6296a;">{{$spmfty->sponsor_type_name->sponsor_type}}</h3><br>
                            <figure>
                                <a href="{{$checkHttpsPlll}}" target="_blank"><img src="{!! asset('public/uploads/sponsor-logo/'.$spmfty->sponsor_name->logo) !!}" alt="...." width="100%">
                                </a>
                            </figure>
                             <!--<div class="col-md-4">-->
                            
                        <!--</div>-->
                        </div>
                    @endforeach
                  </div>
                
            </div>
        </div>
    </div>
    <!--End sponsors section-->

@stop