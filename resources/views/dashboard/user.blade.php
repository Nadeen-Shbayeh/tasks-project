<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold">{{ __("Welcome, ") }} {{ auth()->user()->name }}!</h3>

                    <p class="mt-4">{{ __("You're logged in to your user dashboard.") }}</p>

                    <div class="mt-6 space-y-4">
                   
                   <div class="container mx-auto mt-4">
                       <livewire:user.task-management />
                   </div>
                
             
               </div>

         
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
