@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Editar Setor') }}             </div>
                <div class="card-body">
                    <form action="/departments/{{$department->id}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-3">
                          <label for="name">Nome</label>
                          <input name="name" value="{{$department->name}}"type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nome da Unidade</label>
                            <select name="unit" id="unit" class="form-control">
                                @foreach ($units as $unit)
                                <option {{$department->unit_id == $unit->id ? 'selected' : ''}} value="{{$unit->id}}">{{$unit->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/departments" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
