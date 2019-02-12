@extends('layouts.default')
    <style type="text/css">

        #userProfile th,td{
            border: none !important;
        }
        #userProfile{
            border: none !important;
        }

    </style>
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>User Profile</h3>
                </h2>
            </div>
            @include('layouts.flash')
        </div>
    </div>
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel panel panel-info">
                    <div class="panel-heading hbuilt">
                            <h4>
                                {{$userInfo->name_prefix_name->name_prefix}}
                                {{$userInfo->first_name}}
                                {{$userInfo->last_name}}
                            </h4>
                    </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped middle-align" id="userProfile">
                                <thead>
    
                                </thead>
                                <tbody>
                                    <tr>
                                        {{--<td>
                                            Event :
                                        </td>
                                        <td>
                                            {{$userInfo->event_name->title}}
                                        </td>--}}
                                        <td>
                                            Registration Way :
                                        </td>
                                        <td>
                                            {{$userInfo->registration_way_name->registration_way}}
                                        </td>
                                        <td>
                                            Registration Date :
                                        </td>
                                        <td>
                                            {{date('d M Y',strtotime($userInfo->created_at))}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Visitor Type :
                                        </td>
                                        <td>
                                            {{$userInfo->visitor_type_name->registration_type}}
                                        </td>
                                        <td>
                                            Name :
                                        </td>
                                        <td>
                                            {{$userInfo->name_prefix_name->name_prefix}}
                                            {{$userInfo->first_name}}
                                            {{$userInfo->last_name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Registration Number :
                                        </td>
                                        <td>
                                            {{$userInfo->registration_number}}
                                        </td>
                                        <td>
                                            Email :
                                        </td>
                                        <td>
                                            {{$userInfo->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Telephone :
                                        </td>
                                        <td>
                                            {{$userInfo->telephone}}
                                        </td>
                                        <td>
                                            Mobile :
                                        </td>
                                        <td>
                                            {{$userInfo->mobile}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Company Name :
                                        </td>
                                        <td>
                                            {{$userInfo->company_name}}
                                        </td>
                                        <td>
                                            Job Title :
                                        </td>
                                        <td>
                                            {{$userInfo->job_title}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Country :
                                        </td>
                                        <td>
                                            {{$userInfo->country}}
                                        </td>
                                        <td>
                                            Post Code :
                                        </td>
                                        <td>
                                            {{$userInfo->post_code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address :
                                        </td>
                                        <td>
                                            {{$userInfo->address}}
                                        </td>
                                        <td>
                                            Status :
                                        </td>
                                        <td>
                                            @if($userInfo->status==1)
                                                {{'Active'}}
                                            @else
                                                {'Inactive'}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <a href="{{URL::to('user-registration')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {!!trans('english.BACK')!!}</a>
                                        </td>
                                        <td colspan="2">
                                            <a href="{{URL::to('user-registration/each-user-info-print'.'/'.$userInfo->id)}}" class="btn btn-primary pull-right"><i class="fa fa-download" aria-hidden="true"></i> {!!'Excel'!!}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table><!---/table-responsive-->

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            

        });
    </script>
@stop