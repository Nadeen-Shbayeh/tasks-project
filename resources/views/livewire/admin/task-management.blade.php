<div>
    <div class="mb-4 flex justify-between">
        <h2 class="text-2xl font-bold">Task Management</h2>
        <button wire:click="$set('showModal', true)" class="btn btn-primary">Add Task</button>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table" id="tasks-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Modal --}}
    @if($showModal)
    <div class="modal show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Task</h5>
                    <button wire:click="$set('showModal', false)" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="createTask">
                        <div class="form-group">
                            <label>Task Name</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" wire:model="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>End Date</label>
                            <input type="datetime-local" class="form-control" wire:model="end_date">
                            @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Assign To</label>
                            <select class="form-control" wire:model="selectedUsers" multiple>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('selectedUsers') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" wire:model="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@push('scripts')
<script>
$(function() {
    $('#tasks-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("admin.tasks.data") }}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'end_date', name: 'end_date' },
            { data: 'status', name: 'status' },
            { data: 'assigned_to', name: 'assigned_to' }
        ]
    });
});
</script>
@endpush
