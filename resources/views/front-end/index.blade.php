@extends('front-end.layouts.master')

    @section('style')
        <style>
            /*.tp-caption .sft .sfb .tp-resizeme .start{
                top: 80px !important;
            }*/
        </style>
    @endsection

@section('content')


    <!--Main Slider-->
    <section class="main-slider">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                <?php $slc = 2; ?>
                @foreach($sliders as $sld)
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="{!! asset('frontend/images/main-slider/5a8b276a31f16Facebook-Ad-IEDAP1111.jpg') !!}"  data-saveperformance="off"  data-title="Awesome Title Here">
                        <img src="{!! asset('frontend/images/main-slider/5a8b2eb4c463bFacebook-Ad-IEDAPxyz.jpg') !!}" alt=""  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">                  <!-- 5a8b276a31f16Facebook-Ad-IEDAP1111.jpg -->

                        <div style="color: #616BA6;" class="tp-caption sft sfb tp-resizeme"
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
                            <h5 style="color: rgb(100, 147, 236); /*#2500bc*/ ">{{date('F d, Y',strtotime($eventCountdown))}} To {{date('F d, Y',strtotime($eventCountdownEndDate))}}</h5>
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
                            <!--<h1>Event In {{$venue}} {{date('Y',strtotime($eventCountdown))}}</h1>-->
                            <h1 style="color: #e6296a;" class="@if($slc%2){{'pull-left'}} @else {{'pull-right'}} @endif">{{$activeEvent->title}}</h1><br>
                            <span style="color: rgb(100, 147, 236); text-align: right; line-height: 20px;" class="@if($slc%2){{'pull-right'}} @else {{'pull-right'}} @endif" style="color: white; padding: 0px !important;"><?php echo preg_replace('/,/', '<br>', $activeEvent->venue, 1); ?></span>
                        </div>
                        
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
                            <div class="countdown-box @if($slc%2){{'left-side'}}@else{{'right-side'}}@endif" style="top: -80px;">
                                <div class="countdown-timer">
                                    <div class="countdown-container">
                                        <div class="default-coundown">
                                            <div class="countdown time-countdown" data-countdown-time="{{$eventCountdown}}"></div>
                                        </div>
                                    </div>
                                </div>
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
                                    <!--<img src="{!! asset('frontend/images/main-slider/'.$sld->slider_image_name) !!}" alt="">-->
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
                        <div class="item text-center" style="padding: 58px 0px;">
                            <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i></a>
                            <h6>{{date('F d, Y',strtotime($eventCountdown))}}<br/> To<br/> {{date('F d, Y',strtotime($eventCountdownEndDate))}}</h6>
                        </div>
                        <div class="item text-center" style="padding: 10px;">
                            <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            <!-- <h6>{{$venue}}</h6> -->
                            <h6>{{$activeEvent->venue}}</h6>

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
                        <h3>Event<br><span>{{$activeEvent->title}}</span></h3>
                        <h6>{{$activeEvent->short_description}}</h6>
                        <p>{{$activeEvent->description}}</p>
                        <div class="link-btn">
                            <a href="{{URL::to('front/user-registration')}}" class="btn-style-one">Register Now</a><!-- <a href="#" class="btn-style-two">read more</a> -->
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
            </div>
            <div class="row">
            @foreach($speakersInfo as $spki)
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="image-holder text-center">
                        <div class="image-box">
                            <figure>
                                <img src="{!! asset('uploads/speaker-profile-image/'.$spki->profile_image) !!}" alt="" style="height: 270px;">
                            </figure>
                            
                        </div>
                        <div class="image-content" style="min-height: 100px;">
                            <a href="{{URL::to('speaker-details/front-speaker-details/'.$spki->id)}}" target="_blank"><h5>{{$spki->name}}</h5></a>
                            <!--<span>{{$spki->title}}</span>-->
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
    <!--speaking-section-->

<?php
    function speakrName($esp_id){
        $name = \App\SpeakerManagement::where('id','=',$esp_id)->value('name');
        return $name;
    }
