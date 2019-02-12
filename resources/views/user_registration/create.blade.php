@extends('layouts.default')

<style type="text/css">

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

#appendTable th, td{
    border:solid 0px !important;
    padding: 3px !important;
}
</style>

@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                Create New User Registration
                </h2>
            </div>
            @include('layouts.flash')
        </div>
    </div>

    <div class="content animate-panel">
        <div class="row">
            <div class="col-sm-6 col-md-12" style="">
                <div class="hpanel">
                    <div class="panel-heading sub-title">
                        Create New User Registration
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('role' => 'form', 'url' => 'user-registration', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'userRegistration')) }}

                    <div class="col-sm-3 col-md-6"> <!-- div 6 statrat here -->

                        {{--<div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_id">Event :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::select('event_id',($event),null, array('class' => 'form-control selectpicker', 'id' => 'event_id', 'data-live-search' => 'true')) }}
                            </div>
                        </div>--}}

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="registration_way">Registration Type :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::select('registration_way',($registrationWay),null, array('class' => 'form-control selectpicker', 'id' => 'registration_way', 'data-live-search' => 'true', 'required' => 'required')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="visitor_type">Visitor Type :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::select('visitor_type',($visitoTypes),null, array('class' => 'form-control selectpicker', 'id' => 'visitor_type', 'data-live-search' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="name_prefix">Name Prefix :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::select('name_prefix[]',($namePrefix),null, array('class' => 'form-control selectpicker', 'id' => 'name_prefix', 'data-live-search' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="first_name">First Name :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('first_name[]', Input::old('first_name'), array('id'=> 'first_name', 'class' => 'form-control g-limit', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="last_name">Last Name :</label>
                            <div class="col-md-8">
                                {{ Form::text('last_name[]', Input::old('last_name'), array('id'=> 'last_name', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="email">Email :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::email('email[]', Input::old('email'), array('id'=> 'email', 'class' => 'form-control g-limit', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="telephone">Telephone :</label>
                            <div class="col-md-8">
                                {{ Form::text('telephone', Input::old('telephone'), array('id'=> 'telephone', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                    </div><!-- end first 6 md div -->

                    <div class="col-sm-3 col-md-6"> <!-- div 6 second start here -->

                         <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="country">Country :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                <!--{{ Form::text('country', Input::old('country'), array('id'=> 'country', 'class' => 'form-control g-limit')) }}-->
                                <select class="form-control selectpicker" name="country" id="country" data-live-search="true"; data-size="8">
                                    <option value="">Your Country</option>
                                    @foreach($countries as $ctry)
                                        <option value="{{$ctry->id}}" mobilecode="{{$ctry->phonecode}}">{{$ctry->nicename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="mobile">Mobile e.g. 8801xxxxxxxxx :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('mobile[]', Input::old('mobile'), array('id'=> 'mobile', 'class' => 'form-control g-limit', 'required' => 'true','placeholder'=>'Your Mobile e.g. 8801xxxxxxxxx')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="company_name">Company Name :</label>
                            <div class="col-md-8">
                                {{ Form::text('company_name', Input::old('company_name'), array('id'=> 'company_name', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="job_title">Job Tile :</label>
                            <div class="col-md-8">
                                {{ Form::text('job_title[]', Input::old('job_title'), array('id'=> 'job_title', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="post_code">Post Code :</label>
                            <div class="col-md-8">
                                {{ Form::text('post_code', Input::old('post_code'), array('id'=> 'post_code', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="address">Address :</label>
                            <div class="col-md-8">
                                {{ Form::textarea('address', Input::old('address'), array('id'=> 'address', 'class' => 'form-control g-limit', 'rows'=>2)) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                            </div>
                        </div>

                    </div> <!-- end second 6 md div -->

                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2" style="float: right;">
                                <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                <a href="{{URL::to('user-registration')}}" class="btn btn-default cancel">{!!trans('english.CANCEL')!!}</a>
                            </div>
                        </div>
                    </div>

                    <p id="errorDisplay" style="color:red"></p>


                    <div class="row hidden" id="tableDiv">

                    <table border="0" id="appendTable">
                        <thead>
                            <th width="16%">Name Prefix <span class="text-danger">*</span></th>
                            <th width="16%">First Name <span class="text-danger">*</span></th>
                            <th width="16%">Last Name</th>
                            <th width="16%">Email <span class="text-danger">*</span></th>
                            <th width="16%">Mobile <span class="text-danger">*</span></th>
                            <th width="16%">Job Title </th>
                            <th width="4%">Add</th>
                        </thead>
                        <tbody>
                            <td>
                                {{ Form::select('name_prefix_table',($namePrefix),null, array('class' => 'form-control input-sm', 'id' => 'name_prefix_table', 'data-live-search' => 'true')) }}
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="first_name_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="last_name_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="email_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="mobile_table">
                            </td>
                            <td>
                                <input type="text" class="form-control input-sm" id="job_title_table">
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary addUseInfo btn-sm" id="addNewRow">
                                    Add
                                </button>
                            </td>
                        </tbody>
                    </table>
                </div>

                    <!-- <div class="hr-line-dashed"></div> -->
                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        $(function () {

        //var aa = <?php echo json_encode($namePrefix) ;?>;

            $("#visitor_type").on('change',function(){
                var vistor_type = $("#visitor_type option:selected").text();
                if(vistor_type == 'Group'){
                    $("#tableDiv").removeClass('hidden');
                }else{
                    $('#appendTable tr.removeTr').remove();
                    $("#tableDiv").addClass('hidden');

                    $('#first_name_table').val('');
                    $('#last_name_table').val('');
                    $('#email_table').val('');
                    $('#mobile_table').val('');
                    $('#job_title_table').val('');
                }
            });

            $('form').submit(function(e){
                var mobileMin  = $('#mobile').val();
                if(mobileMin.length<6){
                    alert('Invalid mobile number');
                    return false;
                }
            });

            var i=0;
            $("#addNewRow").on("click",function(){

                var prefix_id       = $('#name_prefix_table').val();
                var prefix_name     = $('#name_prefix_table option:selected').text();
                var first_name      = $('#first_name_table').val(); //alert(productQntty);
                var last_name       = $('#last_name_table').val();
                var email           = $('#email_table').val();
                var mobile          = $('#mobile_table').val();
                var job_title       = $('#job_title_table').val();

                if(prefix_id =='' || first_name =='' || email =='' || mobile =='' ){
                    $("#errorDisplay").html('Every Field Should Be Field Up <span class="text-danger">*</span>');
                    return false;
                }else{
                    $("#errorDisplay").empty();
                }

                if(mobile.length<8){
                    $("#errorDisplay").html('Mobile number is not valid <span class="text-danger">*</span>');
                    return false;
                }else{
                    $("#errorDisplay").empty();
                }

                $('#appendTable').append('<tr class="removeTr" id="row'+i+'"><td><input type="text" name="prefixApnd" class="form-control input-sm" style="text-align:left; cursor:default" value="'+prefix_name+'" readonly/></td><td><input type="text" name="first_name[]" class="form-control input-sm fristNameApnd" id="fristNameApnd" style="text-align:center; cursor:default"  value="'+first_name+'" readonly/></td><td><input type="text" name="last_name[]" class="form-control input-sm lastNameApnd" id="lastNameApnd" style="text-align:center; cursor:default" value="'+last_name+'" readonly/></td><td><input type="text" name="email[]" class="form-control input-sm emailApnd" id="emailApnd" style="text-align:center; cursor:default"  value="'+email+'" readonly/></td><td><input type="text" name="mobile[]" class="form-control input-sm mobileApnd" style="text-align:center; cursor:default" value="'+mobile+'" id="mobileApnd" readonly/></td><td><input type="text" class="form-control input-sm jobTitleApnd" name="job_title[]" value="'+ job_title +'" readonly/></td><td><input type="text" class="hidden nput-sm" name="name_prefix[]" value="'+ prefix_id +'"/><a href="javascript:;" name="remove" id="'+i+'" class="btn_remove" style="width:80px"><i class="glyphicon glyphicon-trash" style="color:red; font-size:16px"></i></a></td></tr>');

                //$('#name_prefix_table').val('');
                $('#first_name_table').val('');
                $('#last_name_table').val('');
                //$('#email_table').val('');
                //$('#mobile_table').val('');
                $('#job_title_table').val('');

            });

            $(document).on('click', '.btn_remove', function(){

                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();

            }); //end remove button click

            var countryCodeLength = 0;
            var countryCodeForCheck = 0;
            $("#country").on('change',function(){
                var mobileCode = $('option:selected', this).attr('mobilecode');
                countryCodeLength = mobileCode.length;
                countryCodeForCheck = mobileCode;

                if(mobileCode==''){
                    $("#mobile").val('');
                }else{
                    $("#mobile").val(mobileCode);
                    $("#mobile_table").val(mobileCode);
                }
            });

            $(document).on('input','#mobile,#mobile_table',function(){
                if(countryCodeForCheck=='0'){
                    alert('Please Select Country');
                    $("#mobile").val('');
                    $("#mobile_table").val('');
                }else{
                    var thisFieldValue = $(this).val();
                    var res = thisFieldValue.substring(0, countryCodeLength);
                    if(res!=countryCodeForCheck){
                        $("#mobile").val(countryCodeForCheck);
                        $("#mobile_table").val(countryCodeForCheck);
                    }
                }
            });

            // email auto set in multiple user
            $(document).on('input','#email',function(){
                var emailOfMain = $("#email").val();
                $("#email_table").val(emailOfMain);
            });

        });
    </script>
@stop


