@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Cadastrar projeto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('project.redirect') }}">
                    @csrf
                    @method('post')
                    <div class="card card-login card-hidden mb-3">
                        <a href={{route('project')}}><i title="Voltar" style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
                        <div class="card-header text-center">
                            <!-- <h4 class="card-title"><strong>{{ __('Cadastro') }}</strong></h4> -->
                        </div>
                        <div class="card-body ">
                            <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">content_paste</i>
                                        </span>
                                    </div>
                                    <input type="text" name="name" class="form-control" placeholder="{{ __('Nome do projeto...') }}" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('responsible') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">people</i>
                                        </span>
                                    </div>
                                    <input type="text" name="responsible" class="form-control" placeholder="{{ __('Responsáveis do projeto...') }}" value="{{ old('responsible') }}" required>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">phone</i>
                                        </span>
                                    </div>
                                    <input type="text" name="phone" class="form-control" placeholder="{{ __('Telefone do principal responsável') }}" value="" required>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">mail</i>
                                        </span>
                                    </div>
                                    <input type="mail" name="email" class="form-control" placeholder="{{ __('Email do principal responsável...') }}" value="" required>
                                </div>
                            </div>
                            <div class="methods mt-5">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline ">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="method" id="inlineRadio1" value="Fluxo de caixa descontado"> Fluxo de caixa descontado (FCD)
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="method" id="inlineRadio2" value="Royalty Rates"> Royalty Rates
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="method" id="inlineRadio1" value="Pita"> Método Pita
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="method" id="inlineRadio1" value="Sunk Cost"> Método Sunk Cost
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="number" name="calculated" class="form-control" value="0" hidden>
                            <input type="text" name="admin" class="form-control" value="{{ old('admin', auth()->user()->name) }}" hidden>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Criar projeto') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection