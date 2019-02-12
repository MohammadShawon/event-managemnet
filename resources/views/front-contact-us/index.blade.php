@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>Contact Us</h3>
                </h2>
            </div>
            @include('layouts.flash')
        </div>
    </div>
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                            <h3>Contact Us</h3>
                    </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th class="text-center" width="5%">SL#</th>
                                    <th class="text-center" width="10%">{{'Date'}}</th>
                                    <th class="text-center" width="15%">{{'Name'}}</th>
                                    <th class="text-center" width="15%">{{'Email'}}</th>
                                    <th class="text-center" width="10%">{{'Phone'}}</th>
                                    <th class="text-center" width="10%">{{'Subject'}}</th>
                                    <th class="text-center" width="35%">{{'Message'}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if (!$frontContacUs->isEmpty())

                                    <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10;
                                        $l = 1;
                                    ?>
                                    @foreach($frontContacUs as $fcu)
                                        <tr>
                                            <td>{{++$sl}}</td>
                                            <td>{{date('Y-m-d',strtotime($fcu->created_at))}}</td>
                                            <td>{{$fcu->con_per_name}}</td>
                                            <td>{{$fcu->con_per_email}}</td>
                                            <td>{{$fcu->con_per_phone}}</td>
                                            <td>{{$fcu->subject}}</td>
                                            <td>{{$fcu->con_per_message}}</td>
                                        </tr>
                                    @endforeach
                                
                                @else
                                    <tr>
                                        <td colspan="7">{{'Empty Data'}}</td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table><!---/table-responsive-->

                            {{ $frontContacUs->appends(Input::all())->links()}}

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        
    </script>
@stop