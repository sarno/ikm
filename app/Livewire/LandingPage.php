<?php

namespace App\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    public $lang = 'id';

    public function render()
    {
        return view('livewire.landing-page')->layout('layouts.guest');
    }
}
