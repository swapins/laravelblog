{{-- Editor Component 
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
        @foreach ($posts as $post)
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="/post/{{$post->id}}" class="hover:opacity-75">
                <img src="https://source.unsplash.com/collection/1346951/1000x500?sig=1">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">Technology</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$post->title}}</a>
                @auth
                    @if($post->user->id == Auth::id())
                    <div class="flex items-center">
                        <!-- Edit button -->
                        <a href="/postEdit/{{$post->id}}" class="flex items-center text-blue-500 hover:text-blue-700">
                          <i class="fas fa-edit mr-2"></i> <!-- Font Awesome icon with margin-right -->
                          Edit
                        </a>
                        
                        <!-- Delete button -->
                        <form action="/delPost/{{$post->id}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="flex items-center text-red-500 hover:text-red-700 ml-4">
                            <i class="fas fa-trash-alt mr-2"></i> <!-- Font Awesome icon with margin-right -->
                            Delete
                        </button>
                        </form>
                    </div>
                    @endif
                @endauth
                <p class="text-sm pb-3">
                    By <a href="/posts/{{$post->user->id}}" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on {{$post->created_at->format('jS \of F, Y')}}
                </p>
                <a href="#" class="pb-6">{{$post->Content}}</a>
                <a href="/post/{{$post->id}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
            </div>
        </article> 
        @endforeach
       

       

        

        <!-- Pagination -->
        <!-- Display pagination links -->
        
        <div class="flex items-center py-8">
            {{ $posts->links() }}
        </div>

    </section>
</x-guest-layout>