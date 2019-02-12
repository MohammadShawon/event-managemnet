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
                        {{ Form::open(array('role' => 'form', 'url' => 'event', 'files'=> true, 'class' => 'form-horizontal', 'id'=>'eventCreate')) }}

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
                                {{ Form::file('organizar_logo', array('id'=> 'organizar_logo', 'class' => 'form-control g-limit custom-file-upload')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="organizar_website">Organizar Website :</label>
                            <div class="col-md-8">
                                {{ Form::text('organizar_website', Input::old('organizar_website'), array('id'=> 'organizar_website', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_manager_logo">Event Manager Logo :</label>
                            <div class="col-md-8">
                                {{ Form::file('event_manager_logo', array('id'=> 'event_manager_logo', 'class' => 'form-control g-limit custom-file-upload')) }}
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
                                {{ Form::file('approved_by_logo', array('id'=> 'approved_by_logo', 'class' => 'form-control g-limit custom-file-upload')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="approved_by_website">Approved By Website :</label>
                            <div class="col-md-8">
                                {{ Form::text('approved_by_website', Input::old('approved_by_website'), array('id'=> 'approved_by_website', 'class' => 'form-control g-limit')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="event_brochure_pdf">Event Vrochure pdf :</label>
                            <div class="col-md-8">
                                {{ Form::file('event_brochure_pdf', array('id'=> 'event_brochure_pdf', 'class' => 'form-control g-limit custom-file-upload', 'accept'=>'.pdf')) }}
                            </div>
                        </div>

                        <div class="form-group"><label class="control-label col-md-4 no-padding-right" for="feature_image">Feature Image :</label>
                            <div class="col-md-8">
                                {{ Form::file('feature_image', array('id'=> 'feature_image', 'class' => 'form-control g-limit custom-file-upload')) }}
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
                                {{ Form::select('status', array('1' => trans('english.ACTIVE'), '2' => trans('english.INACTIVE')), Input::old('status'), array('class' => 'form-control selectpicker', 'id' => 'status')) }}
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

        });
// google map code===========================

function initMap() {

    var myLatLng = {lat: 23.7808875, lng: 90.2792382};

    var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // postion
    // var marker = new google.maps.Marker({
    //     position: myLatLng,
    //     map: map,
    //     draggable: true
    // });


    // google.maps.event.addListener(map, 'click', function(event) { 
    //     alert();
    // });

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

        // document.getElementById('lat').innerHTML = place.geometry.location.lat();
        // document.getElementById('lon').innerHTML = place.geometry.location.lng();
    });
}
    
    
    </script>
@stop


