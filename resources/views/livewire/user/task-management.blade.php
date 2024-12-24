<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-6">My Tasks</h1>
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-gray-600">Task Name</th>
                <th class="px-4 py-2 text-left text-gray-600">Description</th>
                <th class="px-4 py-2 text-left text-gray-600">End Date</th>
                <th class="px-4 py-2 text-left text-gray-600">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td class="px-4 py-2">{{ $task->name }}</td>
                    <td class="px-4 py-2">{{ $task->description }}</td>
                    <td class="px-4 py-2">{{ $task->end_date }}</td>
                    <td class="px-4 py-2">
                        @if($task->status === 1)
                            Open
                        @else
                            Closed
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 text-center">No tasks assigned yet!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
