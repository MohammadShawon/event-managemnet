@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>Event Management</h3>
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
                        <?php if(!empty(Session::get('acl')[25][2])){ ?>
                        <div class="pull-right">
                            <a class="btn btn-info btn-effect-ripple" href="{{ URL::to('event/create') }}"><i class="fa fa-plus"></i> Add New Event</a>
                        </div>
                        <?php } ?>
                            <h3>{{trans('Event Management')}}</h3>
                    </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th class="text-center" width="5%">{{'SL#'}}</th>
                                    <th class="text-center" width="10%">{{'Title'}}</th>
                                    {{--<th class="text-center">{{trans('Description')}}</th>--}}
                                    <th class="text-center">{{trans('Start Date')}}</th>
                                    <th class="text-center">{{trans('End Date')}}</th>
                                    <th class="text-center" width="">{{trans('Venue')}}</th>
                                    <th class="text-center">{{trans('Pre Reg. Start Date')}}</th>
                                    <th class="text-center">{{trans('Pre Reg. End Date')}}</th>
                                    <th class="text-center">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[25][3]) || !empty(Session::get('acl')[25][4])){ ?>
                                    <th class="text-center"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                @if (!$eventmanagement->isEmpty())

                                    <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10;
                                        $l = 1;
                                    ?>
                                    @foreach($eventmanagement as $em)
                                        <tr>
                                            <td>{{++$sl}}</td>
                                            <td>{{$em->title}}</td>
                                            {{--<td>{{$em->short_description}}</td>--}}
                                            <td>
                                                {{date('jS M y',strtotime($em->start_date))}}
                                            </td>
                                            <td>
                                                {{date('jS M y',strtotime($em->end_date))}}
                                            </td>
                                            <td>{{$em->venue}}</td>   
                                            <td>
                                                {{date('jS M y',strtotime($em->pre_reg_start_date))}}
                                            </td>
                                            <td>
                                                {{date('jS M y',strtotime($em->pre_reg_end_date))}}
                                            </td>
                                            <td class="text-center">
                                                @if ($em->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <?php if(!empty(Session::get('acl')[25][3]) || !empty(Session::get('acl')[25][4])){ ?>
                                            <td class="action-center">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[25][3])){ ?>
                                                    <a class="btn btn-primary btn-xs" href="{{ URL::to('event/' . $em->id . '/edit') }}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php } ?>

                                                    <?php if(!empty(Session::get('acl')[25][4])){?>
                                                    <button class="edelete btn btn-danger btn-xs" id="{{$em->id}}" type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                   <?php }?>

                                                </div>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    @endforeach
                                
                                @else
                                    <tr>
                                        <td colspan="10">{{'Empty Data'}}</td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table><!---/table-responsive-->

                            {{ $eventmanagement->appends(Input::all())->links()}}

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            /*For Delete Department*/
            $(".edelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id; 
                var url='{!! URL::to('event/delete') !!}'+'/'+id;
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