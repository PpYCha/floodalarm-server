<?php

namespace App\Listeners;

use App\Events\NewDataAdded;

class FetchNewData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewDataAdded  $event
     * @return void
     */
    public function handle(NewDataAdded $event)
    {
        //
    }
}