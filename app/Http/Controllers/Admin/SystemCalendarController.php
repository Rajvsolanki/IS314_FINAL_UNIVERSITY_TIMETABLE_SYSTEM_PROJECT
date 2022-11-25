<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Venue;
use App\Lesson;
use Carbon\Carbon;
use App\Services\CalendarService;
class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\\App\\Event',
            'date_field' => 'start_time',
            'field'      => 'name',
            'prefix'     => 'Event',
            'suffix'     => '',
            'route'      => 'admin.events.edit',
        ],
        [
            'model'      => '\\App\\Meeting',
            'date_field' => 'start_time',
            'field'      => 'attendees',
            'prefix'     => 'Meeting with',
            'suffix'     => '',
            'route'      => 'admin.meetings.edit',
        ],
        [
            'model'      => '\\App\\Lesson',
            'date_field' => 'start_time',
            'field'      => 'name',
            'prefix'     => 'Lesson',
            'suffix'     => '',
            'route'      => 'admin.lessons.edit',
        ],
    ];

    public function index(CalendarService $calendarService)
    {
        
        $events = [];
        $lesson = [];
        $venues = Venue::all();

        foreach ($this->sources as $source) {
            $calendarEvents = $source['model']::when(request('venue_id') && $source['model'] == '\App\Event', function($query) {
                return $query->where('venue_id', request('venue_id'));
            })->get();
            foreach ($calendarEvents as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }
        $weekDays     = Lesson::WEEK_DAYS;
        $calendarData = $calendarService->generateCalendarData($weekDays);

        return view('admin.calendar.calendar', compact('events', 'venues','weekDays','calendarData'));
    }
}
