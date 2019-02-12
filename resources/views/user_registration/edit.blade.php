@extends('layouts.default')

<style type="text/css">

.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>

@section('content')
    <div class="small-header transition animated fadeIn">
        <div class="hpanel">
            <div class="panel-body">
                <h2 class="font-light m-b-xs">
                Create New Event
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
                        Create New Event
                    </div>
                    <div class="panel-body">
                        {{ Form::model($eventId, array('route' => array('event.update', $eventId->id), 'method' => 'PUT', 'files'=> true, 'class' => 'form form-horizontal validate-form', 'id' => 'eventEdit')) }}

                    <div class="col-sm-3 col-md-6"> <!-- div 6 statrat here -->

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="title">Title :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('title', Input::old('title'), array('id'=> 'title', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="short_description">Short Description :</label>
                            <div class="col-md-8">
                                {{ Form::textarea('short_description', Input::old('short_description'), array('id'=> 'short_description', 'class' => 'form-control g-limit', 'rows'=>2)) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="description">Description :</label>
                            <div class="col-md-8">
                                {{ Form::textarea('description', Input::old('description'), array('id'=> 'description', 'class' => 'form-control g-limit', 'rows'=>2)) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="start_date">Start Date :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('start_date', Input::old('start_date'), array('id'=> 'start_date', 'class' => 'form-control g-limit datapicker2', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="end_date">End Date :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('end_date', Input::old('end_date'), array('id'=> 'end_date', 'class' => 'form-control g-limit datapicker2', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="pre_reg_start_date">Pre Reg. Start Date :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('pre_reg_start_date', Input::old('pre_reg_start_date'), array('id'=> 'pre_reg_start_date', 'class' => 'form-control g-limit datapicker2', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="pre_reg_end_date">Pre Reg. Date Date :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('pre_reg_end_date', Input::old('pre_reg_end_date'), array('id'=> 'pre_reg_end_date', 'class' => 'form-control g-limit datapicker2', 'required' => 'true')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="organizar_logo">Organizar Logo :</label>
                            <div class="col-md-8">

                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($eventId->organizar_logo) 
                                    <a href="{!! asset('public/uploads/event-organizar-logo/'.$eventId->organizar_logo) !!}" class="">
                                      <img src="{!! asset('public/uploads/event-organizar-logo/'.$eventId->organizar_logo) !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @else
                                    <a href="{!! asset('public/uploads/notfound/noimage.jpg') !!}" class="">
                                      <img src="{!! asset('public/uploads/notfound/noimage.jpg') !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @endif
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        {{ Form::file('organizar_logo', array('id'=> 'organizar_logo', 'class' => 'form-control g-limit custom-file-upload')) }}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="organizar_website">Organizar Website :</label>
                            <div class="col-md-8">
                                {{ Form::text('organizar_website', Input::old('organizar_website'), array('id'=> 'organizar_website', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_manager_logo">Event Manager Logo :</label>
                            <div class="col-md-8">

                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($eventId->event_manager_logo)
                                    <a href="{!! asset('public/uploads/event-manager-logo/'.$eventId->event_manager_logo) !!}" class="">
                                      <img src="{!! asset('public/uploads/event-manager-logo/'.$eventId->event_manager_logo) !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @else
                                    <a href="{!! asset('public/uploads/notfound/noimage.jpg') !!}" class="">
                                      <img src="{!! asset('public/uploads/notfound/noimage.jpg') !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @endif
                                  </div>
                                </div>
                                <div class="row">
                                    {{ Form::file('event_manager_logo', array('id'=> 'event_manager_logo', 'class' => 'form-control g-limit custom-file-upload')) }}
                                </div>
                            </div>
                        </div>

                    </div><!-- end first 6 md div -->

                    <div class="col-sm-3 col-md-6"> <!-- div 6 second start here -->

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_manager_website">Event Manager Website :</label>
                            <div class="col-md-8">
                                {{ Form::text('event_manager_website', Input::old('event_manager_website'), array('id'=> 'event_manager_website', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>
                        
                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="approved_by_logo">Approved By Logo :</label>
                            <div class="col-md-8">

                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($eventId->approved_by_logo)
                                    <a href="{!! asset('public/uploads/event-approved-by-logo/'.$eventId->approved_by_logo) !!}" class="">
                                      <img src="{!! asset('public/uploads/event-approved-by-logo/'.$eventId->approved_by_logo) !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @else
                                    <a href="{!! asset('public/uploads/notfound/noimage.jpg') !!}" class="">
                                      <img src="{!! asset('public/uploads/notfound/noimage.jpg') !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @endif
                                  </div>
                                </div>
                                <div class="row">
                                    {{ Form::file('approved_by_logo', array('id'=> 'approved_by_logo', 'class' => 'form-control g-limit custom-file-upload')) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="approved_by_website">Approved By Website :</label>
                            <div class="col-md-8">
                                {{ Form::text('approved_by_website', Input::old('approved_by_website'), array('id'=> 'approved_by_website', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_brochure_pdf">Event Vrochure pdf :</label>

                            <div class="col-md-8">
                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($eventId->event_brochure_pdf)
                                        <a href="#" class="viewDocumentModal" data-placement="right" fileName="{{$eventId->event_brochure_pdf}}">
                                        <img src="{!! asset('public/uploads/event-brochure-pdf/document.png') !!}" alt="...." width="50%" height="80px">
                                        </a>
                                    @else
                                        <a href="#" class="" data-placement="right" fileName="{{$eventId->event_brochure_pdf}}">
                                        <img src="{!! asset('public/uploads/notfound/notavailable.jpg') !!}" alt="...." width="50%" height="80px">
                                    @endif
                                    </div>
                                </div>
                                <div class="row">
                                    {{ Form::file('event_brochure_pdf', array('id'=> 'event_brochure_pdf', 'class' => 'form-control g-limit custom-file-upload', 'accept'=>'.pdf')) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="feature_image">Feature Image :</label>
                            <div class="col-md-8">

                                <div class="row">
                                  <div class="col-xs-12 col-md-12">
                                  @if($eventId->feature_image)
                                    <a href="{!! asset('public/uploads/event-feature-image/'.$eventId->feature_image) !!}" class="">
                                      <img src="{!! asset('public/uploads/event-feature-image/'.$eventId->feature_image) !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @else
                                    <a href="{!! asset('public/uploads/notfound/noimage.jpg') !!}" class="">
                                      <img src="{!! asset('public/uploads/notfound/noimage.jpg') !!}" alt="...." width="50%" height="80px">
                                    </a>
                                    @endif
                                  </div>
                                </div>
                                <div class="row">
                                    {{ Form::file('feature_image', array('id'=> 'feature_image', 'class' => 'form-control g-limit custom-file-upload')) }}
                                </div>
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="venue">Venue :<span class="text-danger">*</span></label>
                            <div class="col-md-8">
                                {{ Form::text('venue', Input::old('venue'), array('id'=> 'searchInput', 'class' => 'form-control g-limit', 'required' => 'true', 'placeholder'=>'Enter a location')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="map"></label>
                            <div class="col-md-8">
                                <div id="map" style="width: 100%; height: 200px;"></div>
                            </div>
                        </div>
                        <!-- <div id="map" style="width: 100%; height: 200px;"></div> -->

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="status">Status :</label>
                            <div class="col-md-8">
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), $eventId->status, array('class' => 'form-control selectpicker', 'id' => 'status')) }}
                            </div>
                        </div>

                        {{ Form::hidden('lat', Input::old('lat'), array('id'=> 'lat', 'class' => 'form-control g-limit')) }}

                        {{ Form::hidden('lng', Input::old('lng'), array('id'=> 'lng', 'class' => 'form-control g-limit')) }}

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">{!!trans('english.SAVE')!!}</button>
                                <a href="{{URL::to('event')}}" class="btn btn-default cancel">{!!trans('english.CANCEL')!!}</a>
                            </div>
                        </div>

                    </div> <!-- end second 6 md div -->
                    
                    <!-- <div class="hr-line-dashed"></div> -->
                        {!!   Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- View document modal ======================================================-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="viewDocumentModal" style="margin-top: 5px;">
    <div class="modal-dialog" role="document" style="width: 80%; margin-top: 8px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{'Document'}}</h4>
            </div>
            <form class="form-some-up form-block" role="form" action="{{url('band/update')}}" method="post">

                <div class="modal-body">
                    <div id="iframeDocOrPdfDiv">
                        <iframe id="iframeDocId" src="" width="100%" height="500px"></iframe>
                    </div>

<!-- <iframe id="iframeDocId" src="{{ asset('public/uploads/event-brochure-pdf/5a53b849df44cTechnical Specification Document - AHCAB V1.1.pdf') }}" width="100%" height="500px"></iframe> -->
                    <!-- <div class="row" id="iframeImageDiv">
                      <div class="col-xs-8 col-md-4"></div>
                      <div class="col-xs-8 col-md-4">
                        <a href="#" class="thumbnail">
                          <img id="iframeImageid" src="">
                        </a>
                      </div>
                      <div class="col-xs-8 col-md-4"></div>
                    </div> -->
                </div>
                <div class="modal-footer">

                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyLBA-qSyffRX-vdtXO-nhDtyrfKissgY&libraries=places&callback=initMap" async defer></script>
    <script type="text/javascript">

        $(function () {

            $('#categoryCreate').on("submit", function () {

                if ($('#CategoryName').val() == '') {
                    alert('Enter Category Name');
                    return false;
                }
            });
        });


        $(document).ready(function () {
            // do your checks of the radio buttons here and show/hide what you want to

            $(document).on('change', '#show-parent-cat', function () {
                $("#hide-free-quentity").show();

            })

            $(document).on('click', '.viewDocumentModal', function() {
                var fileName = $(this).attr("fileName");
                var filePath = "{{ asset('public/uploads/event-brochure-pdf/') }}/"+fileName+"";
                var fullRrl = "http://docs.google.com/gview?url="+filePath+"&embedded=true";

                var afterDotExtension = fileName.substr(fileName.lastIndexOf('.') + 1);

                document.getElementById('iframeDocId').src = fullRrl;
                    //$("#iframeDocOrPdfDiv").show();
    
                $('#viewDocumentModal').modal('show');
            });

        });
// google map code===========================

function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 23.7808875, lng: 90.2792382},
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat(); 
        var lng = place.geometry.location.lng();
        $("#lat").val(lat);
        $("#lng").val(lng);
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){
                document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
            }
            if(place.address_components[i].types[0] == 'country'){
                document.getElementById('country').innerHTML = place.address_components[i].long_name;
            }
        }
        document.getElementById('location').innerHTML = place.formatted_address;
        document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('lon').innerHTML = place.geometry.location.lng();
    });
}

    </script>
@stop


