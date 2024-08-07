<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.admin_sidebar')
        <div class="p-4 xl:ml-80">
            <h1 class="text-2xl font-bold mt-12">Lanlords/Boarding House Owner List</h1>
            
            <div class="mt-24 bg-white w-full p-[2rem] rounded-sm shadow-2xl transition-all">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($landlords as $landlord)
                            <tr>
                                <td>{{$landlord->first_name}}</td>
                                <td>{{$landlord->last_name}}</td>
                                <td>{{$landlord->email}}</td>
                                <td>{{$landlord->address}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</x-layout>
