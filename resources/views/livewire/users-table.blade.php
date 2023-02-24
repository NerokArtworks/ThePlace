<div>
    <div class="pb-4 shadow-md">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" wire:model='buscador' id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-60 bg-opacity-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar usuarios por nombre">
        </div>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-md">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-opacity-60 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" wire:click="ordenar('id')" class="px-6 py-3 cursor-pointer">
                    ID
                </th>
                <th scope="col" wire:click="ordenar('name')" class="px-6 py-3 cursor-pointer">
                    Nombre
                </th>
                <th scope="col" wire:click="ordenar('lastname')" class="px-6 py-3 cursor-pointer">
                    Apellidos
                </th>
                <th scope="col" wire:click="ordenar('dni')" class="px-6 py-3 cursor-pointer">
                    DNI
                </th>
                <th scope="col" wire:click="ordenar('email')" class="px-6 py-3 cursor-pointer">
                    Email
                </th>
                <th scope="col" wire:click="ordenar('rol')" class="px-6 py-3 cursor-pointer">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($users->count())
            <div class="rounded-lg">
                {{$users->links()}}
            </div>
            @foreach ($users as $user)
            <tr class="bg-white border-b bg-opacity-50 dark:bg-gray-800 dark:border-gray-700">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->id}}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$user->name}}
                </th>
                <td class="px-6 py-4">
                    {{$user->lastname}}
                </td>
                <td class="px-6 py-4">
                    {{$user->dni}}
                </td>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4">
                    {{$user->rol}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('admin.show', ['admin'=>$user->id])}}">
                        <button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                    </a>
                    <form action="{{route('admin.destroy', ['admin'=>$user->id])}}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
            @else
            <tr class="bg-white border-b bg-opacity-50 dark:bg-gray-800 dark:border-gray-700">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="hidden" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <td colspan="7" class="px-6 py-4">No se ha encontrado ningún usuario</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
