<?php
/**
 * Created by PhpStorm.
 * User: TTN
 * Date: 2017/07/06
 * Time: 3:43 PM
 */

namespace App\services;


use App\Calendar;
use App\CalendarEventType;

class CalendarService
{
    public function getCalendars()
    {

        return Calendar::with('calendarEventType')->get();
    }

    public function getCalendar($id)
    {
        return Calendar::find($id);
    }

    public function storeCalendar($request)
    {
        $calendarEventTypeObjs                = CalendarEventType::all();
		
		
        foreach($calendarEventTypeObjs as $calendarEventTypeObj)
        {
			$calendar                            = new Calendar();
           // $calendar->name                      = $calendarEventTypeObj->name;
            $calendar->event_type_id             = $calendarEventTypeObj->id;
            $calendar->description               = "This needs to be fixed";
            $calendar->color                     = $calendarEventTypeObj->color;
            $calendar->calendar_group_id         = 1;
            $calendar->save();
        }

        return $calendar;
    }

    public function updateCalendar($form)
    {
        $calendar                         = Calendar::find($form['calendar_id']);
        $calendar->name                   = $form['name'];
        $calendar->description            = $form['description'];
        $calendar->calendar_event_type_id          = $form['event_type_id'];
        $calendar->color                  = $form['color'];
        $calendar->calendar_group_id      = $form['calendar_group_id'];
        $calendar->save();
        return $calendar;
    }

    public function deleteCalendar($id)
    {
        $calendar = User::find($id);
        $calendar->delete();
    }
}