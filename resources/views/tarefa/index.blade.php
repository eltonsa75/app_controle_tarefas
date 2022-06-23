@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h1>Tarefas</h1>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('tarefa.create') }}" class="btn btn-primary float-right mr-3">Nova Tarefa</a>
                                <a href="{{ route('tarefa.exportacao') }}" class="btn btn-success float-right mr-3">XLSX</a>
                            </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Tarefa</th>
                                    <th scope="col">Data Limite Conclusão</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tarefas as $key => $t)
                                    <tr>
                                        <th scope="row">{{ $t['id'] }}</th>
                                        <td>{{ $t['tarefa'] }}</td>
                                        <td>{{ date('d/m/Y', strtotime($t['data_limite_conclusao'])) }}</td>
                                        <td><a href="{{ route('tarefa.edit', $t['id']) }}">Editar</a></td>
                                        <td>
                                            <form id="form_{{$t['id']}}" method="post" action="{{ route('tarefa.destroy', ['tarefa' => $t['id']]) }}">
                                            @method('DELETE')
                                            @csrf
                                            </form>
                                            <a href="#" onclick="document.getElementById('form_{{$t['id']}}').submit()">Excluir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="{{ $tarefas->previousPageUrl() }}">Voltar</a></li>

                                @for($i = 1; $i <= $tarefas->lastPage(); $i++)
                                    <li class="page-item {{ $tarefas->currentPage() == $i ? 'active' : ''}}">
                                    <a class="page-link" href="{{ $tarefas->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <li class="page-item"><a class="page-link" href="{{ $tarefas->nextpageUrl() }}">Avançar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
