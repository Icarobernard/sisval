<div>
    <form class="form" method="POST" action="/fcd/{{$data['id']}}/edit">
        @csrf
        @method('post')
        <div class="card card-login card-hidden mb-3">
            <a href={{route('project')}}><i title="Voltar" style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
            <div class="card-header text-center">
                <h4 class="card-title"><strong>{{ __('Edição') }}</strong></h4>
            </div>
            <div class="card-body ">
                @include('edit.project')
                <div class="bmd-form-group mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                Total VPL (R$)
                            </span>
                        </div>
                        <h2>{{number_format($data['calculated'] , 2, ',', '.') }} </h2>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Período (anual)</th>
                                <th scope="col">Valor de venda (R$)</th>
                                <th scope="col">Quantidade vendida (Un.)</th>
                                <th scope="col">Taxa TMA (% ao ano.)</th>
                                <th scope="col">Operação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($method as $value)
                            <tr>
                                <td> {{$value['period']}}</td>
                                <td> {{$value['sale']}}</td>
                                <td> {{$value['unity']}}</td>
                                <td> {{$value['tma']}}%</td>
                                <td>
                                    <form class="form" method="post" action="/fcd/{{$value['id']}}/{{$value['project_id']}}/delete">
                                        @csrf
                                        @method('post')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td> <input type="number" name="period" class="form-control" placeholder="" value="{{count($method)+1}}" required> </td>
                                <td> <input type="number" name="sale" class="form-control" placeholder="{{ __('Informe o preço de venda.. (R$)') }}" value="" required></td>
                                <td> <input type="number" name="unity" class="form-control" placeholder="{{ __('Informe a quantidade vendida.. (Un.)') }}" value="" required> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-success btn-md">{{ __('Adicionar Fluxo') }}</button>
    </form>
    <form class="form" method="post" action="/project/{{$data['id']}}/delete">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-danger btn-md">{{ __('Excluir projeto') }}</button>
    </form>
</div>
@include('project.methods.fcd.info')