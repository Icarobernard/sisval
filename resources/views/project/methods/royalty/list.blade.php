@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('royalty.create') }}">
                    @csrf
                    @method('post')

                    <div class="card card-login card-hidden mb-3">
                        <a href={{route('registerProject')}}><i title="Voltar"
                                style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>{{ __('Cálculo método Royalty Rates') }}</strong></h4>
                        </div>

                        <div class="card-body ">
                            <div class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input type="number" name="unity" class="form-control"
                                        placeholder="{{ __('Informe a quantidade de unidades vendidas do primeiro período...') }}"
                                        value="" required>
                                </div>
                            </div>
                            <div class="bmd-form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input type="number" step="0.01" name="sale" class="form-control"
                                        placeholder="{{ __('Informe o preço de venda...') }}" value="" required>
                                </div>
                            </div>
                        </div>
                        <input type="number" name="period" class="form-control" value="1" hidden>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-md">{{ __('Adicionar perído') }}</button>
                        </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Período</th>
                                <th scope="col">Valor de venda</th>
                                <th scope="col">Quantidade vendida</th>
                                <th scope="col">Valor royalty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($royalties as $value)
                            <tr>
                                <!-- <th scope="row">$value[period]</th> -->
                                <td> {{$value['period']}}</td>
                                <td> {{$value['sale']}}</td>
                                <td> {{$value['unity']}}</td>
                                <td> {{$value['royalty']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer justify-content-center">
                    <button type="submit" class="btn btn-success btn-md">{{ __('Finalizar cálculo') }}</button>
                </div>
            </div>
            @include('project.methods.royalty.info')
        </div>
    </div>
</div>
@endsection