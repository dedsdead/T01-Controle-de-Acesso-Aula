@role('admin', 'admin')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Usuarios') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!--<ul class="list-group">-->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Acoes</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                        <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                            <th scope="row"> {{ $user->id }} </th>
                            <td> {{ $user->name }} </td>
                            <td>

                            <div style="display:flex">
                            @auth
                                <div style="margin-right:2%;">
                                    <button type="button" class="btn btn-outline-info">
                                        <a href="{{ route('usuarios.show', $user->id) }}">Permissoes do Usuario</a>
                                    </button>
                                </div>
                            @endauth
                            </div>
                            </td>
                        <!--</li>-->

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </x-app-layout>
@endrole
