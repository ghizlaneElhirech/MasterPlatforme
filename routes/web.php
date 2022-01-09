<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\semestres\SemestreController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Subjects\AttendanceController;
use App\Http\Controllers\ProfileController;

use App\User; 
use App\Message;

use App\Semestre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});

 //Route::get('profiles/{id}','ProfileController@edit');
Route::group(['middleware'=>['auth']], function(){

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('tests', 'TestsController');
    Route::resource('topics', 'TopicsController');
    Route::post('topics_mass_destroy', ['uses' => 'TopicsController@massDestroy', 'as' => 'topics.mass_destroy']);
    Route::resource('questions', 'QuestionsController');
    Route::post('questions_mass_destroy', ['uses' => 'QuestionsController@massDestroy', 'as' => 'questions.mass_destroy']);
    Route::resource('questions_options', 'QuestionsOptionsController');
    Route::post('questions_options_mass_destroy', ['uses' => 'QuestionsOptionsController@massDestroy', 'as' => 'questions_options.mass_destroy']);
    Route::resource('results', 'ResultsController');
    Route::post('results_mass_destroy', ['uses' => 'ResultsController@massDestroy', 'as' => 'results.mass_destroy']);
   


});


 //==============================Translate all pages============================
Route::group(
    [ 
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

     //==============================dashboard============================

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


   //==============================dashboard============================
   
    Route::group(['namespace' => 'semestres'], function () {
    Route::resource('semestres', 'SemestreController');
    });

     //==============================Classrooms============================
    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

    });

     //==============================Teachers============================
    Route::group(['namespace' => 'Teachers'], function () {
        Route::resource('Teachers', 'TeacherController');
    });
    
        //==============================Students============================
    Route::group(['namespace' => 'Students'], function () {
        Route::resource('Students', 'StudentController');
        //Route::resource('Attendance', 'AttendanceController');

        Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
        Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
        Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
        Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');

        
    });


 

      //==============================Subjects============================
    Route::group(['namespace' => 'Subjects'], function () {
        Route::resource('subjects', 'SubjectController');
         Route::get('/Get_classrooms/{id}', 'SubjectController@Get_classrooms');
         Route::post('Upload_Subject', 'SubjectController@Upload_attachment')->name('Upload_Subject');
        Route::get('Download_Subject/{subjectsname}/{filename}', 'SubjectController@Download_attachment')->name('Download_Subject');
        Route::post('Delete_Subject', 'SubjectController@Delete_attachment')->name('Delete_Subject');
        Route::get('/Get_Students/{id}', 'SubjectController@Get_Students');
         Route::resource('Attendance', 'AttendanceController');
    });

     //==============================Quizzes============================
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizzController');
    });
});


Route::get('delete_chat', function () {
    Message::truncate();
    return redirect()->route('dashboard');

})->middleware(['auth'])->name('delete_chat');


 
Route::get('MarkAsRead_all','QuizzController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('unreadNotifications_count', 'QuizzController@unreadNotifications_count')->name('unreadNotifications_count');

Route::get('unreadNotifications', 'QuizzController@unreadNotifications')->name('unreadNotifications');

Route::get('MarkAsRead_all','SubjectController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('unreadNotifications_count', 'SubjectController@unreadNotifications_count')->name('unreadNotifications_count');

Route::get('unreadNotifications', 'SubjectController@unreadNotifications')->name('unreadNotifications');



  