<div class="filter-form">
    {{ Form::open(array('role' => 'form', 'id'=>'setSchedule', 'url' => 'advertizes/schedule', 'class' => 'form-horizontal col-md-12')) }}
    
    <div class="input text">
        <label for="AdvertizeStartDate">{{trans('english.START_DATE')}} :</label>
        {{ Form::text('start_date', $advertizeInfo->start_date , array('id'=> 'AdvertizeStartDate', 'class' => 'form-control datetimepicker', 'readonly'=>true)) }}
        <i class="icon-remove remove-date" title="Remove Start Date" remove="AdvertizeStartDate"></i>
    </div>
    <div class="input text">
        <label for="AdvertizeEndDate">{{trans('english.END_DATE')}} :</label>
        {{ Form::text('end_date', $advertizeInfo->end_date, array('id'=> 'AdvertizeEndDate', 'class' => 'form-control datetimepicker', 'readonly'=>true)) }}
        <i class="icon-remove remove-date" title="Remove End Date" remove="AdvertizeEndDate"></i>
    </div>
    <div class="col-lg-8">
        <button class="btn btn-primary" type="submit"><i class="icon-save"></i> {{trans('english.UPDATE_SCHEDULE')}}</button>
    </div>
    {{ Form::hidden('id', $advertizeInfo->id) }}

    {{Form::close()}}
</div>

<script type="text/javascript">
    
    $(document).ready(function() {

        $(".datetimepicker").datepicker({
            dateFormat: 'yy-mm-dd'
        });
        
        $(".remove-date").click(function() {
            var remove = $(this).attr('remove');
            $('#' + remove).val('');
        });
        
        $('#setSchedule').on("submit", function() {
            
            if (($('#AdvertizeStartDate').val() != '') && ($('#AdvertizeEndDate').val() == '')) {
                alert('Enter End Date!');
                return false;
            }
            
            if (($('#AdvertizeEndDate').val() != '') && ($('#AdvertizeStartDate').val() == '')) {
                alert('Enter Start Date!');
                return false;
            }
            
            var startDate = new Date($('#AdvertizeStartDate').val()).getTime() / 1000;
            var endDate = new Date($('#AdvertizeEndDate').val()).getTime() / 1000;
            
            if(endDate < startDate){
                alert('Start date can\'t be greater than End date!');
                return false;
            }
            
        });
    
    });
    
</script>