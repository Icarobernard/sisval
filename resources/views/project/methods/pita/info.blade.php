<div>
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
            TRL detalhado
        </button>
        <div class="support">
            <div class="card card-body">
                <div class="card" style="width: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">TRL</th>
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