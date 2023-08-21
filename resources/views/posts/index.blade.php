<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="my-8">
                    @foreach($posts as $post)
                        <div class="bg-gray-50 px-8 py-4 mb-4 mx-4 rounded-lg">
                            <h2 class="text-gray-900 text-2xl font-bold hover:underline">
                                <a href="{{ route('posts.show',$post) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p class="text-gray-600">{{ $post->body }}</p>
                        </div>
                    @endforeach
                    <div>
                        {{ $posts->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
