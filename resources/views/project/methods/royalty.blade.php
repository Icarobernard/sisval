@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Cadastrar projeto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('project.royalty') }}">
                    @csrf
                    @method('post')

                    <div class="card card-login card-hidden mb-3">
                        <a href={{route('registerProject')}}><i title="Voltar"
                                style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>{{ __('Cálculo método Royalty Rates') }}</strong></h4>
                        </div>

                        <div class="card-body ">
                            <div class="bmd-form-group{{ $errors->has('value') ? ' has-primary' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input type="number" step="0.01" name="value" class="form-control"
                                        placeholder="{{ __('Informe o valor montante do royalty...') }}" value=""
                                        required>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <select class="form-control selectpicker" data-style="btn btn-link"
                                        id="exampleFormControlSelect1">
                                        <option>Escolha o setor </option>
                                        <option>Automotivo - Taxa mínima: 1,0% Máxima: 15,0% </option>
                                        <option>Químicos - Taxa mínima: 0,5% Máxima: 25,0%</option>
                                        <option>Computadores - Taxa mínima: 0,2% Máxima: 15,0%</option>
                                        <option>Bens de consumo - Taxa mínima: 0,0% Máxima: 17,0%</option>
                                        <option>Eletrônicos - Taxa mínima: 0,5% Máxima: 15,0%</option>
                                        <option>Energia e entretenimento - Taxa mínima: 0,5% Máxima: 20,0%</option>
                                        <option>Alimentos - Taxa mínima: 0,3% Máxima: 20,0%</option>
                                        <option>Produtos para saúde - Taxa mínima: 0,1% Máxima: 77,0%</option>
                                        <option>Internet - Taxa mínima: 0,3% Máxima: 40,0%</option>
                                        <option>Máquinas e ferramentas - Taxa mínima: 0,5% Máxima: 25,0%</option>
                                        <option>Mídia e entretenimento Taxa mínima: 2,0% Máxima: 50,0%</option>
                                        <option>Fármacos e Biotecnologia Taxa mínima: 0,1% Máxima: 40,0%</option>
                                        <option>Semicondutores - Taxa mínima: 0,0% Máxima: 30,0%</option>
                                        <option>Softwares - Taxa mínima: 0,0% Máxima: 70,0% </option>
                                        <option>Telecomunicações - Taxa mínima: 0,4% Máxima: 25,0%</option>
                                    </select>
                                </div>
                                <br></br>
                                <div class="bmd-form-group{{ $errors->has('tax') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-number"></i>
                                            </span>
                                        </div>
                                        <input type="number" step="0.01" name="tax" class="form-control"
                                            placeholder="{{ __('Informe a taxa aplicada para o setor...') }}" value=""
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer justify-content-center">
                                <button type="submit"
                                    class="btn btn-primary btn-link btn-lg">{{ __('Calcular') }}</button>
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
</div>
@endsection