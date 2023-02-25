<x-app-layout>
    <div class="fading-divider"></div>

    <section class="main-projects w-full">
        <h2 class="main-projects-title">See Project · {{ $project->titulo }}</h2>
        <article class="projects-titles-wrapper">
            <div class="project-item  h-auto">
                <h4 class="project-title">{{$project->titulo}}</h4>
                <div class="project-img-wrapper">
                    <img src="{{asset($url.$project->imagen)}}" alt="{{$project->titulo}}">
                </div>
                <div class="project-info">
                    <p>{{ $project->description }}</p>
                    <div class="project-buttons d-flex">
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
                    @if (session('status'))
                        {{session('status')}}
                    @endif
                    @if (Auth::user()->id == $project->user_id)
                        @livewire('project-form', ['project_id' => $project->id])
                    @endif
                </div>
            </div>
        </article>
    </section>
</x-app-layout>
