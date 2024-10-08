<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'HomeController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/lupa_password', 'Auth\LoginController@viewLupaPassword')->name('lupa_password');
Route::post('/lupa_password', 'Auth\LoginController@emailLupaPassword')->name('lupa_password-post');

Route::get('/lupa_password/{email}/{id}', 'Auth\LoginController@viewLupaPasswordEmail')->name('lupa_password-email');
Route::post('/lupa_password/email', 'Auth\LoginController@lupaPassword')->name('lupa_password-email-post');

Route::get('/faq', 'FaqController@index')->name('faq');

Route::get('/jobs', 'HomeController@jobs')->name('jobs');
Route::get('/job-detail/{id}', 'HomeController@jobDetail')->name('job-detail');
Route::get('/job-search', 'HomeController@searchJob')->name('job-search');


Route::get('/admin-dashboard/changeUnit', 'AdminDashboardController@changeUnit')->name('changeUnit');
Route::get('/admin-dashboard', 'AdminDashboardController@index')->name('admin-dashboard');
Route::get('/admin-dashboard/jobs', 'AdminDashboardController@jobs')->name('dashboard-jobs');
Route::get('/admin-dashboard/job/create', 'JobController@createJob')->name('create-job');
Route::post('/admin-dashboard/job/create', 'JobController@storeJob')->name('store-job');
Route::get('/admin-dashboard/job/{job_id}/edit', 'JobController@editJob')->name('edit-job');
Route::post('/admin-dashboard/job/{job_id}/edit', 'JobController@updateJob')->name('update-job');
Route::post('/admin-dashboard/job/{job_id}/close', 'JobController@closeJob')->name('close-job');
Route::get('/admin-dashboard/job/{job_id}/delete', 'JobController@delete')->name('delete-job');
Route::post('/admin-dashboard/job/preview', 'JobController@preview')->name('preview-job');
Route::get('/admin-dashboard/job/detail/{id}', 'AdminDashboardController@detailJob')->name('detail-job');

Route::get('/admin-dashboard/total/{id}', 'AdminDashboardController@totalPelamar')->name('total-pelamar');

Route::post('/admin-dashboard/job/copy/{id}', 'JobController@copyLowongan')->name('copy-job');

Route::get('/admin-dashboard/candidate', 'AdminDashboardController@candidate')->name('dashboard-candidate');
Route::get('/admin-dashboard/candidateDataTable', 'AdminDashboardController@candidateDataTable')->name('dashboard-candidate-datatables');
Route::get('/admin-dashboard/candidate/detail/{id}', 'AdminDashboardController@detailCandidate')->name('detail-candidate');
Route::get('/admin-dashboard/data-candidate/{candidate_id}', 'CandidateController@getDataCandidate')->name('data-candidate');

Route::get('/admin-dashboard/keahlian', 'AdminDashboardController@keahlian')->name('dashboard-keahlian');
Route::get('/admin-dashboard/keahlian/create', 'AdminDashboardController@createkeahlian')->name('create-candidate-keahlian-admin');
Route::post('/admin-dashboard/keahlian/create', 'AdminDashboardController@storekeahlian')->name('store-candidate-keahlian-admin');
Route::get('/admin-dashboard/keahlian/edit/{id}', 'AdminDashboardController@editkeahlian')->name('edit-candidate-keahlian-admin');
Route::post('/admin-dashboard/keahlian/edit/{id}', 'AdminDashboardController@updatekeahlian')->name('update-candidate-keahlian-admin');
Route::post('/admin-dashboard/keahlian/delete/{id}', 'AdminDashboardController@deletekeahlian')->name('delete-candidate-keahlian-admin');

Route::get('/admin-dashboard/profile', 'AdminDashboardController@profile')->name('dashboard-profile');
Route::post('/admin-dashboard/profile', 'AdminDashboardController@changeProfile')->name('change-profile');

