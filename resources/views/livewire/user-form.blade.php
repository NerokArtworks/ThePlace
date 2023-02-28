<div class="sm:rounded-lg w-full sm:max-w-md mt-6 px-6 py-4 bg-transparent form-bg border-white border shadow-md overflow-hidden sm:rounded-lg">
    <div class="mb-5 mt-2">
        <h1 class="text-center text-gray-900">Edit User</h1>
    </div>
    @if (session('status'))
        {{session('status')}}
    @endif
    <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">Name</label>
        <input type="text" id="name" wire:model.defer='user.name' name="name" class="border border-white text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-900"
            placeholder=" "
            required
            value="{{$user->name}}">
        @error('user.name')
        {{$message}}
        @enderror
    </div>

    <div class="mb-6">
        <label for="lastname" class="block mb-2 text-sm font-medium text-white dark:text-white">Lastname</label>
        <input type="text" id="lastname" wire:model.defer='user.lastname' name="lastname" class="border border-white text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-900"
            placeholder=" "
            required
            value="{{$user->lastname}}">
        @error('user.lastname')
        {{$message}}
        @enderror
    </div>

    <div class="mb-6">
        <label for="dni" class="block mb-2 text-sm font-medium text-white dark:text-white">DNI</label>
        <input type="text" id="dni" wire:model.defer='user.dni' name="dni" class="border border-white text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-900"
            placeholder=" "
            required
            value="{{$user->dni}}">
        @error('user.dni')
        {{$message}}
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-white dark:text-white">Email</label>
        <input type="text" id="email" wire:model.defer='user.email' name="email" class="border border-white text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-900"
            placeholder=" "
            required
            value="{{$user->email}}">
        @error('user.email')
        {{$message}}
        @enderror
    </div>

    <div class="mb-6">
        <label for="rol" class="block mb-2 text-sm font-medium text-white dark:text-white">Rol</label>
        <input type="text" id="rol" wire:model.defer='user.rol' name="rol" class="border border-white text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-900"
            placeholder=" "
            required
            value="{{$user->rol}}">
        @error('user.rol')
        {{$message}}
        @enderror
    </div>

    <div class="mb-6">
        <label for="email_verified_at" class="block mb-2 text-sm font-medium text-white dark:text-white">Email Verificado</label>
        <input type="text" id="email_verified_at" name="email_verified_at" class="border border-white text-gray-900 text-sm rounded-lg block w-full p-2.5 placeholder-gray-900" value="{{$user->email_verified_at}}"
        required
        disabled
        value="{{$user->email_verified_at}}">
    </div>

    <button type="button" wire:click="update()" class="text-white font-medium text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Actualizar usuario
    </button>
</div>
