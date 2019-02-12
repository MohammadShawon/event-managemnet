<?php
    $siteInfo = \App\Settings::all();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Page title -->
        <title>{{$siteInfo[0]->site_title}}</title>
         <link rel="shortcut icon" href="{{URL::to('/')}}/{{$siteInfo[0]->favicon}}">
        <!-- Vendor styles -->
        <link rel="stylesheet" href="{{ url('vendor/fontawesome/css/font-awesome.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/metisMenu/dist/metisMenu.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/animate.css/animate.css') }}">
        <link rel="stylesheet" href=" {{ url('vendor/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/sweetalert/lib/sweet-alert.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/select2-3.5.2/select2.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/select2-bootstrap/select2-bootstrap.css')}}">
        <link rel="stylesheet" href="{{ url('vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/summernote/dist/summernote.css') }}">
        <link rel="stylesheet" href="{{ url('fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('styles/style.css') }}">
        <link rel="stylesheet" href=" {{ url('dist/css/lightbox.css') }}">
        <link rel="stylesheet" href="{{ url('vendor/toastr/build/toastr.min.css')}}">
        <link rel="stylesheet" href=" {{ url('css/custom.css')}}">
        <link rel="stylesheet" href="{{ url('css/print.css')}}">
        <link rel="stylesheet" href="{{ url('css/font/font.css')}}">
        <link rel="stylesheet" href="{{ url('css/bootstrap-select.css')}}">
        <link rel="stylesheet" href="{{ url('css/font-awesome.min.css')}}">
        @yield('styles')
        <script>
        $.ajaxSetup(
        {
            headers:
           {
            'X-CSRF-Token': $('input[name="_token"]').val();
            }
        });
        </script>


















        <!---js-->

        <script rel="javascript" src=" {{ url('vendor/jquery/dist/jquery.min.js') }}"></script>

    </head>

    <body>

        <!-- Simple splash screen-->
        <div class="splash"> <div class="color-line"></div><div class="splash-title"><img src="{{URL::to('/')}}/{{$siteInfo[0]->logo}}" class="rotating123" width="64" height="64" /><h1 class="mm-group-text"><b>{{$siteInfo[0]->site_title}}</b></h1><p></p> </div> </div>

        <!-- Header -->
        @include('includes.header')

        <!----------------- Main Menu Call -------------------->
        @include('includes.mainMenu')
        <div id="wrapper">
            <!----------------- Container Call -------------------->
            @yield('content')
            <footer class="footer">
                <span class="pull-right">
                    Powered By <a href="http://event.dhakaapps.com/" target="_blank">{{$siteInfo[0]->site_title}}</a>
                </span>
                Copyright &copy; <a href="http://event.dhakaapps.com/" target="_blank">{{$siteInfo[0]->site_title}}</a>
            </footer>
        </div>

        <!-- Vendor scripts -->
        <script rel="javascript" src=" {{ url('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('dist/js/lightbox-plus-jquery.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script rel="javascript" src="   {{ url('js/bootstrap-select.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/jquery-flot/jquery.flot.js') }}"></script>
        <script rel="javascript" src="{{ url('vendor/jquery-flot/jquery.flot.resize.js') }}"></script>
        <script rel="javascript" src="{{ url('vendor/jquery-flot/jquery.flot.pie.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/flot.curvedlines/curvedLines.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/jquery.flot.spline/index.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/metisMenu/dist/metisMenu.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/iCheck/icheck.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/peity/jquery.peity.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/sparkline/index.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/sweetalert/lib/sweet-alert.min.js') }}"></script>
        <script rel="javascript" src="{{ url('vendor/select2-3.5.2/select2.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <script rel="javascript" src="{{ url('vendor/summernote/dist/summernote.min.js') }}"></script>
        <script rel="javascript" src=" {{ url('vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script rel="javascript" src="  {{ url('vendor/datatables_plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
        <script rel="javascript" src="   {{ url('vendor/toastr/build/toastr.min.js') }}"></script>
        <script rel="javascript" src="  {{ url('scripts/homer.js') }}"></script>
        <script rel="javascript" src="    {{ url('scripts/charts.js') }}"></script>
        <script rel="javascript" src="   {{ url('js/custom.js') }}"></script>
        <script rel="javascript" src="   {{ url('js/jquery-ui-timepicker-addon.js') }}"></script>
        {!! Html::script("js/bootbox.min.js")!!}

        <!-- for datetimepicker -->
        {!! Html::script("assets/libs/handlebars/handlebars.runtime.min.js")!!}
        {!! Html::script("assets/libs/moment/moment.min.js")!!}
        {!! Html::script("assets/libs/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js")!!}
        {!! Html::script("assets/libs/wysihtml5x/wysihtml5x-toolbar.min.js")!!}
        {!! Html::script("assets/libs/bootstrap3-wysihtml5-bower/bootstrap3-wysihtml5.min.js")!!}
        <!-- for datetimepicker end-->

        @yield('js')
        <script type="text/javascript">
            $(window).on('load', function () {

                $('.selectpicker').selectpicker({
                    'selectedText': 'cat'
                });

                // $('.selectpicker').selectpicker('hide');
            });
        </script>


























        <script>

            $(function () {
                /**
                 * Flot charts data and options
                 */
                var data1 = [[0, 509], [1, 48], [2, 40], [3, 36], [4, 40], [5, 60], [6, 50], [7, 51]];
                var data2 = [[0, 56], [1, 49], [2, 41], [3, 38], [4, 46], [5, 67], [6, 57], [7, 59]];

                var chartUsersOptions = {
                    series: {
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                    },
                    grid: {
                        tickColor: "#f0f0f0",
                        borderWidth: 1,
                        borderColor: 'f0f0f0',
                        color: '#6a6c6f'
                    },
                    colors: ["#62cb31", "#efefef"],
                };

                $.plot($("#flot-line-chart"), [data1, data2], chartUsersOptions);

                /**
                 * Flot charts 2 data and options
                 */
                var chartIncomeData = [
                    {
                        label: "line",
                        data: [[1, 10], [2, 26], [3, 16], [4, 36], [5, 32], [6, 51]]
                    }
                ];

                var chartIncomeOptions = {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 0,
                            fill: true,
                            fillColor: "#64cc34"
                        }
                    },
                    colors: ["#62cb31"],
                    grid: {
                        show: false
                    },
                    legend: {
                        show: false
                    }
                };

                $.plot($("#flot-income-chart"), chartIncomeData, chartIncomeOptions);

            });
            function remove_date(e) {
                var id = e;
                $("#" + id).val('');
            }
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114506911-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114506911-1');
</script>

    </body>

</html>