<!-- Modal Background -->
<div id="modal-background" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <!-- Modal Content -->
    <div id="modal-content" class="bg-white p-6 rounded-lg shadow-lg w-[30%] transform scale-90 transition-transform duration-300">
        <h2 class="text-xl font-semibold mb-4">Create Boarding House</h2>
        <!-- Error Messages -->
        <div id="error-messages" class="text-red-500 mb-4" style="display:none;"></div>

        <form id="boarding-house-form" action="{{route('store_boarding_house')}}" method="POST">
            @csrf
            <!-- Form Fields -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Boarding House Name</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter your name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" class="h-40 px-3 text-sm py-1 mt-5 outline-none border-gray-300 w-full resize-none border rounded-lg placeholder:text-sm" placeholder="Description"></textarea>  
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" name="address" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Ozamis Street" >
            </div>
            <div class="mb-4">
                <label for="email" class="block text-md font-bold text-gray-700">Requirements:</label>
                @foreach ($requirements as $requirement)
                    <div class="flex items-center gap-2">
                        <p>{{$requirement->name}}</p>
                        <input type="hidden" name="requirement_ids[]" value="{{$requirement->id}}">
                        <input type="file" name="requirements[]" class="requirement-file-input" required>
                    </div>
                @endforeach
            </div>
            <!-- Modal Actions -->
            <div class="flex justify-end">
                <button type="button" id="close-modal" class="mr-2 px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancel</button>
                <button type="button" id="create_boarding_house" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Submit</button>
            </div>
        </form>
    </div>
</div>


<div id="edit-modal-background" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
    <!-- Modal Content -->
    <div id="edit-modal-content" class="bg-white p-6 rounded-lg shadow-lg w-[30%] transform scale-90 transition-transform duration-300">
        <h2 class="text-xl font-semibold mb-4">Edit Boarding House</h2>
        <!-- Error Messages -->
        <div id="error-messages" class="text-red-500 mb-4" style="display:none;"></div>

        <form id="boarding-house-form" action="{{route('store_boarding_house')}}" method="POST">
            @csrf
            <!-- Form Fields -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Boarding House Name</label>
                <input type="hidden" id="edit_id" name="">
                <input type="text" id="edit_name" name="name" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Enter your name">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="edit_description" name="description" class="h-40 px-3 text-sm py-1 mt-5 outline-none border-gray-300 w-full resize-none border rounded-lg placeholder:text-sm" placeholder="Description"></textarea>  
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="edit_address" name="address" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Ozamis Street" >
            </div>
            
            <!-- Modal Actions -->
            <div class="flex justify-end">
                <button type="button" id="close-edit-modal" class="mr-2 px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Cancel</button>
                <button type="button" id="update_boarding_house" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
</div>