Route::get('/admin-dashboard/account', 'AdminDashboardController@account')->name('dashboard-account');
Route::get('/admin-dashboard/create-account', 'AdminDashboardController@createAccount')->name('dashboard-create-account');
Route::post('/admin-dashboard/create-account', 'AdminDashboardController@storeAccount')->name('create-account');
Route::get('/admin-dashboard/account/edit/{id}', 'AdminDashboardController@editAccount')->name('dashboard-edit-account');
Route::get('/admin-dashboard/account/detail/{id}', 'AdminDashboardController@detailAccount')->name('detail-account');
Route::post('/admin-dashboard/account/change-password', 'AdminDashboardController@changePassword')->name('change-password');
Route::post('/admin-dashboard/account/delete', 'AdminDashboardController@deleteAccount')->name('delete-account');

// 
// Route::get('/admin-dashboard/pvi/{job_id}/{candidate_id}', 'PviController@getDetailPvi')->name('pvi-candidate');
Route::get('/admin-dashboard/pvi/candidate', 'PviController@getDetailPvi')->name('pvi-candidate');
Route::get('/admin-dashboard/test-result/{job_id}/{candidate_id}', 'PviController@testResult')->name('test-result');
// 

Route::get('/admin-dashboard/test/{job_id}/{candidate_id}', 'TestController@result')->name('test-candidate');
Route::get('/admin-dashboard/interview/{job_id}/{candidate_id}', 'InterviewController@formInterview')->name('interview-candidate');
Route::post('/admin-dashboard/interview/{job_id}/{candidate_id}', 'InterviewController@evaluate')->name('evaluate');
Route::post('/admin-dashboard/interview/invite', 'InterviewController@invite')->name('invite-interview');

Route::get('/admin-dashboard/soal', 'TestController@soal')->name('dashboard-soal');
Route::get('/admin-dashboard/soal/edit/{id}', 'TestController@editSoal')->name('dashboard-edit-soal');
Route::post('/admin-dashboard/soal/edit-soal', 'TestController@changeSoal')->name('change-soal');
Route::get('/admin-dashboard/create-soal', 'TestController@createSoal')->name('dashboard-create-soal');
Route::post('/admin-dashboard/create-soal', 'TestController@storeSoal')->name('create-soal');
Route::post('/admin-dashboard/soal/delete', 'TestController@deleteSoal')->name('delete-soal');

Route::get('/admin-dashboard/pvi', 'PviController@pvi')->name('dashboard-pvi');
Route::get('/admin-dashboard/create-pvi', 'PviController@createPvi')->name('dashboard-create-pvi');
Route::post('/admin-dashboard/create-pvi', 'PviController@storePvi')->name('create-pvi');
Route::get('/admin-dashboard/pvi/edit/{id}', 'PviController@editPvi')->name('dashboard-edit-pvi');
Route::post('/admin-dashboard/pvi/edit-soal', 'PviController@changePvi')->name('change-pvi');
Route::post('/admin-dashboard/pvi/delete', 'PviController@deletePvi')->name('delete-pvi');

Route::get('/admin-dashboard/faq', 'FaqController@faq')->name('dashboard-faq');
Route::get('/admin-dashboard/create-faq', 'FaqController@createFaq')->name('dashboard-create-faq');
Route::post('/admin-dashboard/create-faq', 'FaqController@storeFaq')->name('create-faq');
Route::get('/admin-dashboard/faq/edit/{id}', 'FaqController@editFaq')->name('dashboard-edit-faq');
Route::post('/admin-dashboard/faq/edit-soal', 'FaqController@changeFaq')->name('change-faq');
Route::post('/admin-dashboard/faq/delete', 'FaqController@deleteFaq')->name('delete-faq');

Route::get('/admin-dashboard/age', 'AdminDashboardController@age')->name('age');
Route::get('/admin-dashboard/province', 'AdminDashboardController@province')->name('province');

Route::post('/admin-dashboard/mcu/upload', 'McuController@upload')->name('upload-mcu');
Route::post('/admin-dashboard/mcu/sent-letter', 'McuController@sentLetter')->name('sent-mcu-letter');

Route::get('/admin-dashboard/education', 'AdminDashboardController@education')->name('education');
Route::get('/admin-dashboard/data-candidate-education/{id}', 'AdminDashboardController@getDataCandidateEducation')->name('getDataCandidateEducation');

