<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.admin_sidebar')
        <div class="p-4 xl:ml-80">
            <h1 class="text-2xl font-bold mt-12">Boarding House List</h1>
            <div class="action_buttons mt-12 w-full flex justify-end">
                <button id="open-modal" class="py-1 px-2 text-md bg-[#E61E50] text-white rounded-sm flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    Boarding House
                </button>
            </div>
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
                        @foreach ($boarding_houses as $boarding_house)
                            <tr>
                                <td>{{$boarding_house->name}}</td>
                                <td>{{$boarding_house->description}}</td>
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
    @include('components.modals.boarding_house_modal')

    <script>
        $('#create_boarding_house').click(() => {
            let name = $('#name').val();
            let description = $('#description').val();
            let address = $('#address').val();

            $.ajax({
                url : "{{ route('store_boarding_house') }}",
                type : "POST",
                data : {
                    name : name,
                    description : description,
                    address : address,
                    _token : "{{ csrf_token() }}"
                },
                success : (response) => {
                    if(response.message === 'success'){
                        Swal.fire({
                            title: "Success!",
                            text: "Sucessfully Created Boarding House",
                            icon: "success",
                            confirmButtonText: 'OK',
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'custom-confirm-button'
                            }
                        }).then(function(){
                            location.reload();
                        });
                    }
                }
            });
        });
    </script>
</x-layout>
