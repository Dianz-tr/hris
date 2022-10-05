<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    public function create()
    {
        return view('user_mgmt/calendar/create');
    }

    public function store(Request $request)
    {
        $event = new Event();
        $event->title = $request->get('title');
        $event->color = $request->get('color');
        $event->start_date = $request->get('startdate');
        $event->end_date = $request->get('enddate');
        $event->save();
        return redirect('event')->with('success', 'Event has been added');
    }

    public function calender()
    {
        $events = [];
        $data = Event::all();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date . '+1 day'),
                    $value->id,
                    // null,
                    // Add color
                    [
                        'color' => $value->color,
                        // 'textColor' => '#008000',
                    ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('user_mgmt/calendar/index', compact('calendar'));
    }

    public function index()
    {
        $events = Event::all();
        // dd($events);
        return view('user_mgmt.calendar.isi', compact('events'));
    }


    public function destroy($id)

    {

        Event::find($id)->delete();

        return redirect('event/isi')

            ->with('success', 'Post deleted successfully');
    }
}
