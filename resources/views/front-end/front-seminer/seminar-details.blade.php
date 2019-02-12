@extends('front-end.layouts.master')

@section('content')
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Seminar</h1>
                <ul class="title-menu clearfix">
                    <li><a href="URL::to('/')">home</a></li>
                    <li>Seminar</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="row">
            @if(!empty($seminarInfoDetails->feature_image))
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="image-box">
                        <figure>
                            <img src="{!! asset('public/uploads/seminar-feature-image/'.$seminarInfoDetails->feature_image) !!}" alt="" style="max-width: 370px; max-height: 410px;">
                        </figure>
                    </div>
                </div>
            @endif
<?php 
    $activeEvent = \App\EventManagement::where('status','=',1)->first();

    function speakrName($esp_id){
        $name = \App\SpeakerManagement::where('id','=',$esp_id)->value('name');
        return $name;
    }

?>
                <div class=" @if(!empty($seminarInfoDetails->feature_image)) col-md-8 col-sm-12 col-xs-12 @else col-md-12 col-sm-12 col-xs-12 @endif">
                    <div class="right-side">
                        <h3 style="padding: 5px;"> {{$seminarInfoDetails->title}}</h3>
                        <h4 style="padding: 5px;">Siminar Time: <span style="color: #ff3333; font-size: 16px !important;"> {{date('d F Y,h:i A',strtotime($seminarInfoDetails->start_date))}} To {{date('d F Y,h:i A',strtotime($seminarInfoDetails->end_date))}}</span></h4>
                        <h4 style="padding: 5px;">Registration End: <span style="color: #ff3333;">{{date('d F Y,h:i A',strtotime($seminarInfoDetails->registration_end_date_time))}}</span></h4>
                        <h4 style="padding: 5px;">Venue: <span style="color: #ff3333;">{{$activeEvent->venue}}</span></h4>
                        <h4 style="padding: 5px;">Hall: <span style="color: #ff3333;">{{$seminarInfoDetails->room_hall}}</span></h4>
                        <h4 style="padding: 5px;">Speakers: <span style="color:green;"> 
                            <?php $ala = explode(',', $seminarInfoDetails->speaker_id); $reco=1; ?>

                            @foreach($ala as $dp)
                                {{speakrName($dp)}}
                                @if(count($ala)!=$reco)
                                    {{' ,'}}
                                @endif
                            <?php $reco++; ?>
                            @endforeach
                            </span>
                        </h4>
                        
                        <div class="content-text">
                            <h4 style="padding: 5px;">About Seminar:</h4>
                            <p><?php echo $seminarInfoDetails->description; ?></p>
                        </div>
                        
                    </div>                        
                </div>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


