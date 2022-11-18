<form class="form" method="POST" action="/project/{{$data['id']}}/edit">
    @csrf
    @method('post')
    <div class="card card-login card-hidden mb-3">
        <a href={{route('registerProject')}}><i title="Voltar" style="padding-left: 10px; padding-top: 10px"
                class="fa fa-arrow-left"></i> </a>
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

        </div>
        <div class="card-footer justify-content-center">
            <button type="submit" class="btn btn-primary btn-md">{{ __('Recalcular método') }}</button>
</form>
<form class="form" method="post" action="/project/{{$data['id']}}/delete">
    @csrf
    @method('post')
    <button type="submit" class="btn btn-danger btn-md">{{ __('Excluir Projeto') }}</button>
</form>