<!DOCTYPE html>
<html>

<!-- Mirrored from html.tonatheme.com/2017/eventic_html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Dec 2017 15:49:45 GMT -->

<!-- Head will go here -->
@include('front-end.layouts._head')

{{--Custom StyleSheet Start--}}

    @yield('style')

{{--Global StyleSheet End--}}

<body>
<div class="page-wrapper"> 	
    <!-- Preloader -->
 	

    <!-- .preloader -->
    {{-- <div class="preloader"></div>  --}} {{-- hide preloder --}}
    <!-- /.preloader -->
    
    <div class="header-top"></div>

    <!-- header will go here -->
    @include('front-end.layouts._header')
    

    @yield('content')
    <!-- footer will go here -->
    @include('front-end.layouts._footer')

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target=".header-top"><span class="icon fa fa-long-arrow-up"></span></div>


    <!-- scripts will go here -->
    @include('front-end.layouts._scripts')

    {{--Custom script Start--}}
    @yield('script')
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114506911-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114506911-1');
</script>

    </body>

    <!-- Mirrored from html.tonatheme.com/2017/eventic_html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 31 Dec 2017 15:51:44 GMT -->
    </html>
