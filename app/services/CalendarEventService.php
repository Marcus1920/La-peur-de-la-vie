<?php
/**
 * Created by PhpStorm.
 * User: Nqobile
 * Date: 2017/06/30
 * Time: 10:24 AM
 */

namespace App\services;
use App\CalendarEvent;


class CalendarEventService
{
    protected $event;
    protected $id;

    public function __construct(CalendarEvent $event){
        $this->event = $event;
    }

    public function getId(){
        return $this->id;
    }

    public function getAll(){
        return $this->event::all();
    }

    public function getEvent($id){
        return $this->event::find($id);
    }

    public function store(Array $data){
        $this->event->event_type_id = $data['event_type_id'];
        $this->event->event_id      = $data['event_id'];
        $this->event->title         = $data['title'];
        $this->event->description   = $data['description'];
        $this->event->start         = $data['start'];
        $this->event->end           = $data['end'];
        $this->event->note          = $data['note'];
        $this->event->venue         = $data['venue'];
        $this->event->color         = $data['color'];
        $this->event->save();

        $this->id    = $this->event->id;
    }
}