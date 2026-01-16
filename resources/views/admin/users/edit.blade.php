<x-admin-layout title="Usuarios | Healthify" :breadcrumbs="[
    ['name' => 'Dashboard', 'href' => route('admin.dashboard')],
    ['name' => 'Usuarios', 'href' => route('admin.usuarios.index')],
    ['name' => 'Editar'],
]">

<x-wire-card>
        <form action="{{ route('admin.usuarios.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div class="space-y-4">
                    <div class="grid lg:grid-cols-2 gap-4">

                <x-wire-input name="name" label="Nombre" required :value="old('name', $user->name)"
                    placeholder="Nombre" autocomplete="name" />

                <x-wire-input name="email" label="Email" required :value="old('email', $user->email)"
                    placeholder="usuario@email.com" autocomplete="email" />

                <x-wire-input name="password" label="Contraseña" type="password" required
                    placeholder="Mínimo 8 carácteres" autocomplete="new-password" />

                <x-wire-input name="password_confirmation" label="Confirmar contraseña" required
                    :value="old('password_confirmation')" placeholder="Repita la contraseña"
                    autocomplete="new-password" />

                <x-wire-input name="id_number" label="Número de ID" required :value="old('id_number', $user->id_number)"
                    placeholder="Ej. 12345678" autocomplete="id_number" inputmode="numeric" />

                <x-wire-input name="phone" label="Teléfono" required :value="old('phone', $user->phone)"
                    placeholder="Ej. 12345678" autocomplete="tel" inputmode="tel" />
                </div>

                <x-wire-input name="address" label="Dirección" required :value="old('address', $user->address)"
                    placeholder="Ej. Calle 123" autocomplete="street-address" />

                <div class="space-y-1">
                    <x-wire-native-select name="role_id" label="Rol" required>
                        <option value="">Selecciona un rol</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @selected(old('role_id', $user->roles->first()->id) == $role->id)>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </x-wire-native-select>

                    <p class="text-sm text-gray-500">
                        Define los permisos y accesos del usuario.
                    </p>
                </div>

                <div class="flex justify-end">
                    <x-wire-button type="submit">
                        Actualizar
                    </x-wire-button>
                </div>
            </div>
        </form>
    </x-wire-card>

</x-admin-layout>