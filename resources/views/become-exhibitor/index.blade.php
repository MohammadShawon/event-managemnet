@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>Become Exhibitor</h3>
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
                            <h3>Become Exhibitor</h3>
                    </div>
                        <div class="panel-body">

                            <!-- <div class="row" style="padding-bottom: 20px;">
                                <div class="col-md-4">
                                    <a href="{{URL::to('all-exibitior-print')}}" class="btn btn-primary btn-xs pull-right"><i class="fa fa-download" aria-hidden="true"></i> {!!'Excel'!!}</a>
                                </div>
                            </div> -->

                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th class="text-center" width="5%">SL#</th>
                                    <th class="text-center" width="10%">{{'Name'}}</th>
                                    <th class="text-center" width="10%">{{'Booth Type'}}</th>
                                    <th class="text-center" width="10%">{{'Email'}}</th>
                                    <th class="text-center" width="7%">{{'Telephone'}}</th>
                                    <th class="text-center" width="8%">{{'Mobile'}}</th>
                                    <th class="text-center" width="10%">{{'Company'}}</th>
                                    <th class="text-center" width="10%">{{'Job'}}</th>
                                    <th class="text-center" width="10%">{{'Country'}}</th>
                                    <th class="text-center" width="10%">{{'Postcode'}}</th>
                                    <th class="text-center" width="10%">{{'Address'}}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if (!$becomeExhi->isEmpty())

                                    <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10;
                                        $l = 1;
                                    ?>
                                    @foreach($becomeExhi as $bexb)
                                        <tr>
                                            <td>{{++$sl}}</td>
                                            <td>{{$bexb->name_prefix_get->name_prefix}} {{$bexb->first_name}} {{$bexb->last_name}}</td>
                                            <td>@if($bexb->booth_type){{$bexb->booth_type_get->booth_type}}@endif</td>
                                            <td>{{$bexb->email}}</td>
                                            <td>{{$bexb->telephone}}</td>
                                            <td>{{$bexb->mobile}}</td>
                                            <td>{{$bexb->company_name}}</td>
                                            <td>{{$bexb->job_title}}</td>
                                            <td>{{$bexb->country}}</td>
                                            <td>{{$bexb->postcode}}</td>
                                            <td>{{$bexb->address}}</td>
                                        </tr>
                                    @endforeach
                                
                                @else
                                    <tr>
                                        <td colspan="10">{{'Empty Data'}}</td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table><!---/table-responsive-->

                            {{ $becomeExhi->appends(Input::all())->links()}}

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            /*For Delete Department*/
            $(".exbdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id; 
                var url='{!! URL::to('exibitiors-management/delete') !!}'+'/'+id;
                bootbox.confirm("Are you sure?", function (result) {
                    if (result) {
                        var _url = $("#_url").val();
                        window.location.href = url;
                    }
                });
            });

        });
    </script>
@stop