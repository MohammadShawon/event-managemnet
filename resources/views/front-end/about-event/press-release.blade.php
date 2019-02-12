@extends('front-end.layouts.master')

@section('content')


    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Press Release</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Press Release</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Press <span> Release</span></h3>
                <p></p>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="image-box text-center">
						<img src="{!! asset('public/uploads/event-organizar-logo/iedappress.gif') !!}" alt="" /><br><br>
                        <strong class="text-center"> <u>4th International Exhibition On Dairy, Aqua & Per-2018 Start On 8th March 2018</u></strong><br>
                    </div>
					<div class="image-box">
						<p>4th International Exhibition and Seminar of Dairy, Aqua and Pet-2018 will be organized by Animal Health Companies Association of Bangladesh (AHCAB) from 8-10th March 2018 at Bangabandhu International Conference Centre, Dhaka. The Exhibition i5 aimed to promote the dairy, aqua and companion animal sector of Bangladesh for both local as well as global market. Bangladesh, USA, Canada, Italy, UK, Netherland, Japan, China, Spain, Turkey, India, Romania, Vietnam, Korea, Thailand and other countries Will exhibit their products in 300 stalls (125 exhibitors company). We hope that, animal health sector will be benefited from this seminar. Hon'ble Finance Minister will inaugurate the Opening Ceremony on 8th March 2018 at 11:30am at Bangabandhu International Conference Center, Sher-E-Bangia Nagar, Dhaka. Mr Narayon Chandra Chandra, MP, Hon'ble Minister of Fisheries & Livestock will be present as Special Guest and Mr Md Raisul Alam Mondal, Secretary, Ministry Fisheries & Livestock will also present as Guest of Honor.</p>
						<p>In addition to that, 3 days seminar session from 8-10th March will also be held where around 61 technical papers will be presented to discriminate the modern technology, problems, solutions and prospects of dairy, aqua and pet animal which will be conducted by renowned scientist of local and abroad. A large number farmers, investors, entrepreneur, students, scientists, professionals and business entity is expected to visit the programme.</p>
						<p>Mr AKM Alamgir, President and Dr Md Kamruzzaman Secretary General and other Executive Member were also present at the press conference. The exhibition is supported by Ministry of Commerce and Ministry of Fisheries & Livestock Services. The exhibition & seminar session are sponsored by MSD Animal Health - Bengal Overseas Limited as Platinum Sponsor, PVS Group India as Gold Sponsor and Dhaka Group as Silver sponsor.</p>
						<p><strong><br>Dr Md Kamruzzaman<br>Secretary General, AHCAB</strong></p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


