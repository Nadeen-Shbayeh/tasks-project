<?php
namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Task;

class TaskManagement extends Component
{
    public $tasks;

    public function mount()
    {
        // Fetch tasks for the logged-in user
        $this->tasks = auth()->user()->tasks;
    }

    public function render()
    {
        return view('livewire.user.task-management');
    }
}
