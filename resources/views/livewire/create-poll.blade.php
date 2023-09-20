<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll Title </label>

        <input type="text" wire:model.live="title" placeholder="{{ $title }}" />

        <div class="mb-4">
            <button class="btn mt-4" wire:click.prevent="addOption">Add Option</button>
        </div>
        <div class="">
            @foreach ($options as $index => $option)
                <div class="mt-4">
                    <label>Option {{$index + 1}}</label>
                    <div class="flex gap-2">
                        <input type="text" wire:model.live="options.{{$index}}" />
                        <button class="btn" wire:click.prevent="removeOption({{$index}})">Remove</button>
                    </div>
                </div>

                
            @endforeach
        </div>
        <button type="submit" class="btn mt-4">Create Poll</button>
    </form>
</div>