Route::post('/admin-dashboard/offering/upload', 'OfferingController@upload')->name('upload-offering');
Route::post('/upload-offering-candidate', 'OfferingController@uploadOfferingCandidate')->name('offering-candidate');
Route::get('/online-test', 'TestController@onlineTest')->name('online-test');


Route::get('/profile', 'CandidateController@index')->name('candidate-profile');
Route::get('/beranda', 'CandidateController@beranda')->name('candidate-job');
Route::get('/delete/{job_id}', 'CandidateController@deleteSaved')->name('delete-saved');
Route::get('/profile/summary', 'CandidateController@summary')->name('candidate-summary');
Route::get('/profile/summary-edit', 'CandidateController@summaryEdit')->name('candidate-summary-edit');
Route::post('/profile/summary-edit', 'CandidateController@summaryUpdate')->name('candidate-summary-update');
Route::get('/profile/experience', 'CandidateController@experience')->name('candidate-experience');
Route::get('/profile/experience/create', 'CandidateController@createExperience')->name('create-candidate-experience');
Route::post('/profile/experience/create', 'CandidateController@storeExperience')->name('store-candidate-experience');
Route::get('/profile/experience/edit/{id}', 'CandidateController@editExperience')->name('edit-candidate-experience');
Route::post('/profile/experience/edit', 'CandidateController@updateExperience')->name('update-candidate-experience');
Route::post('/profile/experience/delete/{id}', 'CandidateController@deleteExperience')->name('delete-candidate-experience');

Route::get('/profile/education', 'CandidateController@education')->name('candidate-education');
Route::get('/profile/education/create', 'CandidateController@createEducation')->name('create-candidate-education');
Route::post('/profile/education/create', 'CandidateController@storeEducation')->name('store-candidate-education');
Route::get('/profile/education/edit/{id}', 'CandidateController@editEducation')->name('edit-candidate-education');
Route::post('/profile/education/edit', 'CandidateController@updateEducation')->name('update-candidate-education');
Route::post('/profile/education/delete/{id}', 'CandidateController@deleteEducation')->name('delete-candidate-education');

Route::get('/profile/skill', 'CandidateController@skill')->name('candidate-skill');
Route::get('/profile/skill/create', 'CandidateController@createSkill')->name('create-candidate-skill');
Route::post('/profile/skill/create', 'CandidateController@storeSkill')->name('store-candidate-skill');
Route::get('/profile/skill/edit/{id}', 'CandidateController@editSkill')->name('edit-candidate-skill');
Route::post('/profile/skill/edit', 'CandidateController@updateSkill')->name('update-candidate-skill');
Route::post('/profile/skill/delete/{id}', 'CandidateController@deleteSkill')->name('delete-candidate-skill');

Route::get('/profile/info', 'CandidateController@info')->name('candidate-info');
Route::get('/profile/info/edit', 'CandidateController@editInfo')->name('edit-candidate-info');
Route::post('/profile/info/edit', 'CandidateController@updateInfo')->name('update-candidate-info');

// --- PVI ANSWER --- //
Route::get('/profile/pvi', 'CandidateController@pvi')->name('candidate-pvi');
Route::get('/profile/pvi/add/{id}', 'CandidateController@addPvi')->name('add-pvi');
Route::post('/profile/pvi/add', 'CandidateController@addAnswerPvi')->name('add-candidate-pvi');
Route::get('/profile/pvi/edit/{id}', 'CandidateController@editPvi')->name('edit-candidate-pvi');
Route::post('/profile/pvi/edit', 'CandidateController@updatePvi')->name('update-candidate-pvi');
// ------------------ //

Route::get('/profile/cv', 'CandidateController@cv')->name('candidate-cv');
Route::post('/profile/cv', 'CandidateController@updateCv')->name('update-candidate-cv');
Route::get('/isHasCV', 'CandidateController@isHasCV')->name('isHasCV');

Route::get('/profile/{id}', 'CandidateController@profile')->name('get-candidate-profile');

Route::get('/test/{job_id}/take', 'TestController@take')->name('take-test');
Route::post('/test/{job_id}/answer', 'TestController@answer')->name('submit-test-answer');
Route::get('/mbti', 'TestController@mbti')->name('mbti');
Route::post('/mbti-result', 'TestController@mbtiResult')->name('mbti-result');
Route::get('/disc', 'TestController@disc')->name('disc');
Route::get('/disc-result', 'TestController@discResult')->name('disc-result');
Route::get('/pvi/{job_id}/take', 'PviController@take')->name('take-pvi');
Route::post('/pvi/{job_id}/answer', 'PviController@answer')->name('pvi-answer');

