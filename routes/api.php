<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MobileAppController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('password-reset-otp', [MobileAppController::class, 'passwordResetOTP']);
Route::post('password-reset', [MobileAppController::class, 'passwordReset']);
Route::post('registerOTP', [MobileAppController::class, 'registerOTP']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('accounts/authenticate', [MobileAppController::class, 'login']);
Route::group(['middleware'=>['auth:sanctum']],function(){


  Route::post('saveOrder', [MobileAppController::class, 'saveOrder']);
  
 ///START APp

 
 Route::post('patient/savePatient', [MobileAppController::class, 'savePatient']);
 Route::post('patient/all', [MobileAppController::class, 'allPatient']);
 Route::post('patient/getPatientDetails', [MobileAppController::class, 'getPatientDetails']);
 Route::post('patient/saveTestForClientFeedbacks', [MobileAppController::class, 'saveTestForClientFeedbacks']);
 Route::post('patient/getAppointmentByDate', [MobileAppController::class, 'getAppointmentByDate']);
 Route::post('patient/saveAppointmentSession', [MobileAppController::class, 'saveAppointmentSession']);
 Route::post('patient/saveorUpdateSession', [MobileAppController::class, 'saveorUpdateSession']);
 Route::post('patient/getSessionData', [MobileAppController::class, 'getSessionData']);
 Route::post('patient/saveTestForClientFeedbacks', [MobileAppController::class, 'saveTestForClientFeedbacks']);
 
 Route::post('patient/UpdatePatientProductConsumed', [MobileAppController::class, 'UpdatePatientProductConsumed']);
 Route::post('patient/getPatientSearch', [MobileAppController::class, 'getPatientSearch']);
 

    Route::post('accounts/savePushToken', [MobileAppController::class, 'savePushToken']);
    Route::post('saveUserInvitation', [MobileAppController::class, 'saveUserInvitation']);
    Route::post('saveStartChallenge', [MobileAppController::class, 'saveStartChallenge']);
    Route::post('getStartChallengeByUser', [MobileAppController::class, 'getStartChallengeByUser']);
    Route::post('updateStartChallengeById', [MobileAppController::class, 'updateStartChallengeById']);
    Route::post('saveChallengeRequest', [MobileAppController::class, 'saveChallengeRequest']);
    Route::post('updateChallengeRequestById', [MobileAppController::class, 'updateChallengeRequestById']);
    Route::post('getChallengeRequestsByUserSent', [MobileAppController::class, 'getChallengeRequestsByUserSent']);
    Route::post('getChallengeRequestsByUserGot', [MobileAppController::class, 'getChallengeRequestsByUserGot']);
    Route::post('saveMoodandCraving', [MobileAppController::class, 'saveMoodandCraving']);

    Route::post('getInvitationsByUserSent', [MobileAppController::class, 'getInvitationsByUserSent']);
    
    Route::post('getMyPreviousChallenges', [MobileAppController::class, 'getMyPreviousChallenges']);
    Route::post('getallArticles', [MobileAppController::class, 'getallArticles']);
    Route::post('getallPages', [MobileAppController::class, 'getallPages']);
    Route::post('getMyBadges', [MobileAppController::class, 'getMyBadges']);
    Route::post('getMyLastweekMoodandCraving', [MobileAppController::class, 'getMyLastweekMoodandCraving']);
    Route::post('getMyLastmonthMoodandCraving', [MobileAppController::class, 'getMyLastmonthMoodandCraving']);
    Route::post('getAllBadges', [MobileAppController::class, 'getAllBadges']);
    Route::post('getMyNotification', [MobileAppController::class, 'getMyNotification']);
    Route::post('getMyLeaderBoard', [MobileAppController::class, 'getMyLeaderBoard']);
    Route::post('getArticlesfromKeyword', [MobileAppController::class, 'getArticlesfromKeyword']);
    Route::post('deletePushToken', [MobileAppController::class, 'deletePushToken']);
    Route::post('updateUserTimeZneById', [MobileAppController::class, 'updateUserTimeZneById']);
    Route::post('updateChallengeById', [MobileAppController::class, 'updateChallengeById']);
    Route::post('getMyFriendLeaderBoard', [MobileAppController::class, 'getMyFriendLeaderBoard']);
      Route::post('saveBaselineSurvey', [MobileAppController::class, 'saveBaselineSurvey']);
          Route::post('saveEcologicalSurvey', [MobileAppController::class, 'saveEcologicalSurvey']);
    
    
    
});
