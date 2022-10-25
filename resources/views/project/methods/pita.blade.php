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
                            Glossário
                        </button>
                        <div class="support">
                            <div class="card card-body">
                                <div class="card" style="width: auto;">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Custo total de manutenção das
                                                patentes</strong> em todos os países (custo mínimo): custos associados à
                                            renovação da patente nos países onde está depositada (anuidades e gastos com
                                            escritórios de patentes).</li>
                                        <li class="list-group-item"><strong>Impacto na Margem de contribuição:</strong>
                                            Uma melhoria de processo pode gerar economia no consumo de matéria-prima,
                                            reduzindo o seu custo. De forma semelhante, a criação de um novo produto
                                            superior ao seu concorrente tradicional, e que possa ser produzido por um
                                            processo convencional, também terá seu impacto captado pela margem de
                                            contribuição.</li>
                                        <li class="list-group-item"><strong>Impacto no Volume:</strong> ganhos de escala
                                            são fundamentais em algumas indústrias, e, aumentos na margem de
                                            contribuição são mais relevantes quando ocorrem em produtos cujo volume seja
                                            expressivo para a empresa. Assim, o volume do novo produto ou o volume
                                            beneficiado pelo novo processo é uma variável importante de ser considerada
                                            no modelo.</li>
                                        <li class="list-group-item"><strong>Impacto na Redução do Investimento em ativos
                                                de produção:</strong> Uma patente cujo custo de implementação seja
                                            baixo, deverá ser valorizada, mesmo que os custos operacionais desse
                                            equipamento sejam ligeiramente superiores aos dos demais existentes no
                                            mercado. Um novo processo que elimine a necessidade de um equipamento caro
                                            também será bastante relevante.</li>
                                        <li class="list-group-item"><strong>Prêmio adicional por concessão no
                                                país:</strong> Um documento que ainda é “pedido de patente”, ou seja,
                                            ainda não foi concedido é mais frágil do que aquele que já foi concedido.
                                            Além disso, o pedido de patente não impede que terceiros imitem sua
                                            invenção, apenas permite notificá-los a respeito da infração. Dessa forma, a
                                            concessão da patente confere ao seu titular um aumento de valor do ativo de
                                            PI. Assim, para cada país onde a sua patente estiver concedida, haverá um
                                            acréscimo de +5 pontos. Se a tecnologia ainda é incipiente, mas há grande
                                            expectativa de ganhos econômicos sobre ela, a empresa que tratar de proteger
                                            a invenção em um número grande de países poderá ter uma valoração maior
                                            sobre ela.</li>
                                        <li class="list-group-item"><strong>Taxa de depreciação:</strong> PITA assume
                                            uma taxa de depreciação linear de 5% a.a., valor que, segundo ele, é bem
                                            abaixo do encontrado pela literatura e correspondente a uma depreciação
                                            linear de 20 anos. Isso porque as taxas encontradas na literatura foram
                                            consideradas pela própria empresa muito elevadas. Assim, o valor da PI será
                                            reduzido de 5% a cada ano.</li>
                                        <li class="list-group-item"><strong>Tempo de utilização da tecnologia:</strong>
                                            O tempo (t) é contado a partir da data de depósito do Pedido de Patente. Se
                                            foi pedido em 2015, usa-se t=5, por exemplo para 2020.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="helper">
                        <button class="collapsible btn btn-success" type="button">
                            NPT detalhado
                        </button>
                        <div class="support">
                            <div class="card card-body">
                                <div class="card" style="width: auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">NPT</th>
                                                <th scope="col">Fase:</th>
                                                <th scope="col">Para produto</th>
                                                <th scope="col">Para processo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Ideação: Princípios Básicos Observados
                                                </td>
                                                <td>Princípios básicos observados e reportados.
                                                </td>
                                                <td>Princípios básicos observados e reportados.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Concepção: Formulação do Conceito e/ou Aplicação da Tecnologia
                                                </td>
                                                <td>Concepção tecnológica e/ou aplicação formulada.
                                                </td>
                                                <td>Conceito de manufatura definido.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Prova de Conceito e Experimentação da Função
                                                </td>
                                                <td>Prova de conceitos das funções críticas de forma analítica ou
                                                    experimental.
                                                </td>
                                                <td>Processo de manufatura demonstrado (fazer funcionar).
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Otimização

                                                </td>
                                                <td>Validação do Componente ou do Circuito em Ambiente de Laboratório
                                                </td>
                                                <td>Capacidade de produzir a tecnologia em ambiente laboratorial (fazer
                                                    funcionar apropriadamente).
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Prototipagem: Validação do Componente ou do Circuito em Ambiente
                                                    Relevante
                                                </td>
                                                <td>Validação em ambiente relevante de componentes ou arranjos
                                                    experimentais com configurações físicas finais.
                                                </td>
                                                <td>Capacidade de produzir protótipo do componente do produto em
                                                    ambiente relevante de produção.
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Escalonamento
                                                </td>
                                                <td>Modelo do sistema/subsistema protótipo de demonstrador em ambiente
                                                    relevante.
                                                </td>
                                                <td>Capacidade de produzir o produto ou seus subconjuntos em ambiente
                                                    relevante de produção. A tecnologia está em fase de testes sem
                                                    alcançar a escala final.
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
</div>
@endsection