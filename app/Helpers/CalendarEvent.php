<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class CalendarEvent
{
    public static function createICS(array $events)
    {
        $ics = "BEGIN:VCALENDAR\r\n";
        $ics .= "VERSION:2.0\r\n";
        $ics .= "PRODID:-//Esprit//NONSGML v1.0//EN\r\n";

        foreach ($events as $event) {
            $startDate = $event['start_date']->format('Ymd\THis\Z');
            $endDate = $event['end_date']->format('Ymd\THis\Z');
            $now = now()->format('Ymd\THis\Z');
            $uid = Str::uuid();

            $ics .= "BEGIN:VEVENT\r\n";
            $ics .= "UID:$uid\r\n";
            $ics .= "DTSTAMP:$now\r\n";
            $ics .= "DTSTART:$startDate\r\n";
            $ics .= "DTEND:$endDate\r\n";
            $ics .= "SUMMARY:{$event['summary']}\r\n";
            $ics .= "DESCRIPTION:{$event['description']}\r\n";
            $ics .= "LOCATION:{$event['location']}\r\n";
            $ics .= "END:VEVENT\r\n";
        }

        $ics .= "END:VCALENDAR\r\n";

        return $ics;
    }
}
