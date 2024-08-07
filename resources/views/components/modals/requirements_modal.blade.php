<!-- Modal Background -->
<div id="modal-background" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <!-- Modal Content -->
    <div id="modal-content" class="bg-white p-6 rounded-lg shadow-lg w-[20%] transform scale-90 transition-transform duration-300">
        <h2 class="text-xl font-semibold mb-4">Create Requirements</h2>
        <form>
            <!-- Form Fields -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Requirement Name</label>
                <input type="text" id="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter your name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" class="h-40 px-3 text-sm py-1 mt-5 outline-none border-gray-300 w-full resize-none border rounded-lg placeholder:text-sm" placeholder="Description"></textarea>  
            </div>
            <!-- Modal Actions -->
            <div class="flex justify-end">
                <button type="button" id="close-modal" class="mr-2 px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancel</button>
                <button type="button" id="create_requirement" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</div>
