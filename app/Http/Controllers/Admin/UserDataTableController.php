<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\DataTables;

class UserDataTableController extends Controller
{
    public function __invoke()
    {
        $users = User::where('is_admin', false)->select(['id', 'name', 'email', 'status', 'created_at']);

        return DataTables::of($users)
            ->editColumn('status', function ($user) {
                return $user->status ? 'Active' : 'Inactive';
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('Y-m-d H:i:s');
            })
            ->toJson();
    }
}