?>

    <!--schedule-section-->
    <section class="schedule-section" id="schedule-tab" style="background-image: url('{{ asset('public/frontend/images/background/3.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Event <span>Schedule</span></h3>
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

                    $csr = 1;
                ?>
                    <div id="{{$semday}}">
                        <div class="inner-box  table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th width="40%">Speaker</th>
                                        <th>Subject</th>
                                        <th>Venue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($seminerShedules as $semsdl)
                                    <tr @if($csr%2==0) class="row-color" @endif>
                                        <td class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('h:i A',strtotime($semsdl->start_date))}}</td>
                                        <td class="speakers">
                                            <div class="speaker">
                                                <div class="image-box">
                                                    <img src="{!! asset('uploads/speaker-profile-image/'.$semsdl->speaker_name_seminar->profile_image) !!}" alt="" style="width: 50px; height: 50px; border-radius: 50%;">
                                                </div>
<?php
    $ala = explode(',', $semsdl->speaker_id);
    $reco=1;
?>

<h4>
@foreach($ala as $dp)
    <a href="{{URL::to('speaker-details/front-speaker-details/'.$dp)}}" target="_blank">
{{speakrName($dp)}}
</a>
@if(count($ala)!=$reco)
    {{'  ,'}}
@endif
<?php $reco++; ?>
@endforeach
</h4>
                                            </div>
                                        </td>
                                        <td class="subject">
                                            <a href="{{URL::to('seminar-details/front-seminar-details/'.$semsdl->id)}}" target="_blank">
                                                {{$semsdl->title}}
                                                </a>
                                        </td>
                                        <td class="venue">{{$semsdl->room_hall}}</td>
                                    </tr>
                                    <?php $csr++; ?>
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
    <section class="contact-us" style="background-image: url('{{ asset('frontend/images/background/11.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="default-form-area">
                        <div class="section-title">
                            <h3>Contact to  <span>{{$activeEvent->title}}</span></h3>
                        </div>
                        <form id="" name="contact_form" class="default-form" action="{{url('contact-us/contact-us-post')}}" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="contact-area-left">
                                        <div class="form-group">
                                            <input type="text" name="con_per_name" placeholder="Your Name" required="required">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="con_per_phone" placeholder="Phone" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="contact-area-right">
                                        <div class="form-group">
                                            <input type="email" name="con_per_email" placeholder="Email" required="required">
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea type="textarea" name="con_per_message" placeholder="your message" required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            <img src="{!! asset('frontend/images/background/10.jpg') !!}" alt="">
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
            </div>
            <div class="row inner-container">
                @foreach($fontEndEventGallery as $feeg)
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <div class="img_holder">
                                <img src="{{ asset('frontend/images/event-image-gallery/'.$feeg->event_image_name) }}" alt="images" class="img-responsive">
                            </div>
                            <div class="overlay-box text-center">
                                <a href="{{ asset('frontend/images/event-image-gallery-resize/'.$feeg->event_image_name) }}" class="fancybox"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="link-btn text-center">
                <a href="gallery.html" class="btn-style-one">see more</a>
            </div>
        </div>
    </section>
    <!--End gellary-section-->

    <!--sponsors section-->
    <div class="sponsors" style="background-image: url('{{ asset('public/frontend/images/background/5.jpg') }}');">
        <div class="container">
					
            <div class="section-title text-center">
                <h3>Event <span>Sponsors</span></h3>
            </div>
            <div class="sponsors-logo text-center">

              <div class="row">
                    @foreach($sponsorManageForThisYear as $spmfty)
