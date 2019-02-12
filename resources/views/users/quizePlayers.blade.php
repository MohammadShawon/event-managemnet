@extends('layouts.default')
@section('content')

    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    Front Users
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

                        <h4>Front Users</h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('role' => 'form', 'url' => 'frontUsers/filter', 'class' => 'form-horizontal', 'id' => 'accountHeadCreate')) !!}
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-3 no-padding-right">{!!trans('english.USERNAME')!!} :</label>
                                <div class="col-md-6">
                                    {!! Form::text('username', Input::get('username'), array('id'=> 'username', 'class' => 'form-control')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-5">
                                <button type="submit" class="btn btn-primary"> {!!trans('english.FILTER')!!}</button>
                            </div>
                        </div>

                        {!!Form::close()!!}

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    <th>{!!trans('english.SL_NO')!!}</th>
                                    <th>{!!trans('english.FIRST_NAME')!!}</th>
                                    <th>{!!trans('english.LAST_NAME')!!}</th>
                                    <th>{!!trans('english.USERNAME')!!}</th>
                                    <th>Email</th>
                                    <th>Contact No.</th>
                                    <th>District Name</th>
                                    <th>Gender</th>
                                    <th>Date Of Birth</th>
                                    <th>Age</th>
                                    <th class='text-center'>{!!trans('english.PHOTO')!!}</th>
                                    <th>{!!trans('english.STATUS')!!}</th>
                                    <?php  if(!empty(Session::get('acl')[3][3]) || !empty(Session::get('acl')[3][4]) || !empty(Session::get('acl')[3][7])){ ?>
                                    <th class='text-center'>{!!trans('english.ACTION')!!}</th>
                                    <?php  } ?>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!$usersArr->isEmpty())
                                    <?php
                                    $page = Input::get('page');
                                    $page = empty($page) ? 1 : $page;
                                    $sl = ($page - 1) * 10;
                                    ?>
                                    @foreach($usersArr as $value)

                                        <tr class="contain-center">
                                            <td>{!!++$sl!!}</td>
                                            <td>{!! $value->first_name !!}</td>
                                            <td>{!! $value->last_name !!}</td>
                                            <td>{!! $value->username !!}</td>
                                            <td>{!! $value->email  !!}</td>
                                            <td>{!! $value->contact_no !!}</td>
                                            <td>@foreach($districts as $d) @if($value->district_id == $d->id) {!! $d->name !!} @endif @endforeach</td>
                                            <td>{!! $value->gender   !!}</td>
                                            <td>{!! $value->date_of_birth   !!}</td>
                                            <td>{!! $value->age   !!}</td>
                                            <td class="text-center">
                                                @if(isset($value->photo))
                                                    <img width="100" height="100" src="{!!URL::to('/')!!}/public/uploads/gallery/{!!$value->photo!!}" alt="{!! $value->first_name.' '.$value->last_name !!}">
                                                @else
                                                    <img width="100" height="100" src="{!!URL::to('/')!!}/public/img/unknown.png" alt="{!! $value->first_name.' '.$value->last_name !!}">
                                                @endif
                                            </td>
                                            <td>
                                                @if ($value->status_id == '1')
                                                    <span class="label label-success">{!!trans('english.ACTIVE')!!}</span>
                                                @else
                                                    <span class="label label-warning">{!!trans('english.INACTIVE')!!}</span>
                                                @endif
                                            </td>
                                            <?php  if(!empty(Session::get('acl')[3][3]) || !empty(Session::get('acl')[3][4]) || !empty(Session::get('acl')[3][5]) || !empty(Session::get('acl')[3][7])){ ?>
                                            <td class="action-center">
                                                <div class='text-center'>
                                                    {!! Form::open(array('url' => 'users/' . $value->id)) !!}
                                                    {!! Form::hidden('_method', 'DELETE') !!}

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
                                                    <?php  if(!empty(Session::get('acl')[3][11])){ ?>
                                                    <a class='btn btn-info btn-xs' href="{!! URL::to('users/activate/' . $value->id ) !!}@if(isset($param)){!!'/'.$param !!} @endif" data-rel="tooltip" title="@if($value->status_id == '1') Inactivate @else Activate @endif" data-placement="top">
                                                        @if($value->status_id == '1')
                                                            <i class='fa fa-remove'></i>
                                                        @else
                                                            <i class='fa fa-circle-o'></i>
                                                        @endif
                                                    </a>
                                                    <?php  } ?>
                                                    <?php  if(!empty(Session::get('acl')[3][3])){ ?>
                                                    <a class='btn btn-primary btn-xs' href="{!! URL::to('users/' . $value->id . '/edit') !!}">
                                                        <i class='fa fa-pencil'></i>
                                                    </a>
                                                    <?php  } ?>
                                                    <?php  if(!empty(Session::get('acl')[3][7])){ ?>
                                                    <a href="{!! URL::to('users/cp/' . $value->id) !!}@if(isset($param)){!!'/'.$param !!} @endif" data-original-title="Change Password">
                                                <span class="btn btn-success btn-xs"> 
                                                    <i class="fa fa-key"></i>
                                                </span>
                                                    </a>
                                                    <?php  } ?>
                                                    <?php  if(!empty(Session::get('acl')[3][4])){ ?>
                                                    <button class="btn btn-danger btn-xs delete" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                        <i class='fa fa-trash'></i>
                                                    </button>
                                                    <?php } ?>

                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                            <?php  } ?>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="13">{!!trans('english.EMPTY_DATA')!!}</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table><!---/table-responsive-->
                            {!! $usersArr->appends(Input::all())->render()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop