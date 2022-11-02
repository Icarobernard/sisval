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
        <button class="collapsible btn btn-info" type="button">
            Tabela de taxa Royalty
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