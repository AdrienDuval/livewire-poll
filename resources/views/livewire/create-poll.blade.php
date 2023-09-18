<div>
    <form >
        <label>Poll Title </label>

        <input type="text" wire:model="title" placeholder="{{$title}}" />
        
        Current Title : {{ $title }}
@dd($title);
    </form>
</div>
