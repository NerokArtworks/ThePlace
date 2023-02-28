<x-app-layout>
    <section class="hero-section admin-bg overflow-y-auto pb-10 relative">
        {{-- <img src="{{asset('/storage/img/texture.jpg')}}" alt="paper_bg" class="hero-bg absolute top-0 left-0 w-full h-screen"> --}}
        <article class="projects-titles-wrapper">
            <div class="relative overflow-x-auto sm:rounded-lg">
                @livewire('users-table')
            </div>
        </article>
        <article class="projects-titles-wrapper mt-10">
            <div class="relative overflow-x-auto sm:rounded-lg">
                @livewire('projects-table')
            </div>
        </article>
    </section>
</x-app-layout>
