<x-app-layout>
    <section class="main-projects no-hero relative w-full">
        <h2 class="main-projects-title">Saved Projects</h2>
        <article class="projects-titles-wrapper">
            @if (count($savedprojects) == 0)
                <div class="mx-auto my-auto missing w-1/2 h-full flex flex-col items-center justify-center">
                    <i class="fa-regular fa-bookmark fa-2xl"></i>
                    <p class="my-10">No tienes proyectos guardados</p>
                    <a href="{{route('projects.index')}}" class="upload">Ver proyectos</a>
                </div>
            @endif
            @foreach ($savedprojects as $project)
                <div class="project-item hover">
                    <h4 class="project-title">{{$project->titulo}}</h4>
                    <div class="project-img-wrapper">
                        <img src="{{$url.$project->imagen}}" alt="{{$project->titulo}}">
                    </div>
                    <div class="project-info">
                        <p>{{ $project->description }}</p>
                        <div class="project-buttons d-flex">
                            <a href="{{route('projects.show', ['project'=>$project->id])}}">See more</a>
                            <!-- OPCIÓN NO ASÍNCRONA DE GUARDAR PROYECTOS -->
                            <!-- <form action="{{ route('save-project', $project->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="project_id" value="{{ $project->id }}">
                                <button type="submit">
                                    @if (Auth::user()->savedProjects()->wherePivot('project_id', $project->id)->exists())
                                        <i class="fa-solid fa-bookmark"></i>
                                    @else
                                        <i class="fa-regular fa-bookmark"></i>
                                    @endif
                                </button>
                            </form> -->
                            <!-- OPCIÓN ASÍNCRONA USANDO LIVEWIRE -->
                            @livewire('save-project-button', ['project' => $project])
                        </div>
                    </div>
                </div>
            @endforeach
        </article>
    </section>

    <div class="fading-divider"></div>

    @include('components.sections.footer')
</x-app-layout>
