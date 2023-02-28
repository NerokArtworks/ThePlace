<div>
    @if (!$mostrar)
        <button type="button"
            wire:click='toggleForm()'
            class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
            Editar Proyecto
        </button>
    @endif
    @if ($mostrar)
    <div class="relative project-edit-form p-5">
        <div class="relative z-0 w-full mb-6 group">
            <input type="text" name="titulo" id="titulo" wire:model='titulo'
                class="block py-2.5 px-0 w-full text-sm text-gray-100 bg-transparent border-0 border-b-2 border-white appearance-none dark:text-white focus:outline-none"
                placeholder=" " required />
            <label for="titulo"
                class="peer-focus:font-medium absolute text-sm text-gray-900 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-gray-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
            @error('titulo')
                {{$message}}
            @enderror
            </div>
        <div class="relative z-0 w-full mb-6 group">
            <textarea wire:model='descripcion' name="descripcion" rows="4" class="block p-2.5 w-full text-sm text-white bg-gray-900 rounded-lg border border-gray-300 focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 placeholder-white dark:focus:ring-gray-500 dark:focus:border-gray-500" placeholder=" "></textarea>
            <label for="descripcion"
                class="peer-focus:font-medium absolute text-sm text-gray-100 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marca</label>
            @error('descripcion')
                {{$message}}
            @enderror
        </div>

        <div class="relative overflow-hidden mt-1 mb-6 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
            <div class="space-y-1 text-center">
                <svg class="mx-auto h-12 w-12 text-white" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                    <label for="imagen" class="relative cursor-pointer rounded-md font-medium text-white hover:text-white focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                        <span class="border border-white rounded-md p-1">Upload an image</span>
                        <input id="imagen" wire:model='nuevaImagen' name="imagen" type="file" class="sr-only">
                    </label>
                    <p class="pl-1 text-white">&nbsp for your project</p>
                </div>
                <p class="text-xs text-white">
                    PNG, JPG, GIF
                </p>
                @error('imagen')
                    {{$message}}
                @enderror
            </div>
            @if ($imagen != null)
            <img src="{{asset($url.$imagen)}}" width="100%" height="auto" class="uploaded-img pointer-events-none" style="mix-blend-mode: color-burn;">
            @endif
            @if ($nuevaImagen)
            <img src="{{$nuevaImagen->temporaryUrl()}}" width="100%" height="auto" class="uploaded-img pointer-events-none" style="mix-blend-mode: multiply;">
            @endif
        </div>

        <div class="flex justify-between">
            <button type="button" wire:click='update()' class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-red-900">Modificar</button>
            <button type="button" wire:click='toggleForm()' class="focus:outline-none text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-red-900">Cancelar</button>
        </div>
        @endif
    </div>
</div>
