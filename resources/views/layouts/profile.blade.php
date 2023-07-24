{{-- Profile Component 
    ================================================
    Coded By Swapin vidya 2024
    This includes in 
        1, guest blade

      * Used Placeholder image and text for demonstartion 
        which are hardcoded
    Tailwind CSS 
    ================================================ --}}

<div class="bg-gray-200 font-sans w-full flex flex-row justify-center items-center">
    <div class="card w-96 mx-auto bg-white  shadow-xl hover:shadow">
       <img class="w-32 mx-auto rounded-full -mt-20 border-8 border-white" src="https://avatars.githubusercontent.com/u/67946056?v=4" alt="">
       <div class="text-center mt-2 text-3xl font-medium">{{Auth::user()->name}}</div>
       <div class="text-center mt-2 font-light text-sm">@handle</div>
       <div class="text-center font-normal text-lg">Location</div>
       <div class="px-6 text-center mt-2 font-light text-sm">
         <p>
           Some place holder text to stimulte biography which need anthor CURD which is out of scope of this project.
         </p>
       </div>
       <hr class="mt-8">
       <div class="flex p-4">
         <div class="w-1/2 text-center">
            {{ \Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }}
         </div>
         <div class="w-0 border border-gray-300">

         </div>
         <div class="w-1/2 text-center">
           <span class="font-bold">{{Auth::user()->posts->count()}}</span> Posts
         </div>
       </div>
    </div>
</div>