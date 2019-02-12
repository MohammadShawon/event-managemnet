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
                    <h3>Speaker Profile</h3>
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
                                <a href="{!! asset('public/uploads/speaker-profile-image/'.$userInfo->profile_image) !!}" class="thumbnail">
                                  <img src="{!! asset('public/uploads/speaker-profile-image/'.$userInfo->profile_image) !!}" alt="...">
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
                                            Speaker Type :
                                        </td>
                                        <td>
                                            {{$userInfo->speaker_name->speaker_type}}
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
                                            Mobile :
                                        </td>
                                        <td>
                                            {{$userInfo->mobile}}
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
                                            Description :
                                        </td>
                                        <td>
                                            <?php echo $userInfo->description; ?>
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
                                            <a href="{{URL::to('speaker-management')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {!!trans('english.BACK')!!}</a>
                                        </td>
                                        <td colspan="2">
                                            <a href="{{URL::to('speaker-management/each-speaker-info-print'.'/'.$userInfo->id)}}" class="btn btn-primary pull-right"><i class="fa fa-download" aria-hidden="true"></i> {!!'Excel'!!}</a>
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