<div id="edit-modal-background"
    class="fixed inset-0 z-50 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <!-- Modal Content -->
    <div id="edit-modal-content"
        class="bg-white p-6 rounded-lg shadow-lg w-[50%] transform scale-90 transition-transform duration-300">
        <h2 class="requirement-name text-xl font-semibold mb-4"></h2>
        <div class="flex justify-center items-center mb-4">
            <input type="hidden" id="requirement_submission_id" value="">
            <img src="" class="requirement_image max-w-full max-h-full object-cover rounded-md shadow-md" alt="">
        </div>
        <!-- Modal Actions -->
        <div class="flex justify-center mt-4 gap-1">
            <button type="button" id="close-edit-modal"
                class="mr-2 px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancel</button>
            <button type="button" id="approve"
                class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-700">Approve</button>
            <button type="button" id="reject"
                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-700">Reject</button>
        </div>
    </div>
</div>
