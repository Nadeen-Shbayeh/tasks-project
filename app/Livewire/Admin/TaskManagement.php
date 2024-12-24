<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;

class TaskManagement extends Component
{
    public $tasks;
    public $name, $description, $end_date; 
    public $createMode = false;
    public $assigned_users = [];
    public $allUsers = [];

    public function render()
    {
        return view('livewire.admin.task-management'); // Create this blade view
    }

    public function mount()
    {
        // Initialize the tasks when the component is loaded
        $this->tasks = Task::all();
        $this->allUsers = User::all();
    }

    public function toggleCreateForm()
    {
        $this->createMode = !$this->createMode;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'end_date' => 'required|date',
            'assigned_users' => 'required|array', // Make sure at least one user is selected
        ]);
    
        // Create the new task
        $task = Task::create([
            'name' => $this->name,
            'description' => $this->description,
            'end_date' => $this->end_date,
        ]);
    
        // Attach selected users to the task
        $task->users()->attach($this->assigned_users);
    
        // Reset form fields and hide the form
        $this->reset(['name', 'description', 'end_date', 'assigned_users']);
        $this->createMode = false;
    
        // Refresh the task list
        $this->tasks = Task::with('users')->get(); // Assuming tasks will have users
    
        session()->flash('message', 'Task created successfully!');
    }
    
}
