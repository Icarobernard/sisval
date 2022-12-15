@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Cadastrar projeto')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('sunk.create') }}">
                    @csrf
                    @method('post')

                    <div class="card card-login card-hidden mb-3">
                        <a href={{route('registerProject')}}><i title="Voltar" style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>{{ __('Cálculo método Sunk Cost') }}</strong></h4>
                        </div>

                        <div class="card-body ">
                            <div class="bmd-form-group">
                                <div class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-number"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="period" class="form-control" placeholder="{{ __('Informe o valor do primeiro período ou ano. Ex: 2021') }}" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="bmd-form-group">
                                <div class="bmd-form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-number"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="description" class="form-control" placeholder="{{ __('Descrição do gasto') }}" value="" required>
                                    </div>
                                </div>
                            </div>
                            <div class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <!-- <i class="fa fa-list-ol"></i> -->
                                        </span>
                                    </div>
                                    <input type="number" name="quantity" class="form-control" placeholder="{{ __('Informe a quantidade (Un.)') }}" value="" required>
                                </div>
                            </div>
                            <div class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <!-- <i class="fa fa-list-ol"></i> -->
                                        </span>
                                    </div>
                                    <input type="number"" name=" unity" class="form-control" placeholder="{{ __('Informe o valor por horas trabalhadas.. (R$/h)') }}" value="" required>
                                </div>
                            </div>
                            <div class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <!-- <i class="fa fa-list-ol"></i> -->
                                        </span>
                                    </div>
                                    <input type="number" step="0.01" name="hours" class="form-control" placeholder="{{ __('Informe a quantidade de horas mensais... (h/mês)') }}" value="" required>
                                </div>
                            </div>

                            <div class="card-footer justify-content-center">
                                <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Calcular') }}</button>
                            </div>
                        </div>
                        <input type="number" name="calculated" class="form-control" value="0" hidden>
                        <input type="text" name="method" value="{{ $data['method'] }}" hidden>
                        <input name="name" value="{{ $data['name'] }}" hidden>
                        <input name="responsible" value="{{ $data['responsible'] }}" hidden>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection