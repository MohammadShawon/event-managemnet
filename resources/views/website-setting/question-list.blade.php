@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>Question List</h3>
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
                        <?php if(!empty(Session::get('acl')[44][2])){ ?>
                        <div class="pull-right">
                            <a class="btn btn-info btn-effect-ripple" href="{{ URL::to('website-management/create-question-list') }}"><i class="fa fa-plus"></i> Add New Question</a>
                        </div>
                        <?php } ?>
                            <h3>Question List</h3>
                    </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th class="text-center" width="5%">SL#</th>
                                    <th class="text-center">{{'Event'}}</th>
                                    <th class="text-center">{{'Question'}}</th>
                                    <th class="text-center">{{'Answers'}}</th>
                                    <th class="text-center">{{'Order No'}}</th>
                                    <th class="text-center">{{'Multiple Ans'}}</th>
                                    <th class="text-center">{{trans('english.STATUS')}}</th>
                                    <!-- <?php if(!empty(Session::get('acl')[44][3]) || !empty(Session::get('acl')[44][4])){ ?>
                                    <th class="text-center"> {!!trans('english.ACTION')!!}
                                    </th>
                                    <?php } ?> -->
                                </tr>
                                </thead>
                                <tbody>

                                @if (!$questionLists->isEmpty())

                                    <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10;
                                        $l = 1;
                                    ?>
                                    @foreach($questionLists as $fp)
                                        <tr>
                                            <td>{{++$sl}}</td>
                                            <td>{{$fp->event_name->title}}</td>
                                            <td>{{$fp->questions}}</td>
                                            <td>
                                                @foreach($fp->answers_of_question as $ans)
                                                    * {{$ans->answer}} <br>
                                                @endforeach
                                            </td>
                                            <td>{{$fp->order_no}}</td>
                                            <td>
                                                @if($fp->multiple_answer==1) {{'Yes'}}
                                                @else
                                                {{'No'}}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($fp->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                                
                                        <?php if(!empty(Session::get('acl')[44][3])){ ?>
                                                    <a class="btn btn-primary btn-xs" href="{{ URL::to('website-management/edit-question-list/' . $fp->id . '/edit') }}">
                                                        <i class="icon-edit"></i>
                                                    </a>
                                                    <?php } ?>
                                                
                                            </td>
                                            <!-- <td></td> -->
                                            
                                        </tr>
                                    @endforeach
                                
                                @else
                                    <tr>
                                        <td colspan="5">{{'Empty Data'}}</td>
                                    </tr>
                                @endif
                                    
                                </tbody>
                            </table><!---/table-responsive-->

                            {{ $questionLists->appends(Input::all())->links()}}

                        </div>
                    </div>
                </div>
            </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            /*For Delete Department*/
            $(".fldelete").click(function (e) {
                e.preventDefault();
                
                var id = this.id; 
                var url='{!! URL::to('floor-plan/delete') !!}'+'/'+id;
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