<div class="bmd-form-group">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">content_paste</i>
            </span>
        </div>
        <input disabled type="text" name="name" class="form-control" placeholder="{{ __('Nome do projeto...') }}" value="{{ $data['name'] }}" required>
    </div>
</div>
<div class="bmd-form-group mt-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">people</i>
            </span>
        </div>
        <input disabled type="text" name="responsible" class="form-control" placeholder="{{ __('Responsáveis do projeto...') }}" value="{{ $data['responsible'] }}" required>
    </div>
</div>
<div class="bmd-form-group mt-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">mail</i>
            </span>
        </div>
        <input disabled type="text" name="email" class="form-control" value="{{ $data['email'] }}" required>
    </div>
</div>
<div class="bmd-form-group mt-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">phone</i>
            </span>
        </div>
        <input disabled type="text" name="phone" class="form-control" value=" {{ $data['phone'] }}" required>
    </div>
</div>
<div class="bmd-form-group mt-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">content_paste</i>
            </span>
        </div>
        <input disabled type="text" name="method" class="form-control" value="{{ $data['method'] }}" required>
    </div>
</div>
<div class="bmd-form-group mt-3">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="material-icons">people</i>
            </span>
        </div>
        <input disabled type="text" name="" class="form-control" value="Editado pelo administrador: {{ $data['admin'] }}" required>
    </div>
</div>
<input hidden name="admin" value="auth()->user()->name" />
<hr class="mt-5">