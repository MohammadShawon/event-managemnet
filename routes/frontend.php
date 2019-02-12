<?php

Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::get('about-us', 'HomeController@aboutUs');
Route::get('contact-us', 'HomeController@contactUs');
Route::post('contact-us/contact-us-post', 'HomeController@contactUsPost');
Route::get('contact-us/front-contact-us-view', 'HomeController@frontContactUsView');

Route::get('speaker-details/front-speaker-details/{id}', 'HomeController@frontSpeakerDetails');

Route::get('seminar-details/front-seminar-details/{id}', 'HomeController@frontSeminarDetails');

Route::get('event/about-event-front', 'HomeController@aboutEventFront');
Route::get('event/profile-event-front', 'HomeController@profileEventFront');
//Route::get('event/fact-sheet-front', 'HomeController@factSheetFront');
Route::get('event/why-bangladesh', 'HomeController@whyBangladesh');
Route::get('event/messages', 'HomeController@chairmanManagerMessage');
Route::get('event/executive-committee', 'HomeController@executiveCommittee');
Route::get('event/front-message-details/{id}', 'HomeController@messageDetail');
Route::get('event/press-release-front', 'HomeController@pressRelease');

Route::get('exhibitor/exhibitor-profile', 'HomeController@exhibitorAssociates');
Route::get('exhibitor/exhibitor-details-profile/{id}', 'HomeController@exhibitorDetailsProfile');
Route::get('exhibitor/exhibitor-brochure', 'HomeController@exhibitorBrochure');
Route::get('exhibitor/floor-plan', 'HomeController@exhibitorFloorPlan');
Route::get('exhibitor/fact-sheet-front', 'HomeController@factSheetFront');
Route::get('exhibitor/exhibitor-list', 'HomeController@exhibitorProfile');

Route::get('seminar/seminar-speaker', 'HomeController@seminarSpeaker');
Route::get('seminar/seminar-schedule', 'HomeController@seminarSchedule');
Route::get('seminar/technical-proceedings', 'HomeController@technicalProceedings');

Route::get('visitor', 'HomeController@frontVisitor');
Route::get('sponsor', 'HomeController@frontSponsor');

Route::get('gallery/front-gallery/{id}', 'HomeController@frontGallery');

Route::get('exhibitor/become-exhibitor', 'HomeController@becomeExhibitor');
Route::post('exhibitor/post-become-exhibitor', 'HomeController@postBecomeExhibitor');
Route::get('exhibitor/front-become-exhibitor-view', 'HomeController@becomeExhibitorView');

Route::get('sponsor/become-sponsor', 'HomeController@becomeSponsor');
Route::post('sponsor/post-become-sponsor', 'HomeController@postBecomeSponsor');
Route::get('sponsor/front-become-sponsor-view', 'HomeController@becomeSponsorView');

// frpmt user registration ====================================
Route::get('front/user-registration', 'FrontUserRegistrationController@frontUserRegistration');
Route::post('front/post-user-registration', 'FrontUserRegistrationController@postUserRegistration');
Route::get('font/seminar-select-page/{id?}', 'FrontUserRegistrationController@seminarSelect');
Route::post('front/seminar-select-post','FrontUserRegistrationController@postSeminerSelect');
Route::get('font/question-answer-page/{id?}', 'FrontUserRegistrationController@questionAsnwer');
Route::post('front/question-answer-post','FrontUserRegistrationController@postQuestionAnswer');
Route::get('front/front-user-edit-profile', 'FrontUserRegistrationController@editFrontUserProfile');
Route::post('front/post-front-edit-profile', 'FrontUserRegistrationController@postFrontEditProfile');
Route::get('front/front-user-upsmnr', 'FrontUserRegistrationController@frontUserUpSmnr');
Route::post('front/front-user-post-upsmnr', 'FrontUserRegistrationController@frontUserPostUpSmnr');
Route::get('front/front-user-upqansw', 'FrontUserRegistrationController@upQansw');
Route::post('front/front-user-post-upqansw', 'FrontUserRegistrationController@frontUserPostUpqansw');

// fornt user dashboard
Route::get('front/front-user-dashboard', 'FrontUserProfileController@index');
Route::post('front/post-user-to-event','FrontUserProfileController@frontUserToEventRegi');
Route::get('front/front-user-idcard-check', 'FrontUserProfileController@frontUserIdCardCheck');
Route::get('front/front-user-register-not-attendance', 'FrontUserProfileController@frontUserRegiterNotAttend');
Route::get('front/front-user-register-attendance', 'FrontUserProfileController@frontUserRegiterAttend');

