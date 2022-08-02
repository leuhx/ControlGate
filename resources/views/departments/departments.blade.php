@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Setores') }}
                    <a href="/departments/create" class="btn btn-primary btn-sm float-right">Cadastrar Setor</a>
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Unidade</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($departments) > 0)
                            @foreach ($departments as $department)
                            <tr>
                                <th scope="row">{{{$department->id}}}</th>
                                <td>{{$department->name}}</td>
                                <td>{{$department->unit->name}}</td>
                                <td>
                                    <form action="/departments/{{$department->id}}" method="POST">
                                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                            <a href="/departments/{{$department->id}}/edit" type="button" class="btn btn-secondary">Editar</a>

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
                                <td>Nenhum Setor Cadastrado</td>
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
