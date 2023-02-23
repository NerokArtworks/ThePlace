<x-app-layout>
    <section class="hero-section relative">
        <img src="{{asset('/storage/img/vortex2.png')}}" alt="paper_bg" class="hero-bg absolute top-0 left-0 w-full h-screen">
        <article class="project-form project-form-wrapper">
            <div class="sm:rounded-lg w-full sm:max-w-md mt-6 px-6 py-4 bg-transparent form-bg border-white border shadow-md overflow-hidden sm:rounded-lg">
                <div class="mt-3 mb-8">
                    <h1 class="text-2xl font-semibold text-white text-center">Create Project</h1>
                </div>
                <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data">
                    @csrf
                    @if (isset($status))
                        {{$status}}
                    @endif
                    <div class="mb-6">
                        <label for="titulo" class="block mb-2 text-sm font-medium text-white dark:text-white">Project Title</label>
                        <input type="text" id="titulo" name="titulo" class="border border-white text-white text-sm rounded-lg block w-full p-2.5 placeholder-white" placeholder="THE title" required>
                    </div>
                    <div class="mb-6">
                        <label for="descripcion" class="block mb-2 text-sm font-medium text-white dark:text-white">Project Description</label>
                        <textarea id="descripcion" name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-white bg-gray-50 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 placeholder-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder="THE description..."></textarea>
                    </div>

                    <div class="mt-1 mb-6 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="imagen" class="relative cursor-pointer rounded-md font-medium text-white hover:text-white focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span class="border border-white rounded-md p-1">Upload an image</span>
                                    <input id="imagen" name="imagen" type="file" class="sr-only">
                                </label>
                                <p class="pl-1 text-white">&nbsp for your project</p>
                            </div>
                            <p class="text-xs text-white">
                                PNG, JPG, GIF
                            </p>
                        </div>
                    </div>
                    <button type="submit" class="text-white font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create Project</button>
                </form>
            </div>
        </article>
    </section>
</x-app-layout>
