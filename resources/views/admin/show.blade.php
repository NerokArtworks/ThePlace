<x-app-layout>
    <section class="hero-section relative">
        <img src="{{asset('/storage/img/texture.jpg')}}" alt="paper_bg" class="hero-bg absolute top-0 left-0 w-full h-screen">
        <article class="projects-titles-wrapper">
            <div class="relative overflow-x-auto sm:rounded-lg flex justify-center">
                @livewire('user-form', ['user_id' => $admin->id])
                <!-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-md">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-opacity-60 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nombre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Apellidos
                            </th>
                            <th scope="col" class="px-6 py-3">
                                DNI
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Rol
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b bg-opacity-50 dark:bg-gray-800 dark:border-gray-700">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$admin->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$admin->lastname}}
                            </td>
                            <td class="px-6 py-4">
                                {{$admin->dni}}
                            </td>
                            <td class="px-6 py-4">
                                {{$admin->email}}
                            </td>
                            <td class="px-6 py-4">
                                {{$admin->rol}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{route('admin.show', ['admin'=>$admin->id])}}">
                                <button type="button" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table> -->
            </div>
        </article>
    </section>
</x-app-layout>
