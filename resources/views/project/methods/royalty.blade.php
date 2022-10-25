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
                        <a href={{route('registerProject')}}><i title="Voltar" style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
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
                                    <input type="number" step="0.01" name="value" class="form-control" placeholder="{{ __('Informe o valor montante do royalty...') }}" value="" required>
                                </div>
                            </div>
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <select class="form-control selectpicker" data-style="btn btn-link" id="exampleFormControlSelect1">
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
                                        <input type="number" step="0.01" name="tax" class="form-control" placeholder="{{ __('Informe a taxa aplicada para o setor...') }}" value="" required>
                                    </div>
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
            <div>
                <style>
                    .helper {
                        display: flex;
                        justify-content: baseline;
                        text-align: center;
                    }

                    .support {
                        padding: 0 18px;
                        background-color: white;
                        max-height: 0;
                        overflow: hidden;
                        transition: max-height 0.2s ease-out;
                    }
                </style>
                <div class="helper">
                    <button class="collapsible btn btn-success" type="button">
                        Tabela Royalty
                    </button>
                    <div class="support">
                        <div class="card card-body">
                            <div class="card" style="width: auto;">
                                <table class="table">
                                    <thead>
                                        <tr>                                            
                                            <th scope="col">Setor da Industria</th>
                                            <th scope="col">Taxa Mínima</th>
                                            <th scope="col">Taxa Máxima</th>
                                            <th scope="col">Mediana das Taxas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Automotivo</th>
                                            <td>1,0%
                                            </td>
                                            <td>15,0%
                                            </td>
                                            <td>4,0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Químicos</th>
                                            <td>0,5%</td>
                                            <td>25,0%
                                            </td>
                                            <td>3,6%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Computadores</th>
                                            <td>0,2%
                                            </td>
                                            <td>15,0%
                                            </td>
                                            <td>4,0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Bens de consumo</th>
                                            <td>0,0%
                                            </td>
                                            <td>17,0%</td>
                                            <td>5,0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Eletrônicos</th>
                                            <td>0,5%
                                            </td>
                                            <td>15,0%
                                            </td>
                                            <td>4,0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Energia e entretenimento</th>
                                            <td>0,5%
                                            </td>
                                            <td>20,0%
                                            </td>
                                            <td>5,0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alimentos</th>
                                            <td>0,3%</td>
                                            <td>7,0%
                                            </td>
                                            <td>2,8%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Produtos para saúde</th>
                                            <td>0,1%</td>
                                            <td>77,0%
                                            </td>
                                            <td>4,8%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Internet</th>
                                            <td>0,3%</td>
                                            <td>40,0%
                                            </td>
                                            <td>7,5%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Máquinas e ferramentas</th>
                                            <td>0,5%</td>
                                            <td>25,0%
                                            </td>
                                            <td>4,5%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mídia e entretenimento</th>
                                            <td>2,0%</td>
                                            <td>50,0%
                                            </td>
                                            <td>8,0%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Fármacos e Biotecnologia</th>
                                            <td>0,1%</td>
                                            <td>40,0%
                                            </td>
                                            <td>5,1%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Semicondutores</th>
                                            <td>0,0%</td>
                                            <td>30,0%
                                            </td>
                                            <td>3,2%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Softwares</th>
                                            <td>0,0%</td>
                                            <td>70,0%
                                            </td>
                                            <td>6,8%
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Telecomunicações</th>
                                            <td>0,4%</td>
                                            <td>25,0%
                                            </td>
                                            <td>4,7%
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                        coll[i].addEventListener("click", function() {
                            this.classList.toggle("active");
                            var content = this.nextElementSibling;
                            if (content.style.maxHeight) {
                                content.style.maxHeight = null;
                            } else {
                                content.style.maxHeight = content.scrollHeight + "px";
                            }
                        });
                    }
                </script>
            </div>
        </div>
    </div>
</div>
</div>
@endsection