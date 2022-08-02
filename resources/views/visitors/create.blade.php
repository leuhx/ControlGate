@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Cadastrar Visitante') }}             </div>
                <div class="card-body">
                    <form action="/visitors" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                          <label for="name">Nome</label>
                          <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="cpf">CPF</label>
                            <input name="cpf" type="number" class="form-control" id="cpf">
                        </div>
                          <div class="form-group mb-3">
                            <label for="rg">RG</label>
                            <input name="rg" type="number" class="form-control" id="rg">
                          </div>
                          <div class="form-group mb-3">
                            <label for="phone">Telefone</label>
                            <input name="phone" type="number" class="form-control" id="phone">
                          </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="/visitors" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
