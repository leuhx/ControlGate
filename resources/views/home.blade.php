@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="btn-group-vertical">
                        <a href="/units" type="button" class="btn btn-secondary">Unidades</a>
                        <a href="/departments" type="button" class="btn btn-secondary">Setores</a>
                        <a href="/users" type="button" class="btn btn-secondary">Usuários</a>
                        <a href="/visitors" type="button" class="btn btn-secondary">Visitantes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
