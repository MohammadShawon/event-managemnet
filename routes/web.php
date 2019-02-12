<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

include('frontend.php');

// front end user login
Route::post('front/login', 'Auth\FrontUserLoginController@login');
Route::post('front/logout', 'Auth\FrontUserLoginController@frontLogout');


/// admin
Route::get('adminpanel', function() {
    return View::make('login');
});
Route::post('login', function () {
    $user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password'),
        'status_id' => 1
    );

    if (Auth::attempt($user)) {

        $dataArr = App\ModuleToUser::where('user_id', Auth::user()->id)->get();

        $accessArr = array();
        if (!empty($dataArr)) {
            foreach ($dataArr as $item) {
                $accessArr[$item->module_id][$item->activity_id] = $item->activity_id;
            }
        }

        Session::put('acl', $accessArr);
        return Redirect::to('admin');
    } else {
        Session::flash('error', 'Your username or password was incorrect.!');
        return View::make('login')->withInput(Input::except('password'));
    }
});
// Login end

Route::group(['middleware'=>'authCheck'],function (){
    Route::get('admin','DashboardController@index');

    Route::group(array('middleware' => 'authCheck'), function() {

        Route::get('logout', array('as' => 'logout', function () {
            Auth::logout();
            Session::flush();
            return Redirect::to('adminpanel');
        }));

        Route::get('dashboards','DashboardController@index');
        Route::resource('userGroup', 'UserGroupController');

        Route::post('users/cpself/', 'UsersController@cpself');

        Route::get('users/cpself/', function() {
            return View::make('users/change_password_self');
        });
        Route::get('users/profile/', function () {
            return View::make('users/user_profile');
        });
        Route::post('users/editProfile/', 'UsersController@editProfile');

        Route::resource('users', 'UsersController');
        //Route::get('frontUsers', 'UsersController@quizePlayer');
        //Route::get('frontUsers/date/{date}/{year?}', 'UsersController@quizePlayer');
        Route::get('users/activate/{id}/{param?}', 'UsersController@active');
        Route::post('users/pup/', 'UsersController@pup');
        Route::post('users/filter/', 'UsersController@filter');
        Route::post('frontUsers/filter/', 'UsersController@filterfrontUsers');
        Route::get('users/cp/{id}/{param?}', 'UsersController@change_pass');
        Route::post('users/loadProject', 'UsersController@loadProject');

        Route::get('ajaxresponse/correct-ans', 'AjaxResponseController@postCorrectAns');
        Route::get('ajaxresponse/rolling-quiz', 'AjaxResponseController@postRollingQuiz');


        Route::post('role/filter', 'RoleController@filter');
        Route::resource('role', 'RoleController');

        Route::get('activitylist', 'ActivityController@index');
        Route::get('modulelist', 'ModuleController@index');

        Route::get('roleacl', 'RoleAclController@index');
        Route::post('roleAclSetup', 'RoleAclController@roleAclSetup');
        Route::post('roleacl', 'RoleAclController@save');

        Route::get('useracl', 'UserAclController@index');
        Route::post('userAclSetup', 'UserAclController@userAclSetup');
        Route::post('useracl', 'UserAclController@save');


        Route::post('module/filter', 'ModuleController@filter');
        Route::resource('module', 'ModuleController');

        Route::post('activity/filter', 'ActivityController@filter');
        Route::resource('activity', 'ActivityController');
        Route::get('systemSettings', 'SystemSettingsController@edit');
        Route::put('systemSettings/update', [
            'as'=>'system.update',
            'uses'=>'SystemSettingsController@update'

        ]);

        // Route::resource('categories', 'CategoriesController');
        // Route::get('categories/activate/{id}/{param?}', 'CategoriesController@active');
        // Route::post('categories/filter/', 'CategoriesController@index');

        //Route::get('/{id}', 'PreEntryCcSelectionController@getIndex');
        // Route::resource('quizes', 'QuizesController');
        // Route::get('quizes/activate/{id}/{param?}', 'QuizesController@active');
        // Route::post('quizes/filter/', 'QuizesController@filter');
        // Route::post('quizes/schedule/', 'QuizesController@schedule');
        // Route::get('quizes/sort/{id}', 'QuizesController@sorting');
        // Route::post('quizes/sort/{id}', 'QuizesController@sortingUpdate');

        // Route::get('questionLevelManagement', 'QuestionLevelManageController@manageQuestionLesson');
        // Route::get('getSubCategory/{id}', 'QuestionLevelManageController@getSubCategory');
        // Route::get('getLevel/{id}', 'QuestionLevelManageController@getLevel');
        // Route::get('getLevelQuestions/{id}', 'QuestionLevelManageController@getLevelQuestions');
        // Route::get('removeLevelQuestions/{id}', 'QuestionLevelManageController@removeLevelQuestions');
        // Route::get('questionLevel', 'QuestionLevelManageController@index');


        // Route::post('updateQuestionLevel', 'QuestionLevelManageController@updateQuestionLevel');


        // Route::post('answerType/filter', 'AnswerTypeController@filter');
        // Route::resource('answerType', 'AnswerTypeController');

        // Route::post('questionType/filter', 'QuestionTypeController@filter');
        // Route::resource('questionType', 'QuestionTypeController');

        // Route::post('answerLevel/filter', 'AnswerLevelController@filter');
        // Route::resource('answerLevel', 'AnswerLevelController');
        // Route::resource('contentWriterRole', 'ContentWriterRoleController');
        // Route::get('media/create', 'MediaController@create');
        // Route::post('media', 'MediaController@store');
        // Route::get('media/{id?}', 'MediaController@index');
        // Route::get('media/{id}/edit/{segmentId}', 'MediaController@edit');
        // Route::put('media/{id}/update/{segmentId}', [
        //     'as'=>'media.update',
        //     'uses'=>'MediaController@update'

        // ]);
        // Route::DELETE('media/{id}/{segmentId}','MediaController@destroy');

        // Route::get('question/upload', 'QuestionBankController@create');
        // Route::get('question/{question_status}', 'QuestionBankController@index');
        // Route::post('question/store', 'QuestionBankController@store');
        // Route::DELETE('question/{id}/{status}','QuestionBankController@destroy');
        // Route::get('questions/activate/{id}/{status}', ['as'=>'changeStatus','uses'=>'QuestionBankController@active']);
        // Route::get('questions/{id}/edit/{status}', 'QuestionBankController@edit');
        // Route::put('questions/{id}/update/{status}', [
        //     'as'=>'questions.update',
        //     'uses'=>'QuestionBankController@update'

        // ]);

        // Route::put('questionsQualify/{id}/update/{status}', [
        //     'as'=>'questionsQualify.update',
        //     'uses'=>'QuestionBankController@qualifyQuestion'
        // ]);

        // Route::resource('keywords', 'KeywordController');
        // Route::post('keywords/filter/', 'KeywordController@filter');
        // Route::get('keywords/activate/{id}/{param?}', 'KeywordController@active');
        // Route::get('quizSettings','SystemSettingsController@quizSettings');

        // Route::put('quizSettings/{id}/update', [
        //     'as'=>'quizSetting.update',
        //     'uses'=>'SystemSettingsController@quizSettingsUpdate'

        // ]);
        // Route::resource('grades', 'GradesController');
        // Route::get('grades/activate/{id}/{param?}', 'GradesController@active');

        Route::resource('menus', 'MenusController');
        Route::get('menus/activate/{id}/{param?}', 'MenusController@active');
        Route::post('menus/filter/', 'MenusController@filter');
        //Route::get('user/contentRole', 'ContentRoleController@contentRole');
        //Route::post('user/contentRole/store', 'ContentRoleController@store');
        //Route::get('getUsers/{id}', 'ContentRoleController@getUsers');
        //Route::get('getRoles/{id}', 'ContentRoleController@getRoles');


// sub menus settings=======================================================================
        Route::resource('sub-menus', 'SubMenusController');
        Route::get('sub-menus/activate/{id}/{param?}', 'SubMenusController@active');
        Route::post('sub-menus/filter/', 'SubMenusController@filter');


// Event management=================================================================

        Route::get('agent-to-seminer', 'AgentToSeminarController@index');
        Route::post('post-agent-to-seminer', 'AgentToSeminarController@postAgentToSeminer');
        Route::post('get-agent-presnet-seminer', 'AgentToSeminarController@agentPresentSeminer');

// Event management
        Route::resource('event', 'EventManageMentController');
        Route::get('event/delete/{id}', 'EventManageMentController@eventDelete');

// Seminar Setting==================================================================
        Route::resource('seminar-management', 'SeminarManagementController');
        Route::get('seminar-management/delete/{id}', 'SeminarManagementController@seminarManagementDelete');

// Speaker Management==================================================================
        Route::resource('speaker-management', 'SpeakerManagementController');
        Route::get('speaker-management/delete/{id}', 'SpeakerManagementController@speakerManagementDelete');
        Route::get('speaker-management/{id}/view', 'SpeakerManagementController@eachSpeakerView');
        Route::get('speaker-management/each-speaker-info-print/{id}', 'SpeakerManagementController@eachSpeakerPrint');
        Route::get('all-speaker-print', 'SpeakerManagementController@allSpeakerPrint');
        Route::post('speaker-management/searchByEvent', 'SpeakerManagementController@searchByEvent');

// exibitiors-management==================================================================
        Route::resource('exibitiors-management', 'ExhibitorManagementController');
        Route::get('exibitiors-management/delete/{id}', 'ExhibitorManagementController@exibitiorManagementDelete');
        Route::get('exibitiors-management/{id}/view', 'ExhibitorManagementController@eachExibitiorView');
        Route::get('exibitiors-management/each-exibitiors-info-print/{id}', 'ExhibitorManagementController@eachExibitiorPrint');
        Route::get('all-exibitior-print', 'ExhibitorManagementController@allExibitiorsPrint');
        Route::post('exibitiors-management/searchByEvent', 'ExhibitorManagementController@searchByEvent');


// Exhibitor to Event Management==================================================================
        Route::resource('exhibitor-to-event', 'ExhibitorToEventManagementController');
        Route::get('exhibitor-to-event/delete/{id}', 'ExhibitorToEventManagementController@exibitiorToEventDelete');

// Sponsor Management==================================================================
        Route::resource('sponsor-management', 'SponsorManagementController');
        Route::get('sponsor-management/delete/{id}', 'SponsorManagementController@sponsorManagementDelete');
        Route::get('sponsor-management/{id}/view', 'SponsorManagementController@eachSponsorView');
        Route::get('sponsor-management/each-sponsor-info-print/{id}', 'SponsorManagementController@eachSponsorPrint');
        Route::get('all-sponsor-print', 'SponsorManagementController@allSponsorPrint');
        Route::post('sponsor-management/searchByEvent', 'SponsorManagementController@searchByEvent');

// Sponsor to Event Management==================================================================
        Route::resource('sponsor-to-event', 'SponsorToEventManagementController');
        Route::get('sponsor-to-event/delete/{id}', 'SponsorToEventManagementController@sponsorToEventDelete');

// Sponsor to Event Management==================================================================
        Route::resource('floor-plan', 'FloorPlanController');
        Route::get('floor-plan/delete/{id}', 'FloorPlanController@floorPlanDelete');

// User Registration==================================================================
        Route::resource('user-registration', 'UserRegistrationController');
        Route::get('user-registration/{id}/view', 'UserRegistrationController@userRegistrationView');
        Route::get('user-registration/delete/{id}', 'UserRegistrationController@userRegistrationDelete');
        Route::get('user-pre-registration', 'UserRegistrationController@userPreRegistration');
        Route::post('user-pre-registration/search', 'UserRegistrationController@userPreRegisterSearch');
        Route::get('registration/all-user-info-print', 'UserRegistrationController@allUserInformation');
        Route::get('user-registration/each-user-info-print/{id}', 'UserRegistrationController@eachUserInfoPrint');
        Route::post('user-registration/getEventsIds', 'UserRegistrationController@getEventsIds');
        // search
        Route::post('searchFromIndex', 'UserRegistrationController@searchFromIndex');
        Route::post('searchEventOrOthers', 'UserRegistrationController@searchEventOrOthers');
        Route::get('user-registration-today', 'UserRegistrationController@index');
        Route::get('user-registration-thisMonth', 'UserRegistrationController@index');
        Route::get('user-registration-previousMonth', 'UserRegistrationController@index');

// User Event Attendance ==================================================================
        Route::get('event-attendance/event-attendance', 'UserEventAttendanceController@index');
        Route::post('event-attendance/post-event-attendance', 'UserEventAttendanceController@postEventAttendance');

// User Seminar Attendance ==================================================================
        Route::get('seminar-attendance/seminar-attendance', 'UserSeminarAttendanceController@index');
        Route::post('seminar-attendance/post-seminar-attendance', 'UserSeminarAttendanceController@postSeminarAttendance');

// Event Setting==================================================================
        Route::get('event-settings/{id?}', 'EventSettingController@index');
        Route::post('event-settings/post-active-event', 'EventSettingController@postActiveEvent');
        Route::post('event-settings/post-registration-way', 'EventSettingController@postRegistrationWay');
        Route::post('event-settings/edit-registration-way', 'EventSettingController@editRegistrationWay');
        Route::get('event-settings/registration-way-delete/{id}/{param}', ['as'=>'changeStatus','uses'=>'EventSettingController@registratioWayDelete']);
        Route::post('event-settings/post-registration-type', 'EventSettingController@postRegistrationType');
        Route::post('event-settings/edit-registration-type', 'EventSettingController@editRegistrationType');
        Route::get('event-settings/registration-type-delete/{id}/{param}', ['as'=>'changeStatus','uses'=>'EventSettingController@registratioTypeDelete']);
        Route::post('event-settings/post-name-prefix', 'EventSettingController@postNamePrefix');
        Route::post('event-settings/edit-name-prefix', 'EventSettingController@editNamePrefix');
        Route::get('event-settings/name-prefix-delete/{id}/{param}', 'EventSettingController@namePrefixDelete');
        Route::post('event-settings/post-speaker-type', 'EventSettingController@postSpeakerType');
        Route::post('event-settings/edit-speaker-type', 'EventSettingController@editSpeakerType');
        Route::get('event-settings/speaker-type-delete/{id}/{param}', 'EventSettingController@speakerTypeDelete');
        Route::post('event-settings/post-sponsor-type', 'EventSettingController@postSponsorType');
        Route::post('event-settings/edit-sponsor-type', 'EventSettingController@editSponsorType');
        Route::get('event-settings/sponsor-type-delete/{id}/{param}', 'EventSettingController@sponsorTypeDelete');
        Route::post('event-settings/post-booth-type', 'EventSettingController@postBoothType');
        Route::post('event-settings/edit-booth-type', 'EventSettingController@editBoothType');
        Route::get('event-settings/sponsor-booth-delete/{id}/{param}', 'EventSettingController@boothTypeDelete');


        // fontend settings website management

        Route::get('website-management/question-list', 'WebsiteSettingController@questionList');
        Route::get('website-management/create-question-list', 'WebsiteSettingController@createQuestionList');
        Route::post('website-management/post-question-list', 'WebsiteSettingController@postQuestionList');
        Route::get('website-management/edit-question-list/{id}/{param?}', 'WebsiteSettingController@editQuestionList');
        Route::post('website-management/post-edit-question', 'WebsiteSettingController@postEditQuestion');

        Route::get('website-management/{id?}', 'WebsiteSettingController@index');
        Route::post('website-management/post-slider-image', 'WebsiteSettingController@postSliderImage');
        Route::get('website-management/active-inactive/{id?}', 'WebsiteSettingController@activeInactive');

        Route::post('website-management/post-event-image', 'WebsiteSettingController@postEventImage');
        Route::get('website-management/active-inactive-event-image/{id?}', 'WebsiteSettingController@activeInactiveEvent');

// add message ====================================

        Route::resource('add-message', 'AddMessageController');
        Route::get('add-message/delete/{id}', 'AddMessageController@messageDelete');
        Route::get('add-message/{id}/view', 'AddMessageController@eachMessageView');
        //Route::get('speaker-management/each-speaker-info-print/{id}', 'AddMessageController@eachSpeakerPrint');
        //Route::get('all-speaker-print', 'AddMessageController@allSpeakerPrint');
        //Route::post('speaker-management/searchByEvent', 'AddMessageController@searchByEvent');

// send sms or email ======================================
        Route::get('send-email-sms', 'SendEmailOrSmsController@index');
        Route::post('ajax-serchtype-data', 'SendEmailOrSmsController@searchDataAjax');
        Route::post('post-send-email-sms', 'SendEmailOrSmsController@postSendEmailSms');

// Question answer download
        Route::get('question-answer-download', 'WebsiteSettingController@questionAnswer');
        Route::post('question-answer-download-download', 'WebsiteSettingController@questionAnswerDownload');

        //Route::get('questions/activate/{id}/{status}', ['as'=>'changeStatus','uses'=>'QuestionBankController@active']);

    });



});

