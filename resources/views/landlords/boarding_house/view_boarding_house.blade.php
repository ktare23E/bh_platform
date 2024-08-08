<x-layout>
    <!-- component -->
    <div class="min-h-screen">
        @include('components.landlord_sidebar')
        <div class="p-4 xl:ml-80">
            <h1 class="text-2xl font-bold mt-12">Requirement Submission</h1>
            <div class="action_buttons mt-12 w-full flex justify-end">
                <button id="open-modal" class="py-1 px-2 text-md bg-[#E61E50] text-white rounded-sm flex gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                    Submit Requirement
                </button>
            </div>
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

    <script>
        
    </script>
</x-layout>
