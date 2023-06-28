@props(['comment'])
<form method="POST" class="comment-card" action="{{ route('comment.delete', ['id' => $comment->id]) }}">
    @csrf
    @method('DELETE') <!-- Add the DELETE method spoofing -->

    <p><strong>{{ $comment->user->name }}</strong></p>
    <p>{{ $comment->content }}</p>
    @if(auth()->id() == $comment->user->id)
        <div class="buttons">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" class="btn btn-info">Edit</a>
        </div>
    @endif
</form>
