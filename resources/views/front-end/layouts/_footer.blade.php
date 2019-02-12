    <?php
        $siteInfo = \App\Settings::all();
    ?>

    <!--Main Footer-->
    <footer class="main-footer" style="    padding-top: 20px;">
    	<div class="small-container text-center">
            <!--<div class="footer-logo">-->
            <!--    <figure>-->
            <!--        <a href=""><img src="{{URL::to('/')}}/{{$siteInfo[0]->logo}}" alt="" style="width: 145px;"></a>-->
            <!--    </figure>-->
            <!--</div>-->
            <ul class="links-menu">
                <li><a href="{{'/'}}">Home</a></li>
                <!-- <li><a href="#">Speakers</a></li>
                <li><a href="#">Pages</a></li>
                <li><a href="#">Schedule</a></li>
                <li><a href="#">Sponsors</a></li>
                <li><a href="#">Blog</a></li> -->
                <li><a href="{{URL::to('sponsor')}}">Sponsor</a></li>
                <li><a href="{{URL::to('seminar/seminar-schedule')}}">Schedule</a></li>
                <li><a href="{{URL::to('contact-us')}}">Contact</a></li>
            </ul>
            <ul class="social-links" style="padding-bottom: 20px;">
                <li><a href="{{'http://www.facebook.com/events/1429524813824859/'}}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <!--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
                <!--<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
                <!--<li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>-->
                <!--<li><a href="#"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>-->
            </ul>   
        </div>  
			<div class="container">
						<a href="https://www.worldflagcounter.com/details/dRR"><img src="https://www.worldflagcounter.com/dRR/" alt="Flag Counter"></a>

			</div>
        <!--Footer Bottom-->
        <div class="footer-bottom">
        	<div class="container">
                <div class="text-center footer-text"><p>{{$siteInfo[0]->copyRight}} &copy;  {{date('Y')}} All Right Reserved</p></div>
            </div>            
        </div>         
    </footer>
    <!--Main Footer-->
