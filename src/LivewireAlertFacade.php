<?php

namespace MN\LivewireAlert;

use Illuminate\Support\Facades\Facade;

class LivewireAlertFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'livewire-alert';
    }
}
