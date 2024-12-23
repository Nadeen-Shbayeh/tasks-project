<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-10">
    @auth
        @if(auth()->user()->is_admin)
            <a href="{{ url('/admin/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Admin Dashboard</a>
        @else
            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>User Dashboard</a>
        @endif
    @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Log in</a>
    @endauth
</div>
