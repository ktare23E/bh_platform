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
                                <td>{{$boarding_house->user->first_name.' '.$boarding_house->user->last_name}}</td>
                                <td>{{$boarding_house->name}}</td>
                                <td>{{$boarding_house->address}}</td>
                                <td>{{$boarding_house->status}}</td>
                                <td>
                                    <a href="{{route('boarding_house_requirement_submissions',$boarding_house->id)}}" class="py-1 px-2 bg-black text-white rounded-sm text-sm">view</a>
                                    <button class="open-edit-modal py-1 px-2 bg-gradient-to-tr from-[#2D2426] to-blue-400 text-white rounded-sm text-sm"
                                        data-id="{{$boarding_house->id}}"
                                        data-name="{{$boarding_house->name}}"
                                        data-description="{{$boarding_house->description}}"
                                        data-address="{{$boarding_house->address}}">edit </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('components.modals.boarding_house_modal')

    <script>
        $(document).ready(function() {
            $('#create_boarding_house').click(function(e) {
                // Prevent default form submission
                e.preventDefault();
                
                // Validation logic
                let valid = true;

                $('.requirement-file-input').each(function() {
                    if ($(this).val() === '') {
                        valid = false;
                        alert('Please upload image for the necessary requirements');
                        return false; // Break out of the loop
                    }
                });

                // If validation fails, stop the process
                if (!valid) {
                    return;
                }

                // Proceed with AJAX submission if validation is successful
                let formData = new FormData($('#boarding-house-form')[0]);
                
                $.ajax({
                    url: "{{ route('store_boarding_house') }}",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.message === 'success') {
                            Swal.fire({
                                title: "Success!",
                                text: "Successfully Created Boarding House",
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
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            let errorList = '';

                            $.each(errors, function(key, value) {
                                errorList += '<li>' + value[0] + '</li>';
                            });

                            $('#error-messages').html('<ul>' + errorList + '</ul>').show();
                        }
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const modalBackground = document.getElementById('edit-modal-background');
            const modalContent = document.getElementById('edit-modal-content');
            const openModalButton = document.querySelectorAll('.open-edit-modal'); // Assuming you have a button to open the modal
            const closeModalButton = document.getElementById('close-edit-modal');

            openModalButton.forEach((button)=>{
                button.addEventListener('click', () => {
                    modalBackground.classList.remove('opacity-0', 'pointer-events-none');
                    modalBackground.classList.add('opacity-100', 'pointer-events-auto');
                    modalContent.classList.remove('scale-90');
                    modalContent.classList.add('scale-100');

                    let name = button.getAttribute('data-name');
                    let description = button.getAttribute('data-description');
                    let address = button.getAttribute('data-address');

                    let id = button.getAttribute('data-id');

                    $('#edit_name').val(name);
                    $('#edit_description').val(description);
                    $('#edit_address').val(address);
                    $('#edit_id').val(id);
                })
            });

            closeModalButton.addEventListener('click', () => {
                closeModal();
            });

            modalBackground.addEventListener('click', (event) => {
                if (event.target === modalBackground) {
                    closeModal();
                }
            });

            function closeModal() {
                modalBackground.classList.add('opacity-0', 'pointer-events-none');
                modalBackground.classList.remove('opacity-100', 'pointer-events-auto');
                modalContent.classList.add('scale-90');
                modalContent.classList.remove('scale-100');
            }
        });

        $('#update_boarding_house').click(() => {
            let name = $('#edit_name').val();
            let description= $('#edit_description').val();
            let address = $('#edit_address').val();
            let boarding_house_id = $('#edit_id').val();

            $.ajax({
                url : "{{ route('update_boarding_house') }}",
                type : "POST",
                data : {
                    name : name,
                    description : description,
                    address : address,
                    boarding_house_id : boarding_house_id,
                    _token : "{{ csrf_token() }}"
                },
                success: function(response) {
                        if (response.message === 'success') {
                            Swal.fire({
                                title: "Success!",
                                text: "Successfully Updated Boarding House",
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
                    },
            });
        });
    </script>
</x-layout>
