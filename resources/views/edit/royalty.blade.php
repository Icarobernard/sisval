<div>
    <form class="form" method="POST" action="/royalty/{{$data['id']}}/edit">
        @csrf
        @method('post')
        <div class="card card-login card-hidden mb-3">
            <div class="card-header text-center">
                <h4 class="card-title"><strong>{{ __('Edição') }}</strong></h4>
            </div>
            <div class="card-body ">

                <div class="bmd-form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">content_paste</i>
                            </span>
                        </div>
                        <input disabled type="text" name="name" class="form-control"
                            placeholder="{{ __('Nome do projeto...') }}" value="{{ $data['name'] }}" required>
                    </div>
                    @if ($errors->has('name'))
                    <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                    @endif
                </div>
                <div class="bmd-form-group mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">people</i>
                            </span>
                        </div>
                        <input disabled type="text" name="responsible" class="form-control"
                            placeholder="{{ __('Responsáveis do projeto...') }}" value="{{ $data['responsible'] }}"
                            required>
                    </div>
                </div>
                <div class="bmd-form-group mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="material-icons">content_paste</i>
                            </span>
                        </div>
                        <input disabled type="text" name="method" class="form-control" value="{{ $data['method'] }}"
                            required>
                    </div>
                </div>
                <div class="bmd-form-group mt-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                Total Royalty
                            </span>
                        </div>
                        <input disabled type="text" name="method" class="form-control" value="{{ $data['calculated'] }}"
                            required>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Período</th>
                            <th scope="col">Valor de venda</th>
                            <th scope="col">Quantidade vendida</th>
                            <th scope="col">Valor royalty</th>
                            <th scope="col">Operação</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($method as $value)
                        <tr>
                            <td> {{$value['period']}}</td>
                            <td> {{$value['sale']}}</td>
                            <td> {{$value['unity']}}</td>
                            <td> {{$value['royalty']}}</td>
                            <td>
                                <form class="form" method="post"
                                    action="/royalty/{{$value['id']}}/{{$value['project_id']}}/delete">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                            class="fa fa-trash"></i></button>
                                </form>

                            </td>
                            @endforeach

                        </tr>
                        <tr>
                            <td> <input type="number" name="period" class="form-control" placeholder=""
                                    value="{{count($method)+1}}" required> </td>
                            <td> <input type="number" name="sale" class="form-control"
                                    placeholder="{{ __('Informe o preço de venda..') }}" value="" required> </td>
                            <td> <input type="number" name="unity" class="form-control"
                                    placeholder="{{ __('Informe a quantidade vendida.') }}" value="" required> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer justify-content-center">
                <button type="submit" class="btn btn-success btn-md">{{ __('Adicionar royalty') }}</button>
    </form>
    <form class="form" method="post" action="/project/{{$data['id']}}/delete">
        @csrf
        @method('post')
        <button type="submit" class="btn btn-danger btn-md">{{ __('Excluir método') }}</button>
    </form>
</div>
@include('project.methods.royalty.info')