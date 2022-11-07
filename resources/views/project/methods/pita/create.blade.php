@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Cadastrar projeto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('pita.create') }}">
                    @csrf
                    @method('post')

                    <div class="card card-login card-hidden mb-3">
                        <a href={{route('registerProject')}}><i title="Voltar"
                                style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>{{ __('Cálculo método Pita') }}</strong></h4>
                            <span>Pita = Ctotal . (Pmargem + Pvolume + Pinvestimento + Plegal). (1-d.t) </span>
                        </div>
                        <div class="card-body ">
                            <div class="bmd-form-group mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input title="Ctotal: Custo total de manutenção das patentes em todos os países (anuidades e 
gastos com escritórios de patentes)" type="number" name="maintenance" class="form-control"
                                        placeholder="{{ __('Custo de manutenção da patente (Ctotal)...') }}"
                                        value="{{ old('maintenance') }}" required>
                                </div>
                            </div>
                            <div class="bmd-form-group mb-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input title="d: A taxa de depreciação (reduzido em 5% a.a. a cada ano)"
                                        type="number" step="0.01" name="tax" class="form-control"
                                        placeholder="{{ __('Informe a taxa de depreciação da patente (d)...') }}"
                                        value="{{ old('maintenance') }}" required>
                                </div>
                            </div>
                            <div class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input title=" Plegal: Prêmio adicional por concessão nos países (adicionado o valor de +5 para 
cada país onde a patente foi concedida)" type="number" name="concession" class="form-control"
                                        placeholder="{{ __('Informe o valor PLegal da patente...') }}"
                                        value="{{ old('value') }}" required>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    <input title="t: Tempo de utilização da tecnologia" type="number" name="time"
                                        class="form-control"
                                        placeholder="{{ __('Tempo de utilização da tecnologia (t)...') }}"
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
                                    <select title="Nível de Prontidão Tecnológica da Patente (NPT)" name="npt"
                                        class="form-control" id="exampleFormControlSelect1">
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
                                            <input
                                                title="Pmargem: Baixo prêmio no critério margem de contribuição (Pmargem)"
                                                class="form-check-input" type="radio" name="contribution"
                                                id="inlineRadio1" value="low"> Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input title="Pmargem: Moderado prêmio no critério margem de contribuição"
                                                class="form-check-input" type="radio" name="contribution"
                                                id="inlineRadio2" value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input title="Pmargem: Alto prêmio no critério margem de contribuição"
                                                class="form-check-input" type="radio" name="contribution"
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
                                            Escolha o critério da margem de volume (Pvolume)
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input title="Pvolume: Baixo prêmio no critério volume"
                                                class="form-check-input" type="radio" name="volume" id="inlineRadio1"
                                                value="low"> Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input title="Pvolume: Moderado prêmio no critério volume"
                                                class="form-check-input" type="radio" name="volume" id="inlineRadio2"
                                                value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input title="Pvolume: Alto prêmio no critério volume"
                                                class="form-check-input" type="radio" name="volume" id="inlineRadio1"
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
                                            Escolha o critério do investimento em ativos de produção (Pinvestimento)
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
                @include('project.methods.pita.info')
            </div>
        </div>
    </div>
</div>
</div>
@endsection