Route::get('front/front-user-seminer-not-attendance', 'FrontUserProfileController@frontUserSeminerNotAttend');
Route::get('front/front-user-seminer-attendance', 'FrontUserProfileController@frontUserSeminerAttend');

// for get password
Route::get('front/forget-password', 'FrontUserProfileController@frogetForgetPassword');
Route::post('front/post-forget-password', 'FrontUserProfileController@postFrogetForgetPassword');

// change password
Route::get('front/fucpself/', function() {
            return View::make('front-end/user-profile/front-user-password-change');
        });
Route::post('front/fucpself', 'FrontUserProfileController@changePassword');

// profile picture change
Route::get('front/fuppc/', function() {
            return View::make('front-end/user-profile/front-user-profile-pic-cng');
        });
Route::post('front/fuppc', 'FrontUserProfileController@fuppc');


Route::get('disclaimer', 'HomeController@disclaimer');
Route::get('terms', 'HomeController@terms');
Route::get('privacy', 'HomeController@privacy');
Route::get('faq', 'HomeController@faq');
Route::get('advertisement', 'HomeController@advertize');
Route::get('login', 'HomeController@login');
Route::get('registration', 'HomeController@registration');
Route::post('submitregi', 'HomeController@submitRegi');
Route::post('confirmRegistration', 'HomeController@confirmRegistration');
Route::get('forgot-password', 'HomeController@forgotPassword');
Route::post('forgot-password', 'HomeController@forgotPasswordAction');
Route::post('overwritePassword', 'HomeController@overwritePassword');
Route::post('doOverwritePassword', 'HomeController@doOverwritePassword');
Route::get('overwrite-complete', 'HomeController@overwriteComplete');
Route::get('recover-password/{id}', 'HomeController@recoverPassword');
Route::post('doRecoverPassword', 'HomeController@doRecoverPassword');
Route::get('score/{id}', 'HomeController@score');
Route::get('certificate', 'HomeController@certificate');

Route::get('checkMsisdn', 'HomeController@checkMsisdn');
Route::get('quize/{id}', 'HomeController@subcategory');
Route::get('search', 'HomeController@search');
Route::get('aboutUs', 'HomeController@aboutUs');
Route::get('contactUs', 'ContactUsController@index');
Route::post('contactUs/send', 'ContactUsController@contact');

// user email verification created by lemon
Route::get('user/email/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UserRegistrationController@emailVerifyConfirm'
]);


//frontlogin

Route::post('frontLogin', function () {

    //if the user is already logged In, send him to home page
    if (Auth::check()) {
        return Redirect::to('/');
    }
    $user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password'),
        'status_id' => 1
    );

    if (Auth::attempt($user)) {
        return Redirect::to('/' . Session::get('hit_link'));
    } else {
        Session::flash('error', trans('bangla.INVALID_USERNAME_PASSWORD'));
        return Redirect::to('registration');
        return View::make('registration')->withInput(Input::except('password'));
    }
});



Route::group(['middleware'=>'FrontAuthCheck'],function (){

    Route::get('frontLogout', array('as' => 'logout', function () {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }));

Route::get('topic/{id}', 'HomeController@categorywisequiz');
Route::get('quizhome', 'HomeController@quizhome');
Route::get('playquiz/{id}', 'HomeController@playquiz');
Route::get('successRegistration', 'HomeController@successRegistration');
Route::get('my-profile', 'HomeController@myProfile');
Route::get('update-profile', 'HomeController@updateProfile');
Route::post('update-profile', 'HomeController@doUpdateProfile');
Route::get('quiz-history', 'HomeController@quizHistory');
Route::get('quiz-history/{id}', 'HomeController@quizHistoryDetails');
Route::get('my-account', 'HomeController@myAccount');
Route::get('chargingProcess', 'HomeController@chargingProcess');
Route::get('certificate/{id}', 'HomeController@certificate');
Route::get('accountSettings', 'AccountSettingsController@accountSettings');
Route::post('edit-profile/{id}', [
        'as'=>'user.update',
        'uses'=>'AccountSettingsController@updateProfile'

]);\
    Route::post('passwordReset', 'AccountSettingsController@passwordReset');


});
