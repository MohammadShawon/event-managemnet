@extends('front-end.layouts.master')

@section('content')


    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{ asset('public/frontend/images/background/12.jpg') }}');">
        <div class="container">
            <div class="title-text">
                <h1>Why Bangladesh</h1>
                <ul class="title-menu clearfix">
                    <li><a href="{{URL::to('/')}}">home</a></li>
                    <li>Why Bangladesh</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!--single-speaker Style-->
    <section class="news-section" style="background-image: url('{{ asset('public/frontend/images/background/8.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <h3>Bangladesh<span> Updates</span></h3>
                <p></p>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="image-box">
                        Bangladesh is a country of growing economy. Our GDP (PPP) is about $259 billion and $1,572 per capita which is increasing about 7% per annum. GDP(nominal) is $ 105 billion and about $850 per capita. Bangladesh is one of the most densely populated country with 160 million population living in 1,47,570 sqkm. Over the last decade our economy is growing at consistent rate. So as the purchasing capacity of our people increasing; so, consumption of protein is also increasing particularly in middle class and upper middle class of the society. Our meat consumption including Poultry and Ruminant is about 4 kg per capita and fish consumption is more than 15kg per capita. Surprisingly per capita milk consumption is below 10 liter which is supposed to be about 100 liter as per WHO. In a nutshell, there is a large demand and supply gap of protein in Bangladesh which needs to be minimized gradually with the change of socio-economic condition of the country.
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="right-side">
                        <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=bangladesh%20+(iedap)&ie=UTF8&t=&z=7&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create a custom Google Map</a> by <a href="https://www.mapsdirections.info/en/">Measure area on map</a></iframe></div><br />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--single-speaker Style-->

@stop


