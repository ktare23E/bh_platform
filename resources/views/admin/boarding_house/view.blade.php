<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.admin_sidebar')
        <div class="p-4 xl:ml-80">
            <div id="about" class="relative bg-white overflow-hidden mt-16">
                <div class="max-w-7xl mx-auto">
                    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                        <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2"
                            fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                            <polygon points="50,0 100,0 50,100 0,100"></polygon>
                        </svg>
            
                        <div class="pt-1"></div>
                        <a href="{{route('boarding_house')}}"
                            class="inline-flex items-center border border-indigo-300 px-3 py-1.5 rounded-md text-indigo-500 hover:bg-indigo-50">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                                </path>
                            </svg>
                            <span class="ml-1 font-bold text-lg">Back</span>
                        </a>
                        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                            <div class="sm:text-center lg:text-left">
                                <h2 class="my-6 text-2xl tracking-tight font-extrabold text-gray-900 sm:text-3xl md:text-4xl">
                                    About Us
                                </h2>
            
                                <div class="w-full mx-auto grid grid-cols-3 gap-x-4 gap-y-4">
                                    <div class="flex flex-col items-center">
                                        <p class="font-semibold text-center">Boarding House Owner:</p>
                                        <p class="text-center">{{ $boarding_house->user->first_name.' '.$boarding_house->user->last_name }}</p>
                                    </div>
                                    <!-- Name -->
                                    <div class="flex flex-col items-center">
                                        <p class="font-semibold text-center">Boarding House Name:</p>
                                        <p class="text-center">{{ $boarding_house->name }}</p>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <p class="font-semibold text-center">Address:</p>
                                        <p class="text-center">{{ $boarding_house->address }}</p>
                                    </div>
                                    <!-- Address -->
                                    <div class="flex flex-col items-center">
                                        <p class="font-semibold text-center">Status:</p>
                                        <p class="text-center capitalize {{$boarding_house->status === 'active' ? 'text-green-500':'text-orange-500'}}">{{ $boarding_house->status }}</p>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <img class="h-56 w-full object-cover object-top sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://cdn.pixabay.com/photo/2016/03/23/04/01/woman-1274056_960_720.jpg" alt="">
                </div>
            </div>
            <h1 class="text-2xl font-bold mt-12">Requirement Submission</h1>
            <div class="mt-4 bg-white w-full p-[2rem] rounded-sm shadow-2xl transition-all">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Owner</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requirement_submissions as $requirement_submission)
                            <tr>
                                <td>{{$boarding_house->user->first_name.' '.$boarding_house->user->last_name}}</td>
                                <td>{{$boarding_house->name}}</td>
                                <td>{{$boarding_house->address}}</td>
                                <td>{{$boarding_house->status}}</td>
                                <td><a href="" class="py-1 px-2 bg-gradient-to-tr from-[#2D2426] to-blue-400 text-white rounded-sm text-sm">view</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
