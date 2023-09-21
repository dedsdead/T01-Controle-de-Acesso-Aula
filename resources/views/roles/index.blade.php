@role('admin', 'admin')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Papeis') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(Auth::check())
                    <div style="margin-bottom:2%;">
                        <button type="button" class="btn btn-outline-primary">
                            <a href="{{ route('roles.create') }}">Criar Papel</a>
                        </button>
                    </div>
                @endif
                <!--<ul class="list-group">-->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Papel</th>
                        <th scope="col">Acoes</th>
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
                                <div style="margin-right:2%;">
                                    <form method="post" action=" {{ route('roles.destroy', $role->id) }} "
                                        onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($role->name) }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger">
                                            Excluir
                                        </button>
                                    </form>
                                </div>

                                <div style="margin-right:2%;">
                                    <button type="button" class="btn btn-outline-success">
                                        <a href="{{ route('roles.edit', $role) }}">Editar</a>
                                    </button>
                                </div>

                                <div style="margin-right:2%;">
                                    <button type="button" class="btn btn-outline-info">
                                        <a href="{{ route('permissoes.show', $role) }}">Permissoes do Papel</a>
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
