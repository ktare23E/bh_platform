export function dataTable(){
    $(document).ready( function () {
        $('#myTable').DataTable();
        $('#myTable2').DataTable();
    } );
}

export function modal(){
    document.addEventListener('DOMContentLoaded', () => {
        const modalBackground = document.getElementById('modal-background');
        const modalContent = document.getElementById('modal-content');
        const openModalButton = document.getElementById('open-modal'); // Assuming you have a button to open the modal
        const closeModalButton = document.getElementById('close-modal');

        openModalButton.addEventListener('click', () => {
            modalBackground.classList.remove('opacity-0', 'pointer-events-none');
            modalBackground.classList.add('opacity-100', 'pointer-events-auto');
            modalContent.classList.remove('scale-90');
            modalContent.classList.add('scale-100');
        });

        closeModalButton.addEventListener('click', () => {
            modalBackground.classList.add('opacity-0', 'pointer-events-none');
            modalBackground.classList.remove('opacity-100', 'pointer-events-auto');
            modalContent.classList.add('scale-90');
            modalContent.classList.remove('scale-100');
        });
    });
}

export function editModal(){
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

                let requirement = button.getAttribute('data-name');
                let description = button.getAttribute('data-description');
                let status = button.getAttribute('data-status');
                let id = button.getAttribute('data-id');

                $('#edit_name').val(requirement);
                $('#edit_description').val(description);
                $('#edit_status').val(status);
                $('#edit_id').val(id);
            })
        });

        closeModalButton.addEventListener('click', () => {
            modalBackground.classList.add('opacity-0', 'pointer-events-none');
            modalBackground.classList.remove('opacity-100', 'pointer-events-auto');
            modalContent.classList.add('scale-90');
            modalContent.classList.remove('scale-100');
        });
    });
}