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