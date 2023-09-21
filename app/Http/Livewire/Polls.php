<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{
    // protected $listeners = [
    //     'pollCreated' => 'render'
    // ];

    #[On('pollCreated')]
    public function render()
    {
        $polls = \App\Models\Poll::latest()->get();

        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {
        $option->Votes()->Create();
    }
}
