<?php

use App\Services\TagihanStatusService;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    app(TagihanStatusService::class)->updateSemua();
})->dailyAt('00:05');