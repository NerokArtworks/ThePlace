<x-app-layout>
    <section class="hero-section relative">
        <img src="{{asset('/storage/img/vortex2.png')}}" alt="paper_bg" class="hero-bg absolute top-0 left-0 w-full h-screen">
        <article class="project-form project-form-wrapper">
            <div class="sm:rounded-lg w-full sm:max-w-md mt-6 px-6 py-4 bg-transparent form-bg border-white border shadow-md overflow-hidden sm:rounded-lg">
                <div class="mt-3 mb-8">
                    <h1 class="text-2xl font-semibold text-white text-center">Create Project</h1>
                </div>
                <!-- <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data"> -->
                    <!-- @csrf -->
                    @livewire('create-project')
                <!-- </form> -->
            </div>
        </article>
    </section>
</x-app-layout>
