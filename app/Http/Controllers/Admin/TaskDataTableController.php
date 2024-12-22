<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Yajra\DataTables\DataTables;

class TaskDataTableController extends Controller
{
    public function __invoke()
    {
        $tasks = Task::with('users')->select(['id', 'name', 'description', 'status', 'end_date']);

        return DataTables::of($tasks)
            ->editColumn('status', function ($task) {
                return $task->status ? 'Active' : 'Inactive';
            })
            ->editColumn('end_date', function ($task) {
                return $task->end_date->format('Y-m-d H:i:s');
            })
            ->addColumn('assigned_to', function ($task) {
                return $task->users->pluck('name')->implode(', ');
            })
            ->toJson();
    }
}