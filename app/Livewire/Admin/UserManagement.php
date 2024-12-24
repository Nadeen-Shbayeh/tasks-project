<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{

    public $users;
    public $name, $email, $password; // Add properties for form inputs
    public $createMode = false;  // Property to toggle Create User form visibility

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.admin.user-management');
    }

    public function toggleCreateForm()
    {
        $this->createMode = !$this->createMode;  // Toggle the form visibility
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Create a new user
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),  // Hash the password
        ]);

        // Reset form and hide it
        $this->reset(['name', 'email', 'password']);
        $this->createMode = false;

        // Refresh the users list
        $this->users = User::all();
    }
}