Route::post('/apply', 'JobController@apply')->name('apply');
Route::post('/save-job', 'JobController@saveJob')->name('save-job');
Route::post('/fail', 'JobController@fail')->name('fail');
Route::post('/pass', 'JobController@pass')->name('pass');
Route::post('/failcadidates', 'JobController@failCandidates')->name('fail-candidates');
Route::post('/passcandidates', 'JobController@passCandites')->name('pass-candidates');
Route::post('/roleback', 'JobController@roleBack')->name('roleback');


Route::get('/intel-test/{job_id}/take', 'TestController@take_intel')->name('take-intel-test');
Route::get('/test/intel', 'TestController@get_test_intel')->name('get-intel-test');
Route::get('/test/intel/submit', 'TestController@submit_test_intel')->name('submit-intel-test');

Route::get('/admin-dashboard/soalwb1', 'TestController@soalwb1')->name('dashboard-soalwb1');
Route::get('/admin-dashboard/soalwb1/edit/{id}', 'TestController@editSoalwb1')->name('dashboard-edit-soalwb1');
Route::post('/admin-dashboard/soalwb1/edit-soalwb1', 'TestController@changeSoalwb1')->name('change-soalwb1');
Route::get('/admin-dashboard/create-soalwb1', 'TestController@createSoalwb1')->name('dashboard-create-soalwb1');
Route::post('/admin-dashboard/create-soalwb1', 'TestController@storeSoalwb1')->name('create-soalwb1');
Route::post('/admin-dashboard/soal/deletewb1', 'TestController@deleteSoalwb1')->name('delete-soalwb1');

Route::get('/admin-dashboard/soalwb2', 'TestController@soalwb2')->name('dashboard-soalwb2');
Route::get('/admin-dashboard/soalwb2/edit/{id}', 'TestController@editSoalwb2')->name('dashboard-edit-soalwb2');
Route::post('/admin-dashboard/soalwb2/edit-soalwb2', 'TestController@changeSoalwb2')->name('change-soalwb2');
Route::get('/admin-dashboard/create-soalwb2', 'TestController@createSoalwb2')->name('dashboard-create-soalwb2');
Route::post('/admin-dashboard/create-soalwb2', 'TestController@storeSoalwb2')->name('create-soalwb2');
Route::post('/admin-dashboard/soal/deletewb2', 'TestController@deleteSoalwb2')->name('delete-soalwb2');

Route::get('/admin-dashboard/soalwb3', 'TestController@soalwb3')->name('dashboard-soalwb3');
Route::get('/admin-dashboard/soalwb3/edit/{id}', 'TestController@editSoalwb3')->name('dashboard-edit-soalwb3');
Route::post('/admin-dashboard/soalwb3/edit-soalwb3', 'TestController@changeSoalwb3')->name('change-soalwb3');
Route::get('/admin-dashboard/create-soalwb3', 'TestController@createSoalwb3')->name('dashboard-create-soalwb3');
Route::post('/admin-dashboard/create-soalwb3', 'TestController@storeSoalwb3')->name('create-soalwb3');
Route::post('/admin-dashboard/soal/deletewb3', 'TestController@deleteSoalwb3')->name('delete-soalwb3');


Route::get('/email-test', 'JobController@testemail')->name('email-test');

Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email.', function ($message) {
            $message->from('career@aerowisatafood.com', 'Career PT. Aerofood Indonesia')
                    ->to('ildhan089@gmail.com')
                    ->subject('Test Email')
                    ->cc('birulangitnadimpu@gmail.com');
        });
        return 'Email sent successfully!';
    } catch (\Exception $e) {
        \Log::error('Test email failed: ' . $e->getMessage());
        return 'Failed to send email: ' . $e->getMessage();
    }
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

// Route::get('/email', function () {
//     Mail::to('agoy@gmail.com')->send(new WelcomeMail());
//     return new WelcomeMail();
// });