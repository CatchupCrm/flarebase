<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::auth();
Route::get('/logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['setTheme:bootstrap']], function () {
    // http://laravel.io/forum/02-17-2015-laravel-5-routes-restricting-based-on-user-type

    Route::get('/', array('uses'=>'Modules\Core\HomeController@getIndex'));
    //Route::get('/', 'UNStarter\StarterController@landing');
    //Route::get('landing', 'UNStarter\StarterController@landing');

    /*Route::get('frontend', function () {
        return view('unstarter.frontend.components_common');
    });*/
});


Route::group(['middleware' => ['auth'], 'prefix'=>'admincp'], function () {
    /**
     * MAIN
     */
    Route::get('/', 'PagesController@dashboard');
    Route::get('dashboard', 'PagesController@dashboard')->name('dashboard');
    /**
     * USERS
     */
    Route::get('users/data', 'UsersController@anyData')->name('users.data');
    Route::get('users/taskdata/{id}', 'UsersController@taskData')->name('users.taskdata');
    Route::get('users/closedtaskdata/{id}', 'UsersController@closedTaskData')->name('users.closedtaskdata');
    Route::get('users/clientdata/{id}', 'UsersController@clientData')->name('users.clientdata');
    Route::resource('users', 'UsersController');
    /* ROLES */
    Route::resource('roles', 'RolesController');
    /**
     * CLIENTS
     */
    Route::get('clients/data', 'ClientsController@anyData')->name('clients.data');
    Route::post('clients/create/cvrapi', 'ClientsController@cvrapiStart');
    Route::post('clients/upload/{id}', 'DocumentsController@upload');
    Route::resource('clients', 'ClientsController');
    /**
     * TASKS
     */
    Route::get('tasks/data', 'TasksController@anyData')->name('tasks.data');
    Route::patch('tasks/updatestatus/{id}', 'TasksController@updateStatus');
    Route::patch('tasks/updateassign/{id}', 'TasksController@updateAssign');
    Route::post('tasks/updatetime/{id}', 'TasksController@updateTime');
    Route::post('tasks/invoice/{id}', 'TasksController@invoice');
    Route::resource('tasks', 'TasksController');
    Route::post('tasks/comments/{id}', 'CommentController@store');
    /**
     * LEADS
     */
    Route::get('leads/data', 'LeadsController@anyData')->name('leads.data');
    Route::patch('leads/updateassign/{id}', 'LeadsController@updateAssign');
    Route::resource('leads', 'LeadsController');
    Route::post('leads/notes/{id}', 'NotesController@store');
    Route::patch('leads/updatestatus/{id}', 'LeadsController@updateStatus');
    Route::patch('leads/updatefollowup/{id}', 'LeadsController@updateFollowup')->name('leads.followup');
    /**
     * SETTINGS
     */
    Route::get('settings', 'SettingsController@index')->name('settings.index');
    Route::patch('settings/permissionsUpdate', 'SettingsController@permissionsUpdate');
    Route::patch('settings/overall', 'SettingsController@updateOverall');
    /**
     * DEPARTMENTS
     */
    Route::resource('departments', 'DepartmentsController');


    /**
     * INTEGRATIONS
     */
    Route::resource('integrations', 'IntegrationsController');

    /* SLACK */
    Route::get('Integration/slack', 'IntegrationsController@slack');
    /**
     * NOTIFICATIONS
     */
    Route::get('notifications/getall', 'NotificationsController@getAll')->name('notifications.get');
    Route::post('notifications/markread', 'NotificationsController@markRead');
    Route::get('notifications/markall', 'NotificationsController@markAll');
    Route::get('notification/{id}', 'NotificationsController@markRead');
    /**
     * INVOICES
     */
    Route::resource('invoices', 'InvoicesController');
    Route::post('invoice/updatepayment/{id}', 'InvoicesController@updatePayment')->name('invoice.payment.date');
    Route::post('invoice/reopenpayment/{id}', 'InvoicesController@reopenPayment')->name('invoice.payment.reopen');
    Route::post('invoice/sentinvoice/{id}', 'InvoicesController@updateSentStatus')->name('invoice.sent');
    Route::post('invoice/reopensentinvoice/{id}', 'InvoicesController@updateSentReopen')->name('invoice.sent.reopen');
    Route::post('invoice/newitem/{id}', 'InvoicesController@newItem')->name('invoice.new.item');
    /**
     * IMPORT AND EXPORT
     */
    Route::get('documents/import', 'DocumentsController@import');

});



Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout');

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('/register', 'Auth\RegisterController@register');

    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
});




Route::group(['prefix' => 'staff'], function () {
    Route::get('/login', 'StaffAuth\LoginController@showLoginForm');
    Route::post('/login', 'StaffAuth\LoginController@login');
    Route::post('/logout', 'StaffAuth\LoginController@logout');

    Route::get('/register', 'StaffAuth\RegisterController@showRegistrationForm');
    Route::post('/register', 'StaffAuth\RegisterController@register');

    Route::post('/password/email', 'StaffAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('/password/reset', 'StaffAuth\ResetPasswordController@reset');
    Route::get('/password/reset', 'StaffAuth\ForgotPasswordController@showLinkRequestForm');
    Route::get('/password/reset/{token}', 'StaffAuth\ResetPasswordController@showResetForm');
});


