@extends('layouts.default')

<style type="text/css">

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

.forcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 12px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.forcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.forcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.forcheck input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.forcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.forcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                    Send email or sms
                </h2>
            </div>
            @include('layouts.flash')
        </div>
    </div>

    <div class="content animate-panel">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="hpanel">
                    <div class="panel-heading sub-title">
                        Send email or sms
                    </div>
                    <div class="panel-body">
                        {{ Form::open(array('role' => 'form', 'url' => 'post-send-email-sms', 'files'=> true)) }}
                    
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <div class="col-md-4">
                                    <select class="form-control selectpicker" name="searchType" id="searchType">
                                        <option value="">Select Type</option>
                                        <option value="1">User</option>
                                        <option value="2">Speaker</option>
                                        <option value="3">Exhibitor</option>
                                        <option value="4">Sponsor</option>
                                    </select>
                                </div>
                            </div>

                            <!-- <div class="form-group" style="margin-top: -2%;">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">{{'Search'}}</button>
                                </div>
                            </div> -->

                        </div>
                    </div>

                    <div class="row" style="margin-top: 2%; margin-left: 0px; font-weight: normal !important;">
                        <div class="col-md-4" id="sendEmailDiv">
                            <div>
                                <label class="forcheck"> Send Email
                                  <input type="checkbox" value="1" name="sned_email" id="">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4" id="sendSmsDiv">
                            <div>
                                <label class="forcheck"> Send Sms
                                  <input type="checkbox" value="1" name="sned_sms" id="">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 2%; margin-left: 0px; font-weight: normal !important;">
                        <div class="col-md-4" id="selectAllHidShow">
                            <div>
                                <label class="forcheck"> Select All
                                  <input type="checkbox" value="" name="" id="selectAll">
                                  <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 3%;">
                        <div class="col-md-12" id="showData">

                        </div>
                    </div>
    
                    <!-- <div class="hr-line-dashed"></div> -->
                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

    $(document).ready(function(){

        $("#selectAllHidShow").hide();
        $("#sendEmailDiv").hide();
        $("#sendSmsDiv").hide();

        // onchange employee
            $(document).on('change','#searchType',function(){
                var serType  = this.value;
                var csrf     = "<?php echo csrf_token(); ?>";

                $.ajax({
                  type: 'post',
                  url: 'ajax-serchtype-data',
                  data: { _token: csrf, serType:serType},

                  success: function( _response ){
                    $("#selectAllHidShow").show();
                    $("#sendEmailDiv").show();
                    $("#sendSmsDiv").show();

                    $("#showData").html(_response);
                

                },
                error: function(_response){
                  //alert("error");
                }

              });/*End Ajax*/
                
            });
            
            $("#selectAll").click(function(){
                $('input:checkbox').not(this).prop('checked', this.checked);
            });

    });

</script>

@stop


