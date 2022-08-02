@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Unidades') }}
                    <a href="/units/create" class="btn btn-primary btn-sm float-right">Cadastrar Unidade</a>
                </div>

                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Ações</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if (count($units) > 0)
                            @foreach ($units as $unit)
                            <tr>
                                <th scope="row">{{{$unit->id}}}</th>
                                <td>{{$unit->name}}</td>
                                <td>
                                    <form action="/units/{{$unit->id}}" method="POST">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <a href="/units/{{$unit->id}}/edit" type="button" class="btn btn-secondary">Editar</a>

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
                                <td>Nenhuma Unidade Cadastrada</td>
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
