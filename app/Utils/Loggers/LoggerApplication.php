<?php

namespace Utils\Loggers;

use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class LoggerApplication 
{
    public static function register($message) 
    {
        Storage::disk('local')->append('loggers/application.log', '['. Carbon::now('utc')->toDateTimeString() . ']' . $message);
    }

}