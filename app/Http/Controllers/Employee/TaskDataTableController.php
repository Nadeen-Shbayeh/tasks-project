<?php
namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class TaskDataTableController extends Controller
{
    public function __invoke()
    {
        $tasks = auth()->user()->tasks()
            ->select(['tasks.id', 'tasks.name', 'tasks.description', 'tasks.end_date', 'task_user.status']);

        return DataTables::of($tasks)
            ->editColumn('end_date', function ($task) {
                return $task->end_date->format('Y-m-d H:i:s');
            })
            ->addColumn('actions', function ($task) {
                if ($task->status === 'Open') {
                    return '<button wire:click="closeTask('.$task->id.')" class="btn btn-sm btn-success">Close Task</button>';
                }
                return '<span class="badge badge-success">Closed</span>';
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}