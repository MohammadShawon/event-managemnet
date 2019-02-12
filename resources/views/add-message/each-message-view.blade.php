@extends('layouts.default')
    <style type="text/css">

        #speakerProfile th,td{
            border: none !important;
        }
        #speakerProfile{
            border: none !important;
        }

    </style>
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>Message</h3>
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

                            <div class="row">
                              <div class="col-xs-6 col-md-3">
                                <a href="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$userInfo->profile_pic) !!}" class="thumbnail">
                                  <img src="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$userInfo->profile_pic) !!}" alt="...">
                                </a>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>
                                        {{$userInfo->name}}
                                    </h4>
                                </div>
                            </div>
                    </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped middle-align" id="speakerProfile">
                                <thead>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Event :
                                        </td>
                                        <td>
                                            {{$userInfo->event_name->title}}
                                        </td>
                                        <td>
                                            Name :
                                        </td>
                                        <td>
                                            {{$userInfo->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Title :
                                        </td>
                                        <td>
                                            {{$userInfo->title}}
                                        </td>
                                        <td>
                                            Company :
                                        </td>
                                        <td>
                                            {{$userInfo->company}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Order No :
                                        </td>
                                        <td>
                                            {{$userInfo->order_no}}
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
                                        <td>
                                            Message :
                                        </td>
                                        <td>
                                            <?php echo $userInfo->message; ?>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td width="15%">
                                            Signature :<br/><br>
                                            <a href="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$userInfo->signature) !!}" class="thumbnail">
                                              <img src="{!! asset('public/uploads/messager-profile-pic-and-signature/'.$userInfo->signature) !!}" alt="...">
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <a href="{{URL::to('add-message')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {!!trans('english.BACK')!!}</a>
                                        </td>
                                        {{-- <td colspan="2">
                                            <a href="{{URL::to('add-message/each-message-info-print'.'/'.$userInfo->id)}}" class="btn btn-primary pull-right"><i class="fa fa-download" aria-hidden="true"></i> {!!'Excel'!!}</a>
                                        </td> --}}
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