<div>
    <h2 class="text-2xl font-bold mb-4">My Tasks</h2>

    <div class="card">
        <div class="card-body">
            <table class="table" id="employee-tasks-table">
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(function() {
    $('#employee-tasks-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("employee.tasks.data") }}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'end_date', name: 'end_date' },
            { data: 'status', name: 'status' },
            { 
                data: 'actions', 
                name: 'actions',
                orderable: false,
                searchable: false
            }
        ]
    });
});
</script>
@endpush