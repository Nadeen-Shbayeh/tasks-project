<?php


namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUpload;
use Illuminate\Support\Facades\Hash;



class UserManagement extends Component
{
    use WithFileUpload;

    public $name;
    public $email;
    public $password;
    public $profile_image;
    public $status = true;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'profile_image' => 'nullable|image|max:1024',
    ];

    public function render()
    {
        return view('livewire.admin.user-management', [
            'users' => User::where('is_admin', false)->get()
        ]);
    }

    public function createUser()
    {
        $this->validate();

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'status' => $this->status,
        ];

        if ($this->profile_image) {
            $userData['profile_image'] = $this->profile_image->store('profile-images', 'public');
        }

        User::create($userData);

        $this->reset();
        $this->showModal = false;
        session()->flash('message', 'User created successfully.');
    }
}
