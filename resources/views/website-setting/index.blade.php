@extends('layouts.default')

<style type="text/css">

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}

input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

</style>

@section('content')
<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <h2 class="font-light m-b-xs">
                Website Management
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
                    <h4>Website Management</h4>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url'=>'media/'.Request::Segment(2),'method'=>'get', 'class' => 'form-horizontal']) !!}
                    <div class="form-group col-md-12">
                    </div>

                    {!! Form::close() !!}
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li class="@if(Request::segment(2)==1)active @endif">
                                    <a href="{!! url('website-management',1) !!}">
                                      Website Slider </a>
                                </li>
                                <li class="@if(Request::segment(2)==2)active @endif">
                                    <a href="{!! url('website-management',2) !!}">
                                       Events Images</a>
                                </li>
                            </ul>

                        @if(Request::segment(2)==1)
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_1">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'website-management/post-slider-image', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="status">Slider Image :</label>
                                        <div class="col-md-5">
                                            {{ Form::file('slider_image_nam', array('id'=> 'slider_image_nam', 'class' => 'form-control g-limit custom-file-upload')) }}
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-5">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>

                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>

                        
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                <tr class="center">
                                    
                                    <th class="text-center" width="10%">{{'SL#'}}</th>
                                    <th class="text-center">{{trans('Slider Image')}}</th>
                                    <th class="text-center" width="10%">{{trans('english.STATUS')}}</th>
                                    <th class="text-center" width="10%">{{trans('english.STATUS')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            $page = Input::get('page');
                                            $page = empty($page) ? 1 : $page;
                                            $sl = ($page-1)*10;
                                            $l = 1;
                                        ?>
                                    @foreach($allSliders as $als)
                                        <tr>
                                            
                                            <td class="text-center">{{++$sl}}</td>
                                            <td class="text-center">
                                                <img src="{!! asset('public/frontend/images/main-slider/'.$als->slider_image_name) !!}" alt="...." width="40%" height="100px">
                                            </td>
                                            <td class="text-center">
                                                @if ($als->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-xs" href="{{ URL::to('website-management/active-inactive/' . $als->id ) }}" data-rel="tooltip" title="@if($als->status == '1') Inactivate @else Activate @endif" data-placement="top">
                                                    @if($als->status == '1')
                                                        <i class="icon-remove"></i>
                                                    @else
                                                        <i class="icon-ok-circle"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            </div> <!-- end of active envent tab -->
                        @endif

                        @if(Request::segment(2)==2)
                            <div class="tab-content"> <!-- Registration way tab start -->
                                <div class="tab-pane active" id="tab_2">
                                
                                {{ Form::open(array('role' => 'form', 'url' => 'website-management/post-event-image', 'files'=> true, 'class' => 'form-horizontal')) }}

                                    <div class="form-group" style="padding-top: 50px;"><label class="control-label col-md-2 no-padding-right" for="status">Event :</label>
                                        <div class="col-md-5">
                                            <select class="form-control selectpicker" name="event_id" id="event_id">
                                                <option value="">Select Event</option>
                                                @foreach($events as $ev)
                                                    <option value="{{$ev->id}}">{{$ev->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Slider Image :</label>
                                        <div class="col-md-5">
                                           {{-- {{ Form::file('event_image_name[]', array('id'=> 'event_image_name', 'class' => 'form-control g-limit custom-file-upload','multiple'=>'true')) }} --}}
                                            <input type="file" class="form-control g-limit custom-file-upload" name="files[]" id="files" multiple>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="control-label col-md-2 no-padding-right" for="status">Status :</label>
                                        <div class="col-md-5">
                                            {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                                        </div>
                                    </div>
                                    {{ Form::hidden('tapId', Request::Segment(2), array('id'=> 'tapId', 'class' => 'form-control g-limit')) }}

                                    <div class="form-group">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                        </div>
                                    </div>

                                {!!   Form::close() !!}

                                </div>

                        
                            <table class="table table-bordered table-hover table-striped middle-align">
                                <thead>
                                    <th class="text-center" width="10%">{{'SL#'}}</th>
                                    <th class="text-center" width="15%">{{'Event Name'}}</th>
                                    <th class="text-center">{{trans('Slider Image')}}</th>
                                    <th class="text-center" width="10%">{{trans('english.STATUS')}}</th>
                                    <th class="text-center" width="10%">{{trans('english.STATUS')}}</th>
                                </thead>
                                <tbody>

                                       <?php
                                            $page = Input::get('page');
                                            $page = empty($page) ? 1 : $page;
                                            $sl = ($page-1)*10;
                                            $l = 1;
                                        ?>
                                    @foreach($eventImages as $evmi)
                                        <tr>
                                            
                                            <td class="text-center">{{++$sl}}</td>
                                            <td class="text-center">{{$evmi->event_name->title}}</td>
                                            <td class="text-center">
                                                <img src="{!! asset('public/frontend/images/event-image-gallery/'.$evmi->event_image_name) !!}" alt="...." width="40%" height="100px">
                                            </td>
                                            <td class="text-center">
                                                @if ($evmi->status == '1')
                                                    <span class="label label-success">{{trans('english.ACTIVE')}}</span>
                                                @else
                                                    <span class="label label-warning">{{trans('english.INACTIVE')}}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-xs" href="{{ URL::to('website-management/active-inactive-event-image/' . $evmi->id ) }}" data-rel="tooltip" title="@if($evmi->status == '1') Inactivate @else Activate @endif" data-placement="top">
                                                    @if($evmi->status == '1')
                                                        <i class="icon-remove"></i>
                                                    @else
                                                        <i class="icon-ok-circle"></i>
                                                    @endif
                                                </a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table><!---/table-responsive-->
                            {{ $eventImages->appends(Input::all())->links()}}
                            </div> <!-- End of Registration way -->
                        @endif <!-- end request sigment 2 -->

                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

 $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});

</script>

@stop


