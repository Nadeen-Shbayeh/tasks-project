<?php


namespace App\Http\Livewire\Admin;

use App\Models\Task;
use App\Models\User;
use Livewire\Component;


class TaskManagement extends Component
{
    public $name;
    public $description;
    public $end_date;
    public $status = true;
    public $selectedUsers = [];
    public $showModal = false;

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required',
        'end_date' => 'required|date|after:today',
        'selectedUsers' => 'required|array|min:1',
    ];

    public function render()
    {
        return view('livewire.admin.task-management', [
            'tasks' => Task::with('users')->get(),
            'users' => User::where('is_admin', false)->where('status', true)->get(),
        ]);
    }

    public function createTask()
    {
        $this->validate();

        $task = Task::create([
            'name' => $this->name,
            'description' => $this->description,
            'end_date' => $this->end_date,
            'status' => $this->status,
        ]);

        $task->users()->attach($this->selectedUsers);

        $this->reset();
        $this->showModal = false;
        session()->flash('message', 'Task created successfully.');
    }
}
