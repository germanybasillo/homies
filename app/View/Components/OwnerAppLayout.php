<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class OwnerAppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('rental_owner.layouts.app');
    }
}
