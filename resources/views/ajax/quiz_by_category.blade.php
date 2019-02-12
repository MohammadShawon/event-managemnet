
    <label for="QuestionQuizId">{{trans('english.SELECT_QUIZ')}} :</label>
    {{ Form::select('quiz_id', $quizArr, null, array('class' => 'selectpicker', 'id' => 'QuestionQuizId', 'data-live-search'=>'true', 'data-size'=>'auto', 'required' => 'true')) }}
    <span><span class="mandatory"> *</span></span>

