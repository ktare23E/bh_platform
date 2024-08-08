<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.admin_sidebar')
        <div class="p-4 xl:ml-80">
            <h1 class="text-2xl font-bold mt-12">Pending Boarding House List</h1>
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
                        @foreach ($pending_boarding_houses as $boarding_house)
                            <tr>
                                <td>{{$boarding_house->user->first_name.' '.$boarding_house->user->last_name}}</td>
                                <td>{{$boarding_house->name}}</td>
                                <td>{{$boarding_house->address}}</td>
                                <td>{{$boarding_house->status}}</td>
                                <td><a href="{{route('view_boarding_house',$boarding_house->id)}}" class="py-1 px-2 bg-gradient-to-tr from-[#2D2426] to-blue-400 text-white rounded-sm text-sm">view</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h1 class="text-2xl font-bold mt-12">Approved Boarding House List</h1>
            <div class="mt-4 bg-white w-full p-[2rem] rounded-sm shadow-2xl transition-all">
                <table id="myTable2" class="display">
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
                        @foreach ($active_boarding_houses as $boarding_house)
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