<?php
$checkHttpsPlll = $spmfty->sponsor_name->website;
if (strpos($checkHttpsPlll, 'http://') !== false) {

}else{
    $checkHttpsPlll = 'http://'.$spmfty->website;
}
?>
                        <div class="col-md-4" style="margin-bottom: 50px;">
                            <h3 style="color: #e6296a;">{{$spmfty->sponsor_type_name->sponsor_type}}</h3><br>
                            <figure>
                                <a href="{{$checkHttpsPlll}}" target="_blank"><img src="{!! asset('uploads/sponsor-logo/'.$spmfty->sponsor_name->logo) !!}" alt="...." width="100%">
                                </a>
                            </figure>
                             <!--<div class="col-md-4">-->

                        <!--</div>-->
                        </div>
                    @endforeach
                  </div>

                <div></div>
                <div class="link-btn">
                    <a href="{{URL::to('sponsor/become-sponsor')}}" class="btn-style-one">Become A Sponsor</a>
                    <a href="{{URL::to('exhibitor/become-exhibitor')}}" class="btn-style-one">Become An Exhibitor</a>
                </div>
            </div>
        </div>
    </div>
    <!--End sponsors section-->

    <!--news-section Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
			<div class="section-title text-center">
                <h3>Hospitality <span>Partner</span></h3>
            </div>
			<div class="row">
				<h3 style="color: #e6296a;text-align: center; margin-bottom: 20px;">Five Star Category</h3>
				<div class="col-md-3 col-sm-6 col-xs-12"></div>
				<div class="col-md-3 col-sm-6 col-xs-12 text-center">
                            <figure>
                                <a href="http://www.dhakaregency.com/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/dhaka_reg.jpg') !!}" alt="" style="max-width: 100%;"></a>
                            </figure>
							<a href="{{ asset('/uploads/event-organizar-logo/dhakaRegencyHotelResort.pdf') }}" target="_blank">Get Offer</a>
                </div>
				<div class="col-md-3 col-sm-6 col-xs-12 text-center">
                            <figure>
                                <a href="https://www.amari.com/dhaka/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/amari-dhaka.jpg') !!}" alt="" style="max-width: 100%;"></a>
                            </figure>
							<a href="/uploads/event-organizar-logo/AmariDhakaCorporate-rate-for-2018.pdf" target="_blank">Get Offer</a>
                </div>
            </div>
			
			<div class="row">
				<h3 style="color: #e6296a;text-align: center; margin-bottom: 20px; margin-top: 50px;">Three Star Category</h3>
				<div class="col-md-4 col-sm-6 col-xs-12 text-center">
                            <figure>
                                <a href="https://www.hotelaffordinnbd.com/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/hotel-afford-inn.jpg') !!}" alt="" style="max-width: 100%;"></a>
                            </figure>
							<a href="/uploads/event-organizar-logo/HotelProfile2018888Newww.pdf" target="_blank">Get Offer</a>
                </div>
				<div class="col-md-4 col-sm-6 col-xs-12 text-center">
                            <figure>
                                <a href="http://orchardsuites.com/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/hotel-orchard.jpg') !!}" alt="" style="max-width: 100%;"></a>
                            </figure>
							<a href="/uploads/event-organizar-logo/HotelOrchardSuites.pdf" target="_blank">Get Offer</a>
                </div>
				<div class="col-md-4 col-sm-6 col-xs-12 text-center">
                            <figure>
                                <a href="http://www.longbeachhotelbd.com/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/long_beach.jpg') !!}" alt="" style="max-width: 100%;"></a>
                            </figure>
							<a href="uploads/event-organizar-logo/LongBeach.pdf" target="_blank">Get Offer</a>
                </div>
				
            </div>
        </div>
    </section>
    <!--End news-section Style-->

    <div class="sponsors" style="background-image: url('{{ asset('public/frontend/images/background/5.jpg') }}'); padding-bottom: 0;">
        <div class="container">
			<div class="section-title text-center">
                <h3>Planner<span> and </span>Advisor</h3>
				<p>IEDAP website and Online Pre-Registration System</p>
            </div>
            <div class="sponsors-logo text-center">

              <div class="row">
				<div class="col-md-6 text-right" style="margin-bottom: 50px;">
                    <figure>
                        <img src="{!! asset('uploads/sponsor-logo/it-cnv.jpg') !!}" alt="...." width="30%">
                    </figure>
                </div>
				<div class="col-md-6  text-left" style="margin-bottom: 50px; color: #ffffff;">
                    <p style="margin-top: 50px;"><strong>Dr. Enam Ahmed</strong><br>
						CEO<br>
						Baxter Nutrition<br>
						Convener, IT Committee, IEDAP-2018<br>
						Executive Member, AHCAB</p>
                </div>
			  </div>
			</div>
		</div>
	</div>
    
	<!--news-section Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">

<?php
$checkHttpsPl = $activeEvent->organizar_website;
if (strpos($checkHttpsPl, 'http://') !== false) {

}else{
    $checkHttpsPl = 'http://'.$activeEvent->organizar_website;
}
?>
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
					<h3 style="color: #e6296a; text-align: center;">Organized by</h3>
                            <figure>
                                <a href="{{$checkHttpsPl}}" target="-_blank"><img src="{!! asset('uploads/event-organizar-logo/'.$activeEvent->organizar_logo) !!}" alt="" style="max-width: 100%;"></a>
                            </figure>
                </div>

