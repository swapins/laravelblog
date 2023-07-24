{{-- Create Blog Component 
    ================================================
    Coded By Swapin vidya 2024
    This extends  
        1, layouts guest blade
        
    Tailwind CSS 
    * Dummuy Pic used as place holder for visual appel.
    * Auth is needed to render this component.
    ================================================ --}}

<x-guest-layout>
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        <h1 class="text-2xl font-bold mb-4">Create Blog Post</h1>
         <!-- Validation Errors -->
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" class="border w-full rounded-lg p-4" action="{{route('writePost')}}">
            @csrf
            <input id="id" name="id" value="{{Auth::id()}}" hidden>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" id="title" name="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                required>
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Content</label>
                <textarea id="Content" required name="Content" rows="6" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>

            <div class="flex w-1/2 flex-col-reverse md:flex-row md:justify-end mt-3">
                <button type="submit" class="flex w-1/2 justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
                <button type="button" class="flex w-1/2 ml-2 justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600" onclick="clearForm()">Clear</button>
            </div>

        </form>
    </section>
</x-guest-layout>