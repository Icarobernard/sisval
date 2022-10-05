@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Cadastrar projeto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('project.pita') }}">
                    @csrf
                    @method('post')

                    <div class="card card-login card-hidden mb-3">
                        <a href={{route('registerProject')}}><i title="Voltar"
                                style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>{{ __('Cálculo método Pita') }}</strong></h4>
                        </div>
                        <div class="card-body ">
                            <!-- <div class="bmd-form-group{{ $errors->has('value') ? ' has-danger' : '' }}">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="valuePita" class="form-control"
                                        placeholder="{{ __('Informe o valor da patente...') }}"
                                        value="{{ old('value') }}" required>
                                </div>
                            </div> -->
                            <div class="bmd-form-group{{ $errors->has('maintenance') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="maintenance" class="form-control"
                                        placeholder="{{ __('Custo de manutenção da patente...') }}"
                                        value="{{ old('maintenance') }}" required>
                                </div>
                            </div>
                            <div class="bmd-form-group{{ $errors->has('time') ? ' has-danger' : '' }} mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="time" class="form-control"
                                        placeholder="{{ __('Tempo de utilização da tecnologia...') }}"
                                        value="{{ old('time') }}" required>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group input-group-static mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <!-- <i class="fa fa-calendar"></i> -->
                                        </span>
                                    </div>
                                    <select name="npt" class="form-control" id="exampleFormControlSelect1">
                                        <option>Selecione o nível NPT </option>
                                        <option value="1">Nível 1</option>
                                        <option value="2">Nível 2</option>
                                        <option value="3">Nível 3</option>
                                        <option value="4">Nível 4</option>
                                        <option value="5">Nível 5</option>
                                        <option value="6">Nível 6</option>
                                        <!-- <option value="7">Nível 7</option>
                                        <option value="8">Nível 8</option>
                                        <option value="9">Nível 9</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">
                                            Escolha o critério da margem de contribuição
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="contribution"
                                                id="inlineRadio1" value="low"> Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="contribution"
                                                id="inlineRadio2" value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="contribution"
                                                id="inlineRadio1" value="high">Alto
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">
                                            Escolha o critério da margem de volume
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="volume" id="inlineRadio1"
                                                value="low"> Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="volume" id="inlineRadio2"
                                                value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="volume" id="inlineRadio1"
                                                value="high">Alto
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">
                                            Escolha o critério do investimento em ativos de produção
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="investment"
                                                id="inlineRadio1" value="low"> Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="investment"
                                                id="inlineRadio2" value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="investment"
                                                id="inlineRadio1" value="high">Alto
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <input type="number" name="calculated" class="form-control" value="0" hidden>
                            <input type="text" name="method" value="{{ $data['method'] }}" hidden>
                            <input name="name" value="{{ $data['name'] }}" hidden>
                            <input name="responsible" value="{{ $data['responsible'] }}" hidden>
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit"
                                class="btn btn-primary btn-link btn-lg">{{ __('Criar projeto') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection