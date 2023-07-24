{{-- Header Component 
    ================================================
    Coded By Swapin vidya 2024
    This includes in 
        1, layouts singlepage blade
        2, guest blade
    Tailwind CSS 
    ================================================ --}}
<div class="flex flex-col items-center py-12">
    <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-3xl" href="/">
        Laravel Developer Test
    </a>
    <p class="text-lg text-gray-600">
        A Blog Management System with Laravel   
    </p>
     <!-- Session Status -->
     <x-auth-session-status class="mb-4" :status="session('status')" />
</div>