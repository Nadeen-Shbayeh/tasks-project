<?php


namespace App\Http\Livewire\Employee;

use Livewire\Component;

class TaskList extends Component
{
    public function render()
    {
        return view('livewire.employee.task-list', [
            'tasks' => auth()->user()->tasks
        ]);
    }

    public function closeTask($taskId)
    {
        auth()->user()->tasks()->updateExistingPivot($taskId, [
            'status' => 'Closed'
        ]);

        session()->flash('message', 'Task status updated successfully.');
    }
}
