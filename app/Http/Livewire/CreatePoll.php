<?php

namespace App\Http\Livewire;

use App\Models\Poll;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatePoll extends Component
{
    // #[Rule('required', message: 'Please enter a title.')]
    // #[Rule('min:2', message: 'Your title is too short.')]
    public $title;
    // #[Rule('required', message: 'This option can\'t be empty.')]
    // #[Rule('min:1', message: 'Your title is too short.')]
    public $options = ['option 1'];
    protected $rules = [
        'title' => 'required|min:2|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    protected $messages = [
        'options.*' => 'This option can\'t be empty.'
    ];

    public function render()
    {
        return view('livewire.create-poll');
    }
    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $this->validate([

            'title' => 'required|min:2|max:255',
            'options' => 'required|array|min:1|max:10',
            'options.*' => 'required|min:1|max:255'

        ]);
        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)->map(fn ($option) => ['name' => $option])->all()
        );

        // foreach ($this->options as $optionName) {
        //     $poll->options()->create(['name' => $optionName]);
        // } 

        $this->reset();
    }


    // public function mount()
    // {

    // }
}
