<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Noticias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(Auth::check())
                        <a href="{{ route('noticias.create') }}" class="btn btn-dark mb-2">Criar Noticia</a>
                    @endif
                    <!--<ul class="list-group">-->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Descricao</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Acoes</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($noticias as $noticia)
                                <tr class="justify-content-between align-items-center">
                                <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                                    <th scope="row">{{ $noticia->id }}</th>
                                    <td>{{ $noticia->titulo }}</td>
                                    <td>{{ $noticia->descricao}}</td>
                                    <td>{{ $noticia->user_id }}</td>
                                    <td>
                                    <div style="display:flex">    
                                    
                                    @auth
                                        <!--can('delete', $noticia)-->
                                            <div style="margin-right:2%;">
                                                <form method="post" action=" {{ route('noticias.destroy', $noticia->id) }} "
                                                    onsubmit="return confirm('Tem certeza que deseja REMOVER {{ addslashes($noticia->titulo) }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">
                                                        Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        <!--endcan-->
                                        
                                        <!--can('atualizar', $noticia)-->
                                            <div>
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <a href="{{ route('noticias.edit', $noticia->id) }}">Editar</a>
                                                </button>
                                            </div>
                                        <!--endcan-->
                                        
                                        <!--can('view', $noticia)-->
                                            <div>
                                                <button class="btn btn-outline-primary btn-sm">
                                                    <a href="{{ route('noticias.show', $noticia->id) }}">Visualizar</a>
                                                </button>
                                            </div>
                                        <!--endcan-->
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
        </div>
    </div>
</x-app-layout>
