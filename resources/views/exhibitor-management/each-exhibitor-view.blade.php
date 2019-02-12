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
                                <a href="{!! asset('public/uploads/exibitiors-logo/'.$userInfo->logo) !!}" class="thumbnail">
                                  <img src="{!! asset('public/uploads/exibitiors-logo/'.$userInfo->logo) !!}" alt="...">
                                </a>
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>
                                        {{$userInfo->company_name}}
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
                                            Company Name :
                                        </td>
                                        <td>
                                            {{$userInfo->company_name}}
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
                                            Mobile :
                                        </td>
                                        <td>
                                            {{$userInfo->mobile}}
                                        </td>
                                        <td>
                                            Website :
                                        </td>
                                        <td>
                                            {{$userInfo->website}}
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
                                            <a href="{{URL::to('exibitiors-management')}}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> {!!trans('english.BACK')!!}</a>
                                        </td>
                                        <td colspan="2">
                                            <a href="{{URL::to('exibitiors-management/each-exibitiors-info-print'.'/'.$userInfo->id)}}" class="btn btn-primary pull-right"><i class="fa fa-download" aria-hidden="true"></i> {!!'Excel'!!}</a>
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