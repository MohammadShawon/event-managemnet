<?php

use App\Http\Controllers\Controller;
use App\Quiz;
use App\QuizLog;
use App\Category;
use App\Grade;
class AjaxResponseController extends Controller  {

    public function getIndex() {
        echo 'Ajax Page';
    }

    //Cost center list function
    public function postMenuChooser() {

        $typeId = Input::get('typeId');

        $returnArr = array();
        if ($typeId == '1') {             //Category
            $data['targetArr'] = array(0 => trans('english.SELECT_CATEGORY_OPT')) + Category::where('status_id', '1')->where('parent_id','=', '0')->orderBy('name', 'asc')->lists('name', 'id');
            $data['menuId'] = 'CategoryId';
            $data['selectMenu'] = trans('english.SELECT_CATEGORY');
            $data['targetName'] = 'category_id';
        } else if ($typeId == '2') {       //Quiz
            $data['targetArr'] = array(0 => trans('english.SELECT_QUIZ_OPT')) + Quiz::where('status_id', '1')->orderBy('name', 'asc')->lists('name', 'id');
            $data['menuId'] = 'QuizId';
            $data['selectMenu'] = trans('english.SELECT_QUIZ');
            $data['targetName'] = 'quiz_id';
        } else if ($typeId == '3') {       //Internal URL
            $data['targetArr'] = array(0 => trans('english.SELECT_INTERNAL_URL_OPT')) + InternalUrl::orderBy('name', 'asc')->lists('name', 'corellator');
            $data['menuId'] = 'InternalUrlId';
            $data['selectMenu'] = trans('english.SELECT_INTERNAL_URL');
            $data['targetName'] = 'url';
        }

        return View::make('ajax/menu_chooser', $data);
    }

    //added by sahadat
    public function postCorrectAns() {
        $answer = Input::get('answer');
        $corAnswer = Session::get('questions.' . Session::get('q_index') . '.correct_answer');

        //updat score
        if ($answer == $corAnswer) {
            Session::put('score', (Session::get('score') + 1));
        }

        $pointCount = '<div class="col-md-2 col-xs-3 col-sm-2 ">
                            <h4 class="point">'.C::toBangla(Session::get('score')).'</h4>
                            <h4 class="point"> '.trans('bangla.POINT').' </h4>
                        </div>';
        $lesson=Session::get('q_index')+1;

        $reply = array('correct_answer' => $corAnswer, 'point_count' => $pointCount,'lesson'=>$lesson);
        return json_encode($reply);
    }

    public function postRollingQuiz() {

        $answer = Input::get('answer');
        $counterTime = Input::get('counter_time');

        $parsed = date_parse($counterTime);
        $seconds = $parsed['hour'] * 3600 + $parsed['minute'] * 60 + $parsed['second'];
        Session::put('counter_time', $seconds);

        //move to next index
        Session::put('q_index', (Session::get('q_index') + 1));

        if ((Session::get('q_index')) == sizeof(Session::get('questions'))) {

            //Find out Grade
            $scorePercent = ceil((Session::get('score') * 100) / Session::get('q_total'));
            $grade = Grade::whereRaw('? between start_range and end_range and status_id = 1', array($scorePercent))->first();

            $quizInfo = Quiz::where('id', Session::get('quiz_id'))->first();

            //Update average score of this game
            $quizInfo->avg_score = (($quizInfo->total_play * $quizInfo->avg_score) + Session::get('score')) / ($quizInfo->total_play + 1);
            //update the total_play number of the quiz
            $quizInfo->total_play = $quizInfo->total_play + 1;
            $quizInfo->save();

            $quizLog = new QuizLog;
            $quizLog->quiz_id = Session::get('quiz_id');
            $quizLog->category_id = Session::get('category_id');
            $quizLog->user_id = Auth::user()->id;
            $quizLog->start_time = Session::get('log_start_time');
            $quizLog->total_question = sizeof(Session::get('questions'));
            $quizLog->end_time = date('Y-m-d H:i:s');
            $quizLog->grade_id = $grade->id;
            $quizLog->score = Session::get('score');
            $quizLog->counter_time = Session::get('counter_time');
            $quizLog->save();

            $reply = array('redirect' => true, 'logId' => $quizLog->id);
            return json_encode($reply);
        }

        $quizInfo2 = Quiz::where('id', Session::get('quiz_id'))->first();
        $categoryInfo = Category::where('id',$quizInfo2->category_id)->first();
        //get question details
        $question = Session::get('questions.' . Session::get('q_index'));

        $serial_count = '<div class="col-md-5 col-xs-3 col-sm-2 "><h4 class="qu-serial">'.($lesson=Session::get('q_index')+1) .'</h4></div>';

        $nextBtnShow = '<div class="next-btn-hide"><div class="text-right"><button id="nextBtn" class="btn-reg-next" value=""><span class="poroborti">'.trans('bangla.NEXT').'</span></button></div></div>';
        $lesson=Session::get('q_index')+1;
        $reply = array('redirect' => false, 'data' => View::make('ajax/rollingquiz')->with(compact('question','categoryInfo'))->render(),
            'serial_count' => $serial_count,'next_btn_show' => $nextBtnShow,'lesson'=>$lesson);
        return $reply;
    }



    public function postQuizByCategory() {

        $categoryId = Input::get('categoryId');
        $data['quizArr'] = array('0' => trans('english.SELECT_QUIZ_OPT')) + Quiz::orderBy('name', 'asc')->where('category_id', $categoryId)->lists('name', 'id');
        ;

        return View::make('ajax/quiz_by_category', $data);
    }

    public function postLoadQuizSchedule() {

        $quizId = Input::get('quizId');
        $quizInfo = Quiz::where('id', $quizId)->get(array('id', 'start_date', 'end_date'))->first();

        $data['quizInfo'] = $quizInfo;

        return View::make('ajax/load_quiz_schedule', $data);
    }

    public function postLoadAdvertizeSchedule() {

        $advertizeId = Input::get('advertizeId');
        $advertizeInfo = Advertize::where('id', $advertizeId)->get(array('id', 'start_date', 'end_date'))->first();

        $data['advertizeInfo'] = $advertizeInfo;

        return View::make('ajax/load_advertize_schedule', $data);
    }

    public function postLoadQuiz() {

        $categoryId = Input::get('category_id');
        $quizArr = array(0 => trans('english.SELECT_QUIZ_OPT')) + Quiz::where('category_id', $categoryId)->orderBy('name', 'asc')->lists('name', 'id');
        $data['quizList'] = $quizArr;

        return View::make('ajax/load_quiz', $data);
    }



}
