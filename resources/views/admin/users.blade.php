<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.admin_sidebar')
        <div class="p-4 xl:ml-80">
            <h1 class="text-2xl font-bold">User List</h1>
            
            <div class="mt-24 bg-white w-full p-[2rem] rounded-sm shadow-2xl transition-all">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Column 1</th>
                            <th>Column 2</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Row 1 Data 1</td>
                            <td>Row 1 Data 2</td>
                            <td><a href="" class="py-1 px-2 bg-gradient-to-tr from-[#2D2426] to-blue-400 text-white rounded-sm text-sm">view</a></td>

                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</x-layout>
