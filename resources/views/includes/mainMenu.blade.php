<?php
$currentControllerName = Request::segment(1);
$currentControllerName1 = Request::segment(2);
$action = Route::currentRouteAction();
$aclList = Session::get('acl');
$currentPath = Request::path();
?>

<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="{{URL::to('dashboards')}}">
                @if(isset(Auth::user()->photo))
                <img class="img-circle m-b" width="76" height="76" src="{{URL::to('/')}}/public/uploads/thumbnail/{{Auth::user()->photo}}">
                @else
                <img class="img-circle m-b" width="76" height="76" src="{{URL::to('/')}}/public/img/unknown.png">
                @endif
            </a>

            <div class="stats-label text-color">
                <span class="font-extra-bold font-uppercase">{{Auth::user()->first_name.' '. Auth::user()->last_name}}</span>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted"><b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{ URL::to('users/profile/')}}">{{trans('english.PROFILE')}}</a></li>
                        <li><a href="{{ URL::to('users/cpself/') }}">{{trans('english.CHANGE_PASSWORD')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('logout') }}">{{trans('english.SIGN_OUT')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav" id="side-menu">


            <li <?php $current = ($currentControllerName == 'dashboards') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                <a href="{!! URL::to('dashboards') !!}"><span class="nav-label">Dashboard</span></a>
            </li>

            <?php if (!empty($aclList[3][1])|| !empty($aclList[38][1])) { ?>
                <li <?php $current = ($currentControllerName == 'users' || $currentControllerName == 'agent-to-seminer') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                    <a href="#"><span class="nav-label">{{trans('english.USER_MANAGEMENT')}}</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if (!empty($aclList[3][1])) { ?>
                        <li <?php $current = ($currentControllerName == 'users') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                            <a href="{{URL::to('users')}}"> <span class="nav-label">Admin Panel {{trans('english.USER')}}</span></a>
                        </li>
                        <?php } ?>
                        <?php if (!empty($aclList[38][1])) { ?>
                        <li <?php $current = ($currentControllerName == 'agent-to-seminer') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                            <a href="{{URL::to('agent-to-seminer')}}"> <span class="nav-label">Agent To Seminar</span></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <?php if (!empty($aclList[1][1]) || !empty($aclList[2][1])  || !empty($aclList[6][1])) { ?>
                <li <?php $current = ($currentControllerName == 'role' || $currentControllerName == 'roleacl' || $currentControllerName == 'useracl' || $currentControllerName == 'modulelist' || $currentControllerName == 'activitylist') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                    <a href="#"><span class="nav-label">{{trans('english.ACCESS_CONTROL')}}</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if (!empty($aclList[1][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'role') ? 'active' : ''; ?> class="<?php echo $current; ?>"><a href="{{URL::to('role')}}">{{trans('english.ROLE_MANAGEMENT')}}</a></li>
                        <?php } ?>
                        <?php if (!empty($aclList[2][1])) { ?>

                            <li <?php $current = ($currentControllerName == 'roleacl') ? 'active' : ''; ?> class="<?php echo $current; ?>"><a href="{{URL::to('roleacl')}}">{{trans('english.ROLE_ACCESS_CONTROL')}}</a></li>

                        <?php }   ?>

                        <?php if (!empty($aclList[6][1])) { ?>

                            <li <?php $current = ($currentControllerName == 'useracl') ? 'active' : ''; ?> class="<?php echo $current; ?>"><a href="{{URL::to('useracl')}}">{{trans('english.USER_ACCESS_CONTROL')}}</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>

<!-- Event management menu===============================================================-->


            <?php if (!empty($aclList[25][1]) || !empty($aclList[26][1]) || !empty($aclList[28][1]) || !empty($aclList[29][1]) || !empty($aclList[30][1]) || !empty($aclList[31][1]) || !empty($aclList[32][1]) || !empty($aclList[33][1]) || !empty($aclList[34][1]) || !empty($aclList[35][1]) || !empty($aclList[45][1]) || !empty($aclList[46][1]) || !empty($aclList[47][1])) { ?>
                <li <?php $current = ($currentControllerName == 'event' || $currentControllerName == 'seminar-management' || $currentControllerName == 'speaker-management' || $currentControllerName == 'exibitiors-management' || $currentControllerName == 'exhibitor-to-event' || $currentControllerName == 'sponsor-management' || $currentControllerName == 'sponsor-to-event' || $currentControllerName == 'floor-plan' || $currentControllerName == 'user-registration' || $currentControllerName == 'user-pre-registration' || $currentControllerName == 'user-registration-today' || $currentControllerName == 'user-registration-thisMonth' || $currentControllerName == 'user-registration-previousMonth' || $currentControllerName == 'send-email-sms' || $currentControllerName == 'add-message' || $currentControllerName == 'question-answer-download') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                    <a href="#"><span class="nav-label">Event Settings</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if (!empty($aclList[25][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'event') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('event') !!}"><span class="nav-label">Event Management</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[26][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'seminar-management') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('seminar-management') !!}"><span class="nav-label">Seminar Management</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[28][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'speaker-management') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('speaker-management') !!}"><span class="nav-label">Speaker Management</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[29][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'exibitiors-management') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('exibitiors-management') !!}"><span class="nav-label">Exibitiors Management</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[30][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'exhibitor-to-event') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('exhibitor-to-event') !!}"><span class="nav-label">Exibitiors To Event</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[31][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'sponsor-management') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('sponsor-management') !!}"><span class="nav-label">Sponsor Management</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[32][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'sponsor-to-event') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('sponsor-to-event') !!}"><span class="nav-label">Sponsor To Event</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[33][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'floor-plan') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('floor-plan') !!}"><span class="nav-label">Floor Plan</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[34][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'user-registration' || $currentControllerName == 'user-registration-today' || $currentControllerName == 'user-registration-thisMonth' || $currentControllerName == 'user-registration-previousMonth') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('user-registration') !!}"><span class="nav-label">User Registration</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[35][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'user-pre-registration') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('user-pre-registration') !!}"><span class="nav-label">Search User ID Card</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[46][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'add-message') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('add-message') !!}"><span class="nav-label">Add Message</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[45][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'send-email-sms') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('send-email-sms') !!}"><span class="nav-label">Send Email Or SMS</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[47][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'question-answer-download') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('question-answer-download') !!}"><span class="nav-label">Question Answer Download</span></a>
                            </li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>

            <?php if (!empty($aclList[36][1]) || !empty($aclList[37][1])) { ?>
                <li <?php $current = ($currentControllerName == 'event-attendance' || $currentControllerName == 'seminar-attendance') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                    <a href="#"><span class="nav-label">User Attendance</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <?php if (!empty($aclList[36][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'event-attendance') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('event-attendance/event-attendance') !!}"><span class="nav-label">Event Attendance</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[37][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'seminar-attendance') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('seminar-attendance/seminar-attendance') !!}"><span class="nav-label">Seminar Attendance</span></a>
                            </li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>

             <?php if (!empty($aclList[27][1])) { ?>{{--===============================--}}
                <li <?php $current = ($currentControllerName == 'event-settings' || $currentControllerName == 'website-management') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                    <a href="#"><span class="nav-label">Administrative Settings</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <?php if (!empty($aclList[27][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'event-settings') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('event-settings',1) !!}"><span class="nav-label">Event Settings</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[40][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'website-management') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('website-management',1) !!}"><span class="nav-label">Website Management</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[44][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'website-management') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('website-management/question-list') !!}"><span class="nav-label">Question List</span></a>
                            </li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>{{--===============================--}}

                <?php if (!empty($aclList[41][1]) || !empty($aclList[42][1]) || !empty($aclList[43][1])) { ?>{{--===============================--}}
                <li <?php $current = ($currentControllerName == 'contact-us' || $currentControllerName == 'exhibitor' || $currentControllerName == 'sponsor') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                    <a href="#"><span class="nav-label">Front End</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <?php if (!empty($aclList[41][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'contact-us') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('contact-us/front-contact-us-view') !!}"><span class="nav-label">Contact Us</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[42][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'exhibitor') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('exhibitor/front-become-exhibitor-view') !!}"><span class="nav-label">Exhibitor Request</span></a>
                            </li>
                        <?php } ?>

                        <?php if (!empty($aclList[43][1])) { ?>
                            <li <?php $current = ($currentControllerName == 'sponsor') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                <a href="{!! URL::to('sponsor/front-become-sponsor-view') !!}"><span class="nav-label">Sponsor Request</span></a>
                            </li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>{{--===============================--}}

        <!-- Event management menu end ==================================================-->

                 <?php if (!empty($aclList[7][1]) || !empty($aclList[8][1])|| !empty($aclList[9][3])|| !empty($aclList[21][3])|| !empty($aclList[22][3]) || !empty($aclList[39][1])) { ?>
                <li <?php $current = ($currentControllerName == 'module' || $currentControllerName == 'activity'|| $currentControllerName == 'systemSettings'|| $currentControllerName == 'quizSettings'|| $currentControllerName == 'grades'|| $currentControllerName == 'menus'|| $currentControllerName == 'sub-menus') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                    <a href="#"><span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                                <?php if (!empty($aclList[23][1])) { ?>
                                <li <?php $current = ($currentControllerName == 'menus') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                    <a href="{!! URL::to('menus') !!}"><span class="nav-label">Menu Settings</span></a>
                                </li>
                                <?php } ?>

                                <?php if (!empty($aclList[39][1])) { ?>
                                <li <?php $current = ($currentControllerName == 'sub-menus') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                    <a href="{!! URL::to('sub-menus') !!}"><span class="nav-label">Sub Menu Settings</span></a>
                                </li>
                                <?php } ?>

                                <?php if (!empty($aclList[7][1])) { ?>
                                <li <?php $current = ($currentControllerName == 'module') ? 'active' : ''; ?> class="<?php echo $current; ?>"><a href="{{URL::to('module')}}">Module Management</a></li>
                                <?php } ?>
                                <?php if (!empty($aclList[8][1])) { ?>

                                <li <?php $current = ($currentControllerName == 'activity') ? 'active' : ''; ?> class="<?php echo $current; ?>"><a href="{{URL::to('activity')}}">Activity Management</a></li>

                                <?php }   ?>

                                <?php if (!empty($aclList[9][3])) { ?>

                                <li <?php $current = ($currentControllerName == 'systemSettings') ? 'active' : ''; ?> class="<?php echo $current; ?>">
                                    <a href="{!! URL::to('systemSettings') !!}"><span class="nav-label">System Settings</span></a>
                                </li>
                                <?php } ?>


                    </ul>
                </li>
                <?php } ?>





        </ul>
    </div>
</aside>