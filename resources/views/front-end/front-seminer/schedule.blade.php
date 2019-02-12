@extends('front-end.layouts.master')

@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Schedule</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li>Schedule</li>
                </ul>
            </div>           
        </div>
    </section>
    <!--End Page Title-->

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
                        
                    //echo "<pre>"; print_r($seminerShedules);
                    $csr = 1;  
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
                                    <tr @if($csr%2==0) class="row-color" @endif>
                                        <td class="time"><i class="fa fa-clock-o" aria-hidden="true"></i> {{date('h:i A',strtotime($semsdl->start_date))}}</td>
                                        <td class="speakers">
                                            <div class="speaker">
                                                <div class="image-box">
                                                    <img src="{!! asset('public/uploads/speaker-profile-image/'.$semsdl->speaker_name_seminar->profile_image) !!}" alt="" style="width: 50px; height: 50px; border-radius: 50%;">
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
                                        <td class="subject"><a href="{{URL::to('seminar-details/front-seminar-details/'.$semsdl->id)}}" target="_blank">
                                                {{$semsdl->title}}
                                                </a></td>                            
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

@stop