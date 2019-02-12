@extends('layouts.default')
@section('content')
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 col-md-offset-5">
                <h2>
                    AHCAB
                </h2>

                <p class="col-md-offset-1">
                    <!--Better Customer Experience-->
                </p>
            </div>
        </div>
    </div>
    <div class="content animate-panel">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-xs-12 text-center">
                <?php if (!empty(Session::get('acl')[34][1])) { ?>
                <div class="col-md-4 ">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <div class="hpanel dashboard-box">
                            <div class="panel-body file-body">
                                <i class="fa fa-user" aria-hidden="true"></i><br>
                                <span style="text-align: center; color: #C20000" ><b>{!! $totalRegisterVistor !!}</b></span>
                            </div>
                        </div>

                        <div class="panel-footer" style="margin-top: -27px; background:#f7f9fa;">
                            <a href="{{URL::to('user-registration')}}">Total Visitor</a>
                        </div>
                    </a>

                    <ul class="dropdown-menu animated fadeInRight m-t-xs" style="margin-left: 14px;">
                        <li><a href="{{URL::to('user-registration-today')}}">Today's  Registration &nbsp;<b style="text-align: center; color: #C20000"> ({!! $todayRegistration !!})</b> </a></li>
                        <li class="divider"></li>
                        <li><a href="{{URL::to('user-registration-thisMonth')}}">This Month  Registration &nbsp;<b style="text-align: center; color: #C20000"> ({!! $thisMonthRegistration !!})</b></a></li>
                        <li class="divider"></li>
                        <li><a href="{{URL::to('user-registration-previousMonth')}}">Previous Month User Registration &nbsp;<b style="text-align: center; color: #C20000"> ({!! $previousMonthRegistration !!})</b></a></li>
                    </ul>

                </div>
                <?php } ?>

                <?php if (!empty(Session::get('acl')[25][1])) { ?>
                <div class="col-md-4 ">
                    <a href="{{URL::to('event')}}">
                        <div class="hpanel dashboard-box">
                            <div class="panel-body file-body">
                                <i class="fa fa-calendar" aria-hidden="true"></i><br>

                                <span style="text-align: center; color: #C20000" ><b>{!! $events !!}</b></span>
                            </div>
                            <div class="panel-footer">
                                Total Events
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>


                <?php if (!empty(Session::get('acl')[26][1])) { ?>
                <div class="col-md-4 ">
                    <a href="{{URL::to('seminar-management')}}">
                        <div class="hpanel dashboard-box">
                            <div class="panel-body file-body">
                                <i class="fa fa-comments-o" aria-hidden="true"></i><br>

                                <span style="text-align: center; color: #C20000" ><b>{!! $seminars !!}</b></span>
                            </div>
                            <div class="panel-footer">
                                Total Seminar
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>

                <?php if (!empty(Session::get('acl')[29][1])) { ?>
                <div class="col-md-4 ">
                    <a href="{{URL::to('exibitiors-management')}}">
                        <div class="hpanel dashboard-box">
                            <div class="panel-body file-body">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i><br>

                                <span style="text-align: center; color: #C20000" ><b>{!! $exhibitors !!}</b></span>
                            </div>
                            <div class="panel-footer">
                                Total Exhibitor
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>

            </div>

        </div>

    </div>

    <script type="text/javascript">
        function productinfo() {
            $.ajax({
                url: "{{URL::to('dashboards/productinfo')}}",
                type: "POST",
                //data: {'work_order_id': workOrderId, 'product_id': editId, 'project_id': projectId, 'site_office_id': siteOfficeId},
                dataType: 'html',
                cache: false
            }).done(function (data) {
//            var result = $.parseJSON(data);
//
            });
        }
    </script>

@stop