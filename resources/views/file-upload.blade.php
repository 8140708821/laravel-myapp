<div>
    <form wire:submit.prevent="save">
        <input type="file" wire:model="photo">

        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror

        @if (!empty($fileName))
            <img src="{{ url('/storage/photos/' . $fileName) }}" />
        @endif
    </form>
</div>
