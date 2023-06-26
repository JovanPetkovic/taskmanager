@props(['comment'])
<form method="POST" class="comment-card" action="/comment">
    @csrf
    <p><strong>{{ $comment->user->name }}</strong></p>
    <p>{{ $comment->content }}</p>
    <div class="buttons">
        <button type="submit" class="btn-delete">Delete</button>
        <a href="/comment" class="btn-edit">Edit</a>
    </div>
</form>
