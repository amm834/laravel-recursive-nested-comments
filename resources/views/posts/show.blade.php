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
                    <div class="bg-gray-50 px-8 py-4 mb-4 mx-4 rounded-lg">
                        <p>{{ $post->user->name }}</p>
                        <p>{{ $post->user->created_at->diffForHumans() }}</p>
                        <h2 class="text-gray-900 text-2xl font-bold hover:underline">
                            <a href="{{ route('posts.show',$post) }}">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="text-gray-600">{{ $post->body }}</p>
                    </div>

                    <div>
                        @foreach ($post->comments as $comment)
                            <livewire:comment :comment="$comment" :post="$post" :key="$comment->id"/>
                        @endforeach
                    </div>
                </div>
            </div>


            <div>
                <form action="{{ route('posts.comments.store',$post) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <x-input-label for="body">Comment</x-input-label>
                        <x-text-input name="body" id="body" class="w-full py-2 px-2"/>
                    </div>
                    <x-primary-button type="submit">Add comment</x-primary-button>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
