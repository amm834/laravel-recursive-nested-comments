<div>
    <div class="bg-gray-50 px-8 py-4 mb-4 mx-4 rounded-lg">
        <div>{{ $comment->user->name }}</div>
        <p class="text-gray-600">{{ $comment->body }}</p>

        <div class="ml-8">
            @if($comment->replies->count())
                @foreach($comment->replies as $reply)
                    <livewire:comment :comment="$reply" :post="$post" :key="$reply->id"/>

                @endforeach

            @endif
            @if($comment->user_id !== auth()->id())
                <form action="{{ route('posts.comments.store',$post) }}" method="post">
                    @csrf
                    <div>
                        <x-input-label for="body" class="mt-8 mb-3">Reply To:{{ $comment->user->name }}</x-input-label>
                        <x-text-input name="body" id="body" class="w-full py-2 px-2"/>
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                    </div>
                    <x-primary-button type="submit">Reply</x-primary-button>
                </form>
            @endif
        </div>
    </div>
</div>
