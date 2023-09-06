<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissoes do Papel: ') }} {{ $role->name }}
        </h2>
    </x-slot>
    <form method="post" action="{{ route('permissoes.store') }}">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!--<ul class="list-group">-->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Permissao</th>
                        <th scope="col">Ativar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($permissoes as $permissao)
                        <tr>
                        <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                            <th scope="row"> {{ $permissao->id }} </th>
                            <td> {{ $permissao->name }} </td>
                            <td>

                            <div style="display:flex">
                            @auth
                                @php $flag=0; @endphp
                                @foreach($role_permissoes as $rp)
                                    @if($rp->id == $permissao->id)
                                        @php $flag = 1; @endphp
                                    @endif
                                @endforeach
                                <div class="form-check form-check">
                                @if($flag == 1)
                                    <input class="form-check-input" type="checkbox" name="permissao[]" id="permissao" value="{{$permissao->name}}" checked>
                                @else
                                    <input class="form-check-input" type="checkbox" name="permissao[]" id="permissao" value="{{$permissao->name}}">
                                </div>
                                @endif
                            @endauth
                            </div>
                            </td>
                        <!--</li>-->

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="role" id="role" value="{{$role->id}}" />
                <button class="btn btn-primary">Salvar</button>
                <button class="btn btn-secondary">
                    <a href="{{route('roles.index')}}">Voltar</a>
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
