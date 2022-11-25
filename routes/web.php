<?php
Route::redirect('/', '/login');
Route::get('/home', function () {
    $routeName = auth()->user() && (auth()->user()->is_student || auth()->user()->is_teacher) ? 'admin.calendar.index' : 'admin.home'; 
    if (session('status')) {
        return redirect()->route($routeName)->with('status', session('status'));
    }

    return redirect()->route($routeName);
});

Auth::routes(['register' => true]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Lessons
    Route::delete('lessons/destroy', 'LessonsController@massDestroy')->name('lessons.massDestroy');
    Route::resource('lessons', 'LessonsController');

    // School Classes
    Route::delete('school-classes/destroy', 'SchoolClassesController@massDestroy')->name('school-classes.massDestroy');
    Route::resource('school-classes', 'SchoolClassesController');

    Route::get('calendar', 'CalendarController@index')->name('calendar.index');
   
     // Venues
     Route::delete('venues/destroy', 'VenuesController@massDestroy')->name('venues.massDestroy');
     Route::resource('venues', 'VenuesController');
 
     // Events
     Route::delete('events/destroy', 'EventsController@massDestroy')->name('events.massDestroy');
     Route::resource('events', 'EventsController');
 
     // Meetings
     Route::delete('meetings/destroy', 'MeetingsController@massDestroy')->name('meetings.massDestroy');
     Route::resource('meetings', 'MeetingsController');
     //Route::get('full-calender', [FullCalenderController::class, 'index']);

    //Route::post('full-calender/action', [FullCalenderController::class, 'action']);
 Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');

 Route::get('full-calendar', 'FullCalendarController@index')->name('full-calendar.index');
 Route::post('full-calendar/action', 'FullCalendarController@action')->name('full-calendar.action');
 Route::get('contact', function () {return view('contact');});
});

