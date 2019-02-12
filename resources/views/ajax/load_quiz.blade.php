<label class="col-md-2" for="QuizId">{{trans('english.QUIZ')}} :</label>
<div class="col-md-3">
	{{ Form::select('quiz_id', $quizList, Input::get('quiz_id'), array('class' => 'selectpicker', 'id' => 'QuizId', 'data-live-search'=> true, 'data-size' => 'auto')) }}
</div>