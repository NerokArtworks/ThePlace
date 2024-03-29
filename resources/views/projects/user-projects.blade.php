<x-app-layout>
    <section class="main-projects no-hero w-full">
        @if (session('status'))
            {{session('status')}}
        @endif
        <h2 class="main-projects-title">Your Projects</h2>
        <article class="projects-titles-wrapper">
            @if (count($myprojects) == 0)
                <div class="mx-auto my-auto missing w-1/2 h-full flex flex-col items-center justify-center">
                    <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
                    <p class="my-10">Todavía no has subido ningún proyecto</p>
                    <a href="{{route('projects.create')}}" class="upload">Subir proyecto</a>
                </div>
            @endif
            @foreach ($myprojects as $project)
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
