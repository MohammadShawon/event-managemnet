@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>Seminar Management</h3>
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
                        <?php if(!empty(Session::get('acl')[26][2])){ ?>
                        <div class="pull-right">
                            <a class="btn btn-info btn-effect-ripple" href="{{ URL::to('seminar-management/create') }}"><i class="fa fa-plus"></i> Add New Seminar</a>
                        </div>
                        <?php } ?>
                            <h3>{{trans('Seminar Management')}}</h3>
                    </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th class="text-center" width="5%">{{'SL#'}}</th>
                                    <th class="text-center" width="10%">{{'Event'}}</th>
                                    <th class="text-center">{{trans('Speaker')}}</th>
                                    <th class="text-center">{{trans('Title')}}</th>
                                    <th class="text-center">{{trans('Description')}}</th>
                                    <th class="text-center">{{trans('Start Date')}}</th>
                                    <th class="text-center">{{trans('End Date')}}</th>
                                    <th class="text-center">{{trans('Reg. End Date')}}</th>
                                    <th class="text-center">{{trans('Hall')}}</th>
                                    <th class="text-center">{{trans('english.STATUS')}}</th>
                                    <?php if(!empty(Session::get('acl')[26][3]) || !empty(Session::get('acl')[26][4])){ ?>
                                    <th class="text-center"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    function speakrName($esp_id){
                                        $name = \App\SpeakerManagement::where('id','=',$esp_id)->value('name');
                                        return $name;
                                    }
                                ?>

                                @if (!$seminarmanagement->isEmpty())

                                    <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10;
                                        $l = 1;
                                    ?>
                                    @foreach($seminarmanagement as $smg)
                                        <tr>
                                            <td class="text-center">{{++$sl}}</td>
                                            <td class="text-center">{{$smg->event_name->title}}</td>
                                            <td class="text-center">
                                                <?php $ala = explode(',', $smg->speaker_id); $reco=1; ?>
                                                @foreach($ala as $dp)
                                                    {{speakrName($dp)}}
                                                    @if(count($ala)!=$reco)
                                                        {{' ,'}}
                                                    @endif
                                                <?php $reco++; ?>
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{$smg->title}}</td>
                                            <td class="text-center">{{$smg->short_description}}</td>
                                            <td class="text-center">
                                                {{date('jS M Y h:i:s a',strtotime($smg->start_date))}}
                                            </td>
                                            <td class="text-center">
                                                {{date('jS M Y h:i:s a',strtotime($smg->end_date))}}
                                            </td>
                                            <td class="text-center">
                                                {{date('jS M Y h:i:s a',strtotime($smg->registration_end_date_time))}}
                                            </td>
                                            <td class="text-center">{{$smg->room_hall}}</td>
                                            <td class="text-center">
                                                @if ($smg->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>

                                            <?php if(!empty(Session::get('acl')[26][3]) || !empty(Session::get('acl')[26][4])){ ?>
                                            <td class="action-center">
                                                <div class="text-center">

                                                    <?php if(!empty(Session::get('acl')[26][3])){ ?>
                                                    <a class="btn btn-primary btn-xs" href="{{ URL::to('seminar-management/' . $smg->id . '/edit') }}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php } ?>

                                                    <?php if(!empty(Session::get('acl')[26][4])){?>
                                                    <button class="semmdelete btn btn-danger btn-xs" id="{{$smg->id}}" type="button" data-placement="top" data-rel="tooltip" data-original-title="Delete">
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
                                        <td colspan="11">{{'Empty Data'}}</td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table><!---/table-responsive-->

                            {{ $seminarmanagement->appends(Input::all())->links()}}

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            /*For Delete Department*/
            $(".semmdelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id; 
                var url='{!! URL::to('seminar-management/delete') !!}'+'/'+id;
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