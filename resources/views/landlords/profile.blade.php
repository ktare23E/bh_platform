<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.admin_sidebar')
        <div class="p-4 xl:ml-80">
            <h1 class="text-2xl font-bold mt-12">Profile Information</h1>
            
            <div class="mt-24 bg-white w-full p-[2rem] rounded-sm shadow-2xl transition-all">
                <div class="w-[70%] mx-auto grid grid-cols-3 gap-x-4 gap-y-4">
                    <!-- Name -->
                    <div class="flex flex-col items-center">
                        <p class="font-semibold text-center">Name:</p>
                        <p class="text-center">{{ $user->first_name.' '.$user->last_name }}</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <p class="font-semibold text-center">Email:</p>
                        <p class="text-center">{{ $user->email }}</p>
                    </div>
                    <!-- Address -->
                    <div class="flex flex-col items-center">
                        <p class="font-semibold text-center">Address:</p>
                        <p class="text-center">{{ $user->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>
