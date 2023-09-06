<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Papeis do Usuario: ') }} {{ $user->name }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('usuarios.store') }}">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!--<ul class="list-group">-->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Papel</th>
                        <th scope="col">Ativar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                        <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                            <th scope="row"> {{ $role->id }} </th>
                            <td> {{ $role->name }} </td>
                            <td>

                            <div style="display:flex">
                            @auth
                                <div class="form-check form-check">
                                    <input class="form-check-input" type="checkbox" name="role[]" id="role" value="{{$role->name}}" <?php echo ($user->hasRole($role->name)) ? "checked" : null; ?>/>
                                </div>
                            @endauth
                            </div>
                            </td>
                        <!--</li>-->

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="user" id="user" value="{{$user->id}}" />
                <button class="btn btn-primary">Salvar</button>
                <button class="btn btn-secondary">
                    <a href="{{route('usuarios.index')}}">Voltar</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
