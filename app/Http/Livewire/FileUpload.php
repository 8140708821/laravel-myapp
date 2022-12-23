<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $fileName;

    // Before Update
    public function updatingPhoto()
    {
    }

    // After Update
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        $this->fileName = time() . '.png';
        $this->photo->storeAs('public/photos', $this->fileName);
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
