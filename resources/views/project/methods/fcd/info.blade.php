<style>
    .table td {
        text-align: justify;
    }
</style>

<div class="helper">
    <button class="collapsible btn btn-success" type="button">
        Glossário
    </button>
    <div class="support">
        <div class="card card-body">
            <div class="card" style="width: auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Variáveis</th>
                            <th scope="col">Significado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">VPL</th>
                            <td>O VPL de um investimento é o valor presente do fluxo de caixa líquido do projeto.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">TIR</th>
                            <td>A TIR demonstra o quanto rende um projeto de investimento. Quando o retorno (TIR) é maior que o valor de atratividade (TMA), quer dizer que o projeto tem um VPL positivo, sendo mais atrativo que o proposto.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">TMA</th>
                            <td>A Taxa Mínima de Atratividade (TMA) é uma taxa de juros que representa o mínimo que um investidor se propõe a ganhar quando faz um investimento, ou o máximo que uma pessoa se propõe a pagar quando faz um financiamento.
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">PayBack</th>
                            <td>Payback é um indicador do tempo de retorno de um investimento. Diz respeito ao período que a empresa irá levar para devolver aos seus cofres o dinheiro aplicado em um novo projeto ou investimento.
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