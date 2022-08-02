@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Visitas') }}
                    <a href="/visits/create" class="btn btn-primary btn-sm float-right">Cadastrar Visitas</a>
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome do Visitante</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Nome do Funcionário</th>
                            <th scope="col">Status</th>
                            <th scope="col">Data e Hora</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($visits) > 0)
                            @foreach ($visits as $visit)
                            <tr>
                                <th scope="row">{{{$visit->id}}}</th>
                                <td>{{$visit->visitor->name}}</td>
                                <td>{{$visit->department->name}}</td>
                                <td>{{$visit->user->name}}</td>
                                <td>{{$visit->status}}</td>
                                <td>{{$visit->created_at}}</td>
                                <td>
                                    <form action="/visits/{{$visit->id}}" method="POST">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="/visits/{{$visit->id}}/edit" type="button" class="btn btn-secondary">Editar</a>

                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-secondary">Deletar</button>
                                    </div>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <th scope="row"></th>
                                <td>Nenhum Visitante Cadastrado</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            @endif
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
