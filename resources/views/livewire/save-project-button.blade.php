<button wire:click="toggleSaveProject({{ $project->id }})">
    @if (in_array($project->id, $savedProjects))
        <i class="fa-solid fa-bookmark fa-xl"></i>
    @else
        <i class="fa-regular fa-bookmark fa-xl"></i>
    @endif
</button>
