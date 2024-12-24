<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <!-- Task List Section -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <h2 class="text-2xl font-semibold text-gray-700">{{ __('Task Management') }}</h2>

                <!-- Button to toggle create form -->
                <div class="mt-4">
                    <button wire:click="toggleCreateForm" class="px-4 py-2 bg-blue-600 text-black rounded">
                        {{ $createMode ? 'Cancel' : 'Create New Task' }}
                    </button>
                </div>

                <!-- Create Task Form -->
                @if($createMode)
                    <div class="mt-6">
                        <form wire:submit.prevent="store">
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('name') }}</label>
                                    <input type="text" wire:model="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                                    <textarea wire:model="description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="end_date" class="block text-sm font-medium text-gray-700">{{ __('Due Date') }}</label>
                                    <input type="date" wire:model="end_date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                                    @error('end_date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">
                                        {{ __('Create Task') }}
                                    </button>
                                </div>
                                <div class="mt-4">
                                    <label for="users" class="block text-sm font-medium text-gray-700">{{ __('Assign Users') }}</label>
                                    <select wire:model="assigned_users" id="users" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" multiple>
                                        @foreach($allUsers as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('assigned_users') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                @endif

                <!-- Table displaying tasks -->
                <div class="mt-6">
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('name') }}</th>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('Description') }}</th>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('Due Date') }}</th>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('Status') }}</th>
                                <th class="px-4 py-2 text-left text-gray-600">{{ __('assigned users') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="px-4 py-2">{{ $task->name }}</td>
                                    <td class="px-4 py-2">{{ $task->description }}</td>
                                    <td class="px-4 py-2">{{ $task->end_date }}</td>
                                    <td class="px-4 py-2">    {{ $task->status == 1 ? 'Open' : 'Closed' }}</td>
                                    <td class="px-4 py-2">
                                        @foreach($task->users as $user)
                                            <span class="text-sm text-gray-600">{{ $user->name }}</span><br>
                                        @endforeach
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