<?php
$checkHttpsP3 = $activeEvent->approved_by_website;
if (strpos($checkHttpsP3, 'http://') !== false) {

}else{
    $checkHttpsP3 = 'http://'.$activeEvent->approved_by_website;
}
?>
                <div class="col-md-3 col-sm-6 col-xs-12">
					<h3 style="color: #e6296a; text-align: center;">Supported by</h3>
                            <figure>
                                <a href="{{$checkHttpsP3}}" target="_blank"><img src="{!! asset('uploads/event-approved-by-logo/'.$activeEvent->approved_by_logo) !!}" alt="" style="max-width: 100%;"></a>
                            </figure>

                </div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 style="color: #e6296a;text-align: center;">Knowledge Day Partner</h3>

                            <figure>
                                <a href="http://www.skytechagropharma.com/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/daypartnar.jpg') !!}" alt="" style="max-width: 100%;"></a>
                            </figure>

                </div>
				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 style="color: #e6296a;text-align: center;">Magazine Partner</h3>

                            <figure>
                                <a href="http://www.bdpoultry24.com/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/BDPLogo.jpg') !!}" alt="" style="max-width: 100%;"></a>
                            </figure>

                </div>			
				
				<div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 50px;">
					<h3 style="color: #e6296a;text-align: center;">Online Registration By</h3>

                            <figure>
                                <a href="http://finaltouchbd.com/" target="_blank"><img src="{!! asset('uploads/event-organizar-logo/online_support.jpg') !!}" alt="" style="max-width: 80%; margin-left: 30px;"></a>
                            </figure>

                </div>
				<?php
$checkHttpsP2 = $activeEvent->event_manager_website;
if (strpos($checkHttpsP2, 'http://') !== false) {

}else{
    $checkHttpsP2 = 'http://'.$activeEvent->event_manager_website;
}
?>
                <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top: 50px;">
					<h3 style="color: #e6296a; text-align: center;">Event Manager</h3>
                            <figure>
                                <a href="{{$checkHttpsP2}}" target="_blank"><img src="{!! asset('uploads/event-manager-logo/'.$activeEvent->event_manager_logo) !!}" alt="" style="max-width: 100%;"></a>
                            </figure>
                </div>
            </div>
        </div>
    </section>
	
	
	<!--Start Google map area-->
    <section class="google-map-area">
        <div class="container-fullwidth">
            <div
                class="google-map"
                id="contact-google-map"
                data-map-lat="{{$activeEvent->lat}}"
                data-map-lng="{{$activeEvent->lng}}"
                data-icon-path="{{ asset('public/frontend/images/resource/map-marker.png') }}"
                data-map-title="AQUA AND PET"
                data-map-zoom="40"
                data-markers='{
                    "marker-1": [{{$activeEvent->lat}}, {{$activeEvent->lng}}, "<h4>{{$activeEvent->title}}</h4><p>{{$activeEvent->venue}}</p>","{{ asset('frontend/images/resource/map-marker.png') }}"]
                }'>

            </div>
        </div>
    </section>
    <!--End Google map area-->
<?php
    $siteInfo = \App\Settings::first();
?>
    <!-- map-content section -->
    <section class="map-content">
        <div class="container">
            <div class="content-text">
                <h4>Venue</h4>
                <p>Largest Event Ever.</p>
                <h5>{{$activeEvent->title}}</h5>
                <div class="contact-link">
                    <div class="item">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <h6>{{$activeEvent->venue}}</h6>
                    </div>
                    <div class="item">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h6>{{'8801713454425'}}</h6>
                    </div>
                    <div class="link-btn">
                        <a href="{{URL::to('front/user-registration')}}" class="btn-style-two">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End map-content section -->

   
@section('script')
<script type="text/javascript">
    $(document).ready(function(){

        $(".tp-caption,.sft,.sfb,.tp-resizeme,h5").css( "line-height", "30px" );
        $(".tp-caption,.sft,.sfb,.tp-resizeme,h1").css( "line-height", "80px" );
        $(".tp-caption,.sft,.sfb,.tp-resizeme,h1").css( "padding-top", "20px" );
        //$(".tp-caption .sft .sfb .tp-resizeme .start").css( "top", "80px" );
    })
</script>
@endsection

@stop
