<?php

Route::group(['middleware' => 'web', 'prefix' => 'userprofile', 'namespace' => 'Modules\UserProfile\Http\Controllers'], function()
{
    Route::get('/', 'UserProfileController@index');
});
