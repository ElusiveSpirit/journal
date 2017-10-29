<?php



Route::get('/', 'JournalController')->name('journal');


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('login');


Route::group(['middleware' => ['role:admin']], function () {
    // Доступ к редактированию пользователей только у администратора

    Route::resource('users', 'UserController');
    Route::resource('arms', 'armsController');
});

Route::group(['middleware' => 'role:manager|admin'], function () {
    // Доступ к Нарядам и Сменам у менеджеров и админов

    Route::resource('duties', 'dutiesController');
    Route::resource('duties.orders', 'ordersController');
});
