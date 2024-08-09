<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.landlord_sidebar')
        <div class="p-4 xl:ml-80">
            <h1 class="text-2xl font-bold mt-12">Requirement Submission</h1>
            <div class="mt-4 bg-white w-full p-[2rem] rounded-sm shadow-2xl transition-all">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Requirement</th>
                            <th>Date Submitted</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $requirement_submission)
                            <tr>
                                <td>{{$requirement_submission->requirement->name}}</td>
                                <td>{{$requirement_submission->readable_date}}</td>
                                <td class="{{$requirement_submission->status === 'approved' ? 'text-green-500' : ($requirement_submission->status === 'rejected' ? 'text-red-500' : 'text-orange-400')}}">{{$requirement_submission->status}}</td>
                                <td>
                                    <button  class="open-edit-modal py-1 px-2 bg-gradient-to-tr from-[#2D2426] to-blue-400 text-white rounded-sm text-sm"
                                        data-requirment="{{$requirement_submission->requirement->name}}"
                                        data-file="{{$requirement_submission->file_path}}">view</button>
                                </td>                            
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('components.modals.view_requirement_submission')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modalBackground = document.getElementById('edit-modal-background');
            const modalContent = document.getElementById('edit-modal-content');
            const openModalButton = document.querySelectorAll('.open-edit-modal'); // Assuming you have a button to open the modal
            const closeModalButton = document.getElementById('close-edit-modal');

            openModalButton.forEach((button) => {
                button.addEventListener('click', () => {
                    modalBackground.classList.remove('opacity-0', 'pointer-events-none');
                    modalBackground.classList.add('opacity-100', 'pointer-events-auto');
                    modalContent.classList.remove('scale-90');
                    modalContent.classList.add('scale-100');

                    let requirement = button.getAttribute('data-requirment');
                    let file = button.getAttribute('data-file');
                    let requirement_submission_id = button.getAttribute('data-id');

                    let filePath = "{{asset('storage')}}/" + file;

                    $('.requirement-name').html(requirement);
                    $('.requirement_image').attr('src', filePath);
                    $('#requirement_submission_id').val(requirement_submission_id);
                });
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
    </script>
</x-layout>
