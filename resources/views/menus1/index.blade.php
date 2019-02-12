
@extends('layouts.default')
@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    <h3>{{trans('english.MENU_MANAGEMENT')}}</h3>
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
                        <?php if(!empty(Session::get('acl')[23][2])){ ?>
                        <div class="pull-right">
                            <a class="btn  btn-info" href="{{ URL::to('menus/create') }}">
                                <i class='icon-plus-sign-alt'></i>
                                Create Menu
                            </a>

                        </div>
                        <?php } ?>
                        <h3>  {{trans('english.CREATE_NEW_MENU')}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="widget-content">
                        <div class="filter-form">
                            {{ Form::open(array('role' => 'form', 'url' => 'menus/filter', 'class' => 'form-horizontal col-md-12')) }}
                            <div class="form-group col-md-6">
                                <label class="col-md-3" for="name">{{trans('english.NAME')}} :</label>
                                <div class="col-md-7">
                                    {{ Form::text('name', Input::get('name'), array('id'=> 'name', 'class' => 'form-control')) }}
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary" type="submit">
                                        {{trans('english.FILTER')}}
                                    </button>
                                </div>
                            </div> <!-- /.form-group -->
                            {{Form::close()}}
                        </div>

                                <table class="table table-bordered table-hover table-striped middle-align" style='margin-bottom:0;'>
                                    <thead>
                                    <tr class="center">
                                        <th class="text-center">{{trans('english.SL_NO')}}</th>
                                        <th>{{trans('english.NAME')}}</th>
                                        <th class="text-center">{{trans('english.TYPE')}}</th>
                                        <th class="text-center">Slug</th>
                                        <th class="text-center">Internal url</th>
                                        <th class="text-center">Target</th>
                                        <th class="text-center">Menu Position</th>
                                        <th class="text-center">{{trans('english.ORDER_ID')}}</th>
                                        <th class="text-center">{{trans('english.STATUS')}}</th>
                                        <th class="text-center">{{trans('english.ACTION')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (!$targetArr->isEmpty())
                                        <?php
                                        $page = Input::get('page');
                                        $page = empty($page) ? 1 : $page;
                                        $sl = ($page-1)*10; ?>
                                        @foreach($targetArr as $target)

                                            <tr class="contain-center">
                                                <td class="text-center">{{ ++$sl }}</td>
                                                <td>{{ $target->name }}</td>
                                                <td>{{ $typeArr[$target->type_id] }}</td>
                                                <td>{{ $target->category_slug }}</td>
                                                <td>{{ $target->url }}</td>
                                                <td>{{ $target->_blank }}</td>
                                                <td>@if($target->menu_position==1) Main Menu @elseif($target->menu_position==2) Footer Menu @endif</td>
                                                <td class="text-center">{{ $target->order_id }}</td>
                                                <td class="text-center">
                                                    @if ($target->status_id == '1')
                                                        <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                    @else
                                                        <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                    @endif
                                                </td>
                                                <?php if(!empty(Session::get('acl')[23][3]) || !empty(Session::get('acl')[23][4])){ ?>
                                                <td class="action-center">
                                                    <div class='text-center'>
                                                        {{ Form::open(array('url' => 'menus/' . $target->id)) }}
                                                        {{ Form::hidden('_method', 'DELETE') }}

                                                        <?php
                                                        $dd = Input::query();
                                                        if (!empty($dd)) {
                                                            $param = '';
                                                            $sn = 1;

                                                            foreach ($dd as $key => $item) {
                                                                if ($sn === 1) {
                                                                    $param .= $key . '=' . $item;
                                                                } else {
                                                                    $param .= '&' . $key . '=' . $item;
                                                                }
                                                                $sn++;
                                                            }//foreach
                                                        }
                                                        ?>

                                                        <a class="btn btn-info btn-xs" href="{{ URL::to('menus/activate/' . $target->id ) }}@if(isset($param)){{'/'.$param }} @endif" data-rel="tooltip" title="@if($target->status_id == '1') Inactivate @else Activate @endif" data-placement="top">
                                                            @if($target->status_id == '1')
                                                                <i class="icon-remove"></i>
                                                            @else
                                                                <i class="icon-ok-circle"></i>
                                                            @endif
                                                        </a>
                                                        <?php if(!empty(Session::get('acl')[23][3])){ ?>
                                                        <a class="btn btn-primary btn-xs" href="{{ URL::to('menus/' . $target->id . '/edit') }}">
                                                            <i class="icon-edit"></i>
                                                        </a>
                                                        <?php } ?>
                                                        <?php if(!empty(Session::get('acl')[23][4])){ ?>
                                                        <button class="btn btn-danger btn-xs delete" Level="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                        <?php } ?>

                                                        {{ Form::close() }}
                                                    </div>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8">{{trans('english.EMPTY_DATA')}}</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table><br>

                                {{ $targetArr->appends(Input::all())->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
            <style type="text/css">
                .custom-modal-header{
                    background-image: linear-gradient(to bottom, #888 0%, #444 100%);
                    height: 40px;
                }
            </style>

            <script type="text/javascript">

                $(document).ready(function() {
                    $(".loadScheduleInfo").click(function() {

                        var menuId = this.id;
                        var values = 'menuId=' + menuId;

                        $.ajax({
                            url: "ajaxresponse/load-menu-schedule",
                            data: values,
                            type: "POST",
                            dataType: 'html',
                            cache: false,
                            beforeSend: function() {

                            },
                        }).done(function(response) {
                            $('#menu-schedule').html(response);
                        });

                    });

                });

            </script>
    @endsection