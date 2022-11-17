@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'titlePage' => __('Cadastrar
projeto')])

@section('content')
<div class="container" style="height: auto;">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-8">
            <div class="card card-login card-hidden mb-3">
                <div class="card-header card-header-success text-center">
                    <p class="card-title"><strong>{{ __('Operação realizada com sucesso') }}</strong></p>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route('project') }}""><button type=" button" class="btn btn-secondary">Voltar para lista
                        de projeto</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection