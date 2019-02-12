@extends('front-end.layouts.master')

@section('content')


    <!--Main Slider-->
    <section class="main-slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                <?php $slc = 1; ?>
                @foreach($sliders as $sld) 
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{!! asset('public/frontend/images/main-slider/1.jpg') !!}"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="{!! asset('public/frontend/images/main-slider/1.jpg') !!}" alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">                  
                        <div class="tp-caption sft sfb tp-resizeme"
                        data-x="@if($slc%2){{'left'}}@else{{'right'}}@endif" data-hoffset="@if($slc%2){{'15'}}@else{{'-15'}}@endif"
                        data-y="center" data-voffset="-125"
                        data-speed="1500"
                        data-start="0"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn">
                            <div class="countdown-box @if($slc%2){{'left-side'}}@else{{'right-side'}}@endif">
                                <div class="countdown-timer">
                                    <div class="countdown-container">
                                        <div class="default-coundown">
                                            <div class="countdown time-countdown" data-countdown-time="{{$eventCountdown}}"></div>
                                        </div>                       
                                    </div>                           
                                </div>
                            </div>
                        </div> 
                        <div class="tp-caption sft sfb tp-resizeme"
                        data-x="@if($slc%2){{'left'}}@else{{'right'}}@endif" data-hoffset="@if($slc%2){{'15'}}@else{{'-15'}}@endif"
                        data-y="center" data-voffset="0"
                        data-speed="1500"
                        data-start="0"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn">
                            <!-- <h5>February 22, 2017</h5> -->
                            <h5>{{date('F d, Y',strtotime($eventCountdown))}}</h5>
                        </div>
                        <div class="tp-caption sft sfb tp-resizeme"
                        data-x="@if($slc%2){{'left'}}@else{{'right'}}@endif" data-hoffset="@if($slc%2){{'15'}}@else{{'-15'}}@endif"
                        data-y="center" data-voffset="50"
                        data-speed="1500"
                        data-start="0"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn">
                            <!-- <h1>Conference in Paris 2017</h1> -->
                            <h1>Event In {{$venue}} {{date('Y',strtotime($eventCountdown))}}</h1>
                        </div>                    
                        <div class="tp-caption sfb sfb tp-resizeme"
                        data-x="center" data-hoffset="@if($slc%2){{'-500'}}@else{{'320'}}@endif"
                        data-y="center" data-voffset="150"
                        data-speed="1500"
                        data-start="@if($slc%2){{'100'}}@else{{'500'}}@endif"
                        data-easing="easeOutExpo"
                        data-splitin="none"
                        data-splitout="none"
                        data-elementdelay="0.01"
                        data-endelementdelay="0.3"
                        data-endspeed="1200"
                        data-endeasing="Power4.easeIn">
                            <div class="link-btn">
                                <a href="#" class="btn-style-one">Register Now</a>
                            </div>
                        </div>
                        <div class="tp-caption sfb sfb tp-resizeme"
                            data-x="center" data-hoffset="@if($slc%2){{'-320'}}@else{{'500'}}@endif"
                            data-y="center" data-voffset="150"
                            data-speed="1500"
                            data-start="@if($slc%2){{'500'}}@else{{'100'}}@endif"
                            data-easing="easeOutExpo"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <div class="link-btn">
                                <a href="#" class="btn-style-two">Learn More</a>
                            </div>
                        </div>
                        <div class="tp-caption sfb sfb tp-resizeme"
                            data-x="@if($slc%2){{'right'}}@else{{'left'}}@endif" data-hoffset="@if($slc%2){{'0'}}@else{{'-80'}}@endif"
                            data-y="top" data-voffset="@if($slc%2){{'100'}}@else{{'0'}}@endif"
                            data-speed="1500"
                            data-start="500"
                            data-transform_idle="o:1;" 
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"   
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.3"
                            data-endspeed="1200"
                            data-endeasing="Power4.easeIn">
                            <div class="image-box">
                                <figure>
                                    <img src="{!! asset('public/frontend/images/main-slider/'.$sld->slider_image_name) !!}" alt="">
                                </figure>
                            </div>
                        </div>
                    </li> <!-- end of first slider -->
                    <?php $slc++; ?>
                @endforeach
               </ul>
            </div>
        </div>
    </section>
    <!--End Main Slider-->

    <!--about-section-->
    <section class="about-section" style="background-image: url('{{ asset('public/frontend/images/background/1.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                    <div class="icon-holder">
                        <div class="item text-center">
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                            <h6>{{date('F d, Y',strtotime($activeEvent->start_date))}}</h6>
                        </div>
                        <div class="item text-center">
                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            <h6>{{$venue}}</h6>
                        </div>
                        <div class="item text-center">
                            <a href="#"><i class="fa fa-sitemap" aria-hidden="true"></i></a>
                            <h6>{{$userAttendance}} Audience</h6>
                        </div>
                        <div class="item text-center">
                            <a href="#"><i class="fa fa-microphone" aria-hidden="true"></i></a>
                            <h6>{{$speakers}} Speakers</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                    <div class="content-text">
                        <h3>Open<br><span>Event</span> {{date('Y',strtotime($eventCountdown))}}</h3>
                        <h6>{{$activeEvent->short_description}}</h6>
                        <p>{{$activeEvent->description}}</p>
                        <div class="link-btn">
                            <a href="#" class="btn-style-one">Register Now</a><a href="#" class="btn-style-two">read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End about-section-->

    <!--speaking-section-->
    <section class="speaking-section" style="background: url('{{ asset('public/frontend/images/background/2.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Who <span>Speaking?</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore <br>dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco.</p>
            </div>
            <div class="row">
            @foreach($speakersInfo as $spki)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="image-holder text-center">
                        <div class="image-box">
                            <figure>
                                <img src="{!! asset('public/uploads/speaker-profile-image/'.$spki->profile_image) !!}" alt="">
                            </figure>
                            <div class="overly-box">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                            </div>                                                      
                        </div>
                        <div class="image-content">
                            <a href="speaker-details.html"><h5>{{$spki->name}}</h5></a>
                            <span>{{$spki->title}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>                
        </div>
    </section>
    <!--speaking-section-->

    <!--schedule-section-->
    <section class="schedule-section" id="schedule-tab" style="background-image: url('{{ asset('public/frontend/images/background/3.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Event <span>Schedule</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore <br>dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco.</p>
            </div>
            <div class="schedule-area">
                <div class="schedule-tab-title">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <?php
                                    $start_date = $activeEvent->start_date;
                                    $end_date = $activeEvent->end_date;

                                    while (strtotime($start_date) <= strtotime($end_date)) {
                                        $timestamp = strtotime($start_date);
                                        $day = date('l', $timestamp);  
                                    ?>
                                        <td class="item @if($start_date==$activeEvent->start_date)active @endif" data-tab-name="{{$day}}">
                                            <div class="item-text">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <h5>{{$day}}</h5>
                                                <h6>{{date('M d, Y',strtotime($start_date))}}</h6>
                                            </div>                                            
                                        </td>
                                    <?php
                                        $start_date = date ("Y-m-d", strtotime("+1 days", strtotime($start_date)));
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>            
                </div>
                <div class="schedule-tab-content clearfix">
                <?php
                    $sem_start_date = $activeEvent->start_date;
                    $sem_end_date = $activeEvent->end_date;

                    while (strtotime($sem_start_date) <= strtotime($sem_end_date)) {
                    $timestamp = strtotime($sem_start_date);
                    $semday = date('l', $timestamp);

                    $seminerShedules = \App\SeminarManagement::whereDate(DB::raw("DATE(start_date)"),'=',$sem_start_date)->get();
                        
                    //echo "<pre>"; print_r($seminerShedules);  
                ?>
                    <div id="{{$semday}}">
                        <div class="inner-box  table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Speaker</th>
                                        <th>Subject</th>
                                        <th>Venue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($seminerShedules as $semsdl)
                                    <tr>
                                        <td class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('h:i A',strtotime($semsdl->start_date))}}</td>
                                        <td class="speakers">
                                            <div class="speaker">
                                                <div class="image-box">
                                                    <img src="{!! asset('public/uploads/speaker-profile-image/'.$semsdl->speaker_name_seminar->profile_image) !!}" alt="" style="width: 50px; height: 50px; border-radius: 50%;">
                                                </div>
                                                <h4><a href="speaker-details.html">
                                                {{$semsdl->speaker_name_seminar->name}}
                                                </a></h4>
                                            </div>
                                        </td>
                                        <td class="subject">{{$semsdl->title}}</td>                            
                                        <td class="venue">{{$semsdl->room_hall}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- div end of  -->
                    <?php
                        $sem_start_date = date ("Y-m-d", strtotime("+1 days", strtotime($sem_start_date)));
                        }
                    ?>
                </div>
            </div>                
        </div>
    </section>
    <!--End schedule-section-->

    <!--contact-us-->
    <section class="contact-us" style="background-image: url('{{ asset('public/frontend/images/background/11.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="default-form-area">
                        <div class="section-title">
                            <h3>Register to <span>Eventic Now</span></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor</p>
                        </div>                            
                        <form id="contact-form" name="contact_form" class="default-form" action="http://html.tonatheme.com/2017/eventic_html/inc/sendmail.php" method="post" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="contact-area-left">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" placeholder="Phone">
                                        </div>
                                    </div>                               
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="contact-area-right">                                        
                                        <div class="form-group">
                                            <input type="email" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <select class="text-capitalize selectpicker form-control required" name="form_subject" data-style="g-select" data-width="100%">
                                                <option>Ticket Type</option>
                                                <option>Insurance</option>
                                                <option>Finance</option>
                                            </select>
                                        </div>
                                    </div>                                      
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group top-padd">
                                        <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                        <button class="btn-style-one" type="submit" data-loading-text="Please wait...">send message</button>
                                    </div>
                                </div>
                            </div>                                        
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="image-box">
                        <figure>
                            <img src="{!! asset('public/frontend/images/background/10.jpg') !!}" alt="">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End contact-us-->

    <!--gellary-section-->
    <section class="gallery-section" style="background-image: url('{{ asset('public/frontend/images/background/4.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Event <span>Gallery</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore <br>dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco.</p>
            </div>
            <div class="row inner-container">
                @foreach($fontEndEventGallery as $feeg)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="img_holder">
                                <img src="{{ asset('public/frontend/images/event-image-gallery/'.$feeg->event_image_name) }}" alt="images" class="img-responsive">
                            </div>
                            <div class="overlay-box text-center">                       
                                <a href="{{ asset('public/frontend/images/event-image-gallery/'.$feeg->event_image_name) }}" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                            </div> 
                        </div>                                           
                    </div>
                @endforeach
            </div>
            <div class="link-btn text-center">
                <a href="gallery.html" class="btn-style-one">read more</a>
            </div>
        </div>
    </section>
    <!--End gellary-section-->

    <!--sponsors section-->
    <div class="sponsors" style="background-image: url('{{ asset('public/frontend/images/background/5.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Event <span>Sponsors</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore <br>dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco.</p>
            </div>
            <div class="sponsors-logo text-center">
                <ul class="sponsors-five-cloumn">
                    <h6>Platinum Sponsors</h6>
                    @foreach($platinumSponsors as $pltsp)
                        <li>
                            <figure>
                                <!-- <a href="#"><img src="{{ asset('public/frontend/images/clients/1.png') }}" alt=""></a> -->
                                <a href="#"><img src="{!! asset('public/uploads/sponsor-logo/'.$pltsp->sponsor_name->logo) !!}" alt="...." width="20%" height="30px"></a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <ul class="sponsors-three-cloumn">
                    <h6>Gold Sponsors</h6>
                    @foreach($goldSponsors as $gldsp)
                        <li>
                            <figure>
                                <a href="#"><img src="{!! asset('public/uploads/sponsor-logo/'.$gldsp->sponsor_name->logo) !!}" width="30%" height="40px"></a>
                            </figure>
                        </li>
                    @endforeach
                </ul>
                <div class="link-btn">
                    <a href="#" class="btn-style-one">Become A Sponsor</a>
                </div>
            </div>
        </div>
    </div>
    <!--End sponsors section-->

    <!--ticket-price section-->
    <!--<section class="ticket-price" style="background-image: url('{{ asset('public/frontend/images/background/6.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Choose A <span>Plan</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore <br>dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco.</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xa-12">
                    <div class="price-item text-center">
                        <div class="colmun-title">
                            <h6>Starter</h6>
                        </div>
                        <div class="price-money">
                            <h1>49.00<span>$</span></h1>
                            <p>Per Person</p>
                        </div>
                        <ul class="catagory-list">
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>1 Comfortable Seats</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Free Lunch and Coffee</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Certificate</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Easy Access</li>
                        </ul>
                        <div class="link-btn">
                            <a href="#" class="btn-style-two">Register Now</a>
                        </div>                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xa-12">
                    <div class="price-item text-center">
                        <div class="colmun-title">
                            <h6>Standerd</h6>
                        </div>
                        <div class="price-money">
                            <h1>59.00<span>$</span></h1>
                            <p>Per Person</p>
                        </div>
                        <ul class="catagory-list">
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>1 Comfortable Seats</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Free Lunch and Coffee</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Certificate</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Easy Access</li>
                        </ul>
                        <div class="link-btn">
                            <a href="#" class="btn-style-two">Buy A Ticket</a>
                        </div>                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xa-12">
                    <div class="price-item text-center">
                        <div class="colmun-title">
                            <h6>Platinum</h6>
                        </div>
                        <div class="price-money">
                            <h1>79.00<span>$</span></h1>
                            <p>Per Person</p>
                        </div>
                        <ul class="catagory-list">
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>1 Comfortable Seats</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Free Lunch and Coffee</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Certificate</li>
                            <li><i class="fa fa-circle-thin" aria-hidden="true"></i>Easy Access</li>
                        </ul>
                        <div class="link-btn">
                            <a href="#" class="btn-style-two">Buy A Ticket</a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!--End ticket-price section-->  

    <!--news-section Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Latest <span>News</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore <br>dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco.</p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="image-holder">
                        <div class="image-box">
                            <figure>
                                <a href="blog-details.html"><img src="{{ asset('public/frontend/images/blog/1.jpg') }}" alt=""></a>
                            </figure>
                            <div class="date-box">
                                <h2>20</h2>
                                <span>February</span>
                            </div>
                        </div>                            
                        <div class="image-content">
                            <a href="blog-details.html"><h5>Nullam cursus lectus at fact.</h5></a>
                            <ul class="item-menu">
                                <li>by <span>Admin</span></li>
                                <li>Business</li>
                                <li>Comts <span>(05)</span></li>
                            </ul>    
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="image-holder">
                        <div class="image-box">
                            <figure>
                                <a href="blog-details.html"><img src="{{ asset('public/frontend/images/blog/2.jpg') }}" alt=""></a>
                            </figure>
                            <div class="date-box">
                                <h2>20</h2>
                                <span>February</span>
                            </div>
                        </div>                            
                        <div class="image-content">
                            <a href="blog-details.html"><h5>Cras sed ligula luctus tincid.</h5></a>
                            <ul class="item-menu">
                                <li>by <span>Admin</span></li>
                                <li>Business</li>
                                <li>Comts <span>(05)</span></li>
                            </ul>    
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="image-holder">
                        <div class="image-box">
                            <figure>
                                <a href="blog-details.html"><img src="{{ asset('public/frontend/images/blog/3.jpg') }}" alt=""></a>
                            </figure>
                            <div class="date-box">
                                <h2>20</h2>
                                <span>February</span>
                            </div>
                        </div>                            
                        <div class="image-content">
                            <a href="blog-details.html"><h5>Elit accumsan egestas velit.</h5></a>
                            <ul class="item-menu">
                                <li>by <span>Admin</span></li>
                                <li>Business</li>
                                <li>Comts <span>(05)</span></li>
                            </ul>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End news-section Style-->

    <!--event-section-->
    <section class="event-section" style="background-image: url('{{ asset('public/frontend/images/background/7.jpg') }}');">
        <div class="container">
            <div class="section-title">
                <h3>Largest Event <span>Ever</span></h3>
                <p>{{$activeEvent->short_description}}</p>
                <div class="link-btn">
                    <a href="#" class="btn-style-one">Register Now</a>
                </div>
            </div>
        </div>
    </section>
    <!--End event-section-->

    <!--Start Google map area-->
    <section class="google-map-area">
        <div class="container-fullwidth">
            <div 
                class="google-map"
                id="contact-google-map" 
                data-map-lat="{{$activeEvent->lat}}" 
                data-map-lng="{{$activeEvent->lng}}" 
                data-icon-path="{{ asset('public/frontend/images/resource/map-marker.png') }}" 
                data-map-title="AQUA AND PET ANIMAL" 
                data-map-zoom="12"
                data-markers='{
                    "marker-1": [{{$activeEvent->lat}}, {{$activeEvent->lng}}, "<h4>{{$activeEvent->title}}</h4><p>{{$activeEvent->venue}}</p>","{{ asset('public/frontend/images/resource/map-marker.png') }}"]
                }'>

            </div>                    
        </div>               
    </section>
    <!--End Google map area--> 

    <!-- map-content section -->
    <section class="map-content">
        <div class="container">
            <div class="content-text">
                <h4>Location</h4>
                <p>Largest Event Ever.</p>
                <h5>{{$activeEvent->venue}}</h5>
                <div class="contact-link">
                    <div class="item">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <h6>{{$activeEvent->venue}}</h6>
                    </div>
                    <div class="item">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h6>[88] 657 524 332</h6>
                    </div>
                    <div class="link-btn">
                        <a href="#" class="btn-style-two">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End map-content section -->

    <!--subscribe-section Style-->
    <!--<section class="subscribe-section" style="background-image: url('{{ asset('public/frontend/images/background/9.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h3>Subscribe to Our <span>Newsletter</span></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <form method="post" action="http://html.tonatheme.com/2017/eventic_html/index.html" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="useremail" value="" placeholder="Enter your email" required="">
                            <button type="submit" class="btn-style-one">subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>-->
    </section>
    <!--End subscribe-section Style-->     


@stop