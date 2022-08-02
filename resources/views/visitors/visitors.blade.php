@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Visitantes') }}
                    <a href="/visitors/create" class="btn btn-primary btn-sm float-right">Cadastrar Visitante</a>
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">RG</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($visitors) > 0)
                            @foreach ($visitors as $visitor)
                            <tr>
                                <th scope="row">{{{$visitor->id}}}</th>
                                <td>{{$visitor->name}}</td>
                                <td>{{$visitor->cpf}}</td>
                                <td>{{$visitor->rg}}</td>
                                <td>{{$visitor->phone}}</td>
                                <td>
                                    <form action="/visitors/{{$visitor->id}}" method="POST">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="/visitors/{{$visitor->id}}/edit" type="button" class="btn btn-secondary">Editar</a>

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
