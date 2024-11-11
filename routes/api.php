<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Auth\AuthController;

use App\Http\Controllers\Api\Unit\GetUnitComponent;
use App\Http\Controllers\Api\Video\VideosShowComponent;
use App\Http\Controllers\Api\Exam\ExamController;
use App\Http\Controllers\Api\Questions\Questions;
use App\Http\Controllers\Api\Questions\StudentQuestions;

use App\Http\Controllers\Api\QuestionAnswers\QuestionAnswers;

use App\Http\Controllers\Api\results\StudentAnswers;

use App\Http\Controllers\Api\Video\HandleVideo;

use App\Http\Controllers\Api\Password\GetvalidatePassword;

use App\Http\Controllers\Api\Slider\SliderController;

use App\Http\Controllers\Api\QuestionMoney\QuestionMoneyController;

use App\Http\Controllers\Api\results\ChoiceComponent;


use App\Http\Controllers\Api\results\ResultFinalComponent;

use App\Http\Controllers\Api\Exam\ResultComponent;

use App\Http\Controllers\Api\Files\HandleFiles;

use App\Http\Controllers\Api\Lectures\LectureController;

use App\Http\Controllers\Api\Wallet\BuyController;

use  App\Http\Controllers\Api\Students\StudentController;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('logout',[AuthController::class,'logout']);

Route::get('sliders/{year_type}',[SliderController::class,'slider']);

Route::get('student/{id_user}',[ResultFinalComponent::class,'getResult']);



    Route::get('getunits/{year}',[GetUnitComponent::class,'getcategory']);
    Route::get('videomena/{month}/{year_type}/{id_user}',[VideosShowComponent::class,'checkvalidate']);
    Route::get('exams_return/{year_type}/{id_student}',[ExamController::class,'returnexams']);
    Route::get('questions/{id_exam}',[Questions::class,'returnquestions']);
    Route::get('validatepass/{exam_id}/{password}',[GetvalidatePassword::class,'validatepassword']);
    Route::post('resultchoice',[ResultComponent::class,'checkanswerchoice']);
    Route::post('resultpargraph',[ResultComponent::class,'checkanswerpar']);
    Route::post('resultall',[ResultComponent::class,'getResultExam']);
    Route::get('moneyquestion',[QuestionMoneyController::class,'moneyreturnquestions']);
    // handle pdf
    Route::get('file/pdf/{unit_id}',[HandleFiles::class,'show']);

    //Post & get Student Question & answers
    Route::post('student-questions', [StudentQuestions::class, 'store']);
    Route::get('/student-questions/{unit_id}', [StudentQuestions::class, 'index']);
    Route::get('/student-questions/show/{year_type}', [StudentQuestions::class, 'show']);
    // answers [get answer of specific question - store answers ]
    Route::apiResource('/question/answers', QuestionAnswers::class);

    // Videos of lectures [show]
    Route::get('/lecture/videos/{id}', [HandleVideo::class,'show']);
    //free videos
    Route::get('/lecture/free/videos', [HandleVideo::class,'freeVideos']);

    
    // student answers and correct answers
    Route::get('/student/answers/{exam_id}/{user_id}', [StudentAnswers::class,'show']);

    Route::get('lecture/{id}',[LectureController::class,'show']);

    // lectures of one units
    Route::get('unit/lectures/{id}',[LectureController::class,'unitLectures']);

    // wallet  -- buy lectures and monthes
    Route::post('buy/lecture',[BuyController::class,'buy_lecture']);
    Route::post('buy/month',[BuyController::class,'buy_month']);

    // check student lecture and unit
    Route::get('check/student/lectures/{id}', [StudentController::class, 'checkLectures']);
    Route::get('check/student/units/{id}',[StudentController::class,'checkUnits']);
    Route::get('student/wallet/{id}',[StudentController::class,'returnwallet']);
