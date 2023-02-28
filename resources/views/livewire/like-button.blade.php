<form action="" method="POST">
    @csrf
    <button type="button" wire:click='toggleLikeProject({{$project->id}})'>
        @if (in_array($project->id, $likedProjects))
            <i class="fa-solid fa-heart fa-xl"></i>
        @else
            <i class="fa-regular fa-heart fa-xl"></i>
        @endif
    </button>
</form>
