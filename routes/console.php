<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('activitylog:clean')
    ->dailyAt('00:00')
    ->timezone('Asia/Jerusalem');
