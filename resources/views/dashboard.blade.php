<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ boo: false}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                            <form action="{{ route('game.store') }}" method="POST">
                                @csrf
                                <legend>Novo Jogo</legend>
                                <x-text-input name="title" placeholder="Titulo" />
                                <x-text-input name="developer" placeholder="Desenvolvedora" />
                                <x-text-input name="platform" placeholder="Plataforma" />
                                <input type="number" name="year" placeholder="Ano de lançamento">
                                <select name="gender" >
                                    <option value="Ação">Ação</option>
                                    <option value="Aventura">Aventura</option>
                                    <option value="Esporte">Esporte</option>
                                    <option value="Estratégia">Estratégia</option>
                                    <option value="RPG">RPG</option>
                                </select>
                                <x-primary-button>Enviar</x-primary-button>
                            </form>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100" ">
                    @foreach(Auth::user()->games as $games)
                        <div class="flex">
                            <template x-if="!boo">
                                <div class="flex">
                                    <div class="flex mt-2">
                                        <p class="mr-2 ml-2">Titulo:</p>
                                        {{ $games->tile }}
                                    </div>
                                    <div class="flex mt-2">
                                        <p class="mr-2 ml-2">Desenvolvedora:</p>
                                        {{ $games->developer }}
                                    </div>
                                    <div class="flex mt-2">
                                        <p class="mr-2 ml-2">Plataforma:</p>
                                        {{ $games->platform }}
                                    </div>
                                    <div class="flex mt-2">
                                        <p class="mr-2 ml-2">Ano de lançamento:</p>
                                        {{ $games->year }}
                                    </div>
                                    <div class="flex mt-2">
                                        <p class="mr-2 ml-2">Genero:</p>
                                        {{ $games->gender }}
                                    </div>
                                </div>
                            </template>
                            <template x-if="boo">
                               <div> 
                                    <form action="{{ route('game.update', $games) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <x-text-input name="tile" value="{{ $games->tile }}"/>
                                        <x-text-input name="developer" value="{{ $games->developer }}"/>
                                        <x-text-input name="platform" value="{{ $games->platform }}"/>
                                        <input type="number" name="year" value="{{ $games->year }}"/>
                                        <select name="gender" value="{{ $games->gender }}">
                                            <option value="Ação">Ação</option>
                                            <option value="Aventura">Aventura</option>
                                            <option value="Esporte">Esporte</option>
                                            <option value="Estratégia">Estratégia</option>
                                            <option value="RPG">RPG</option>
                                        </select>
                                        <x-primary-button>Salvar</x-primary-button>
                                    </form>
                               </div>
                            </template>
                                <template x-if="!boo">
                                    <x-primary-button class="ml-10" @click=" boo = true ">
                                        Editar
                                    </x-primary-button>
                                </template>
                                <template x-if="boo">
                                    <x-primary-button class="ml-10" @click=" boo = false ">
                                        Voltar
                                    </x-primary-button>
                                </template>
                                <form action="{{ route('game.destroy', $games) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button class="ml-2">Excluir</x-danger-button>
                                </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
