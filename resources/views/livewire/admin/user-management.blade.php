<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- User List Section -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h2 class="text-2xl font-semibold text-gray-700">{{ __('User Management') }}</h2>

                <!-- Button to toggle create form -->
                <div class="mt-4">
                    <button wire:click="toggleCreateForm" class="px-4 py-2 bg-blue-600 text-black rounded">
                        {{ $createMode ? 'Cancel' : 'Create New User' }}
                    </button>
                </div>

                <!-- Create User Form -->
                @if($createMode)
                    <div class="mt-6">
                        <form wire:submit.prevent="store">
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                                    <input type="text" wire:model="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                                    <input type="email" wire:model="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                                    <input type="password" wire:model="password" id="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                                        {{ __('Create User') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

                <!-- Table displaying users -->
                <div class="mt-6">
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('Name') }}</th>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('Email') }}</th>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Add action buttons for edit or delete if needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
