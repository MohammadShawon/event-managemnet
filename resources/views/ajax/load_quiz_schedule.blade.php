<div class="filter-form">
    {{ Form::open(array('role' => 'form', 'id'=>'setSchedule', 'url' => 'quizes/schedule', 'class' => 'form-horizontal col-md-12')) }}
    
    <div class="input text">
        <label for="QuizStartDate">{{trans('english.START_DATE')}} :</label>
        {{ Form::text('start_date', $quizInfo->start_date , array('id'=> 'QuizStartDate', 'class' => 'form-control datetimepicker', 'readonly'=>true)) }}
        <i class="icon-remove remove-date" title="Remove Start Date" remove="QuizStartDate"></i>
    </div>
    <div class="input text">
        <label for="QuizEndDate">{{trans('english.END_DATE')}} :</label>
        {{ Form::text('end_date', $quizInfo->end_date, array('id'=> 'QuizEndDate', 'class' => 'form-control datetimepicker', 'readonly'=>true)) }}
        <i class="icon-remove remove-date" title="Remove End Date" remove="QuizEndDate"></i>
    </div>
    <div class="col-lg-8">
        <button class="btn btn-primary" type="submit"><i class="icon-save"></i> {{trans('english.UPDATE_SCHEDULE')}}</button>
    </div>
    {{ Form::hidden('id', $quizInfo->id) }}

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
            
            if (($('#QuizStartDate').val() != '') && ($('#QuizEndDate').val() == '')) {
                alert('Enter End Date!');
                return false;
            }
            
            if (($('#QuizEndDate').val() != '') && ($('#QuizStartDate').val() == '')) {
                alert('Enter Start Date!');
                return false;
            }
            
            var startDate = new Date($('#QuizStartDate').val()).getTime() / 1000;
            var endDate = new Date($('#QuizEndDate').val()).getTime() / 1000;
            
            if(endDate < startDate){
                alert('Start date can\'t be greater than End date!');
                return false;
            }
            
        });
    
    });
    
</script>