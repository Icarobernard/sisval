<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="/pita/{{$data['id']}}/edit">
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
                                    <input disabled type="text" name="name" class="form-control" placeholder="{{ __('Nome do projeto...') }}" value="{{ $data['name'] }}" required>
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
                                    <input disabled type="text" name="responsible" class="form-control" placeholder="{{ __('Responsáveis do projeto...') }}" value="{{ $data['responsible'] }}" required>
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
                            @if ($data['method']=='Pita')
                            <div class="criterion">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <label class="form-check-label"> Custo de manutenção da patente</label>
                                        </span>
                                        <input type="number" name="maintenance" class="form-control" value="{{ $method->maintenance }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="criterion">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <label class="form-check-label"> Plegal</label>
                                        </span>
                                        <input step="0.01" type="number" name="concession" class="form-control" value="{{ $method->concession }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="criterion">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <label class="form-check-label"> Taxa</label>
                                        </span>
                                        <input step="0.01" type="number" name="tax" class="form-control" value="{{ $method->tax }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="criterion">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <label class="form-check-label"> Tempo de utilização da tecnologia</label>
                                        </span>
                                        <input type="number" name="period" class="form-control" value="{{ $method->period }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="criterion">
                                <div class="input-group input-group-static mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <label class="form-check-label"> NPT</label>
                                        </span>
                                    </div>
                                    <select title="Nível de Prontidão Tecnológica da Patente (NPT)" name="npt" class="form-control" id="exampleFormControlSelect1">
                                        <option value="{{$method->npt}}">Nível {{$method->npt}}</option>
                                        <option value="1">Nível 1</option>
                                        <option value="2">Nível 2</option>
                                        <option value="3">Nível 3</option>
                                        <option value="4">Nível 4</option>
                                        <option value="5">Nível 5</option>
                                        <option value="6">Nível 6</option>

                                    </select>
                                </div>
                            </div>
                            <div class="criterion">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">
                                            Escolha o critério da margem de contribuição
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pmargem == 'low' ? "checked" :null}} title="Pmargem: Baixo prêmio no critério margem de contribuição (Pmargem)" class="form-check-input" type="radio" name="contribution" id="inlineRadio1" value="low">
                                            Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pmargem == 'medium' ? "checked" :null}} title="Pmargem: Moderado prêmio no critério margem de contribuição" class="form-check-input" type="radio" name="contribution" id="inlineRadio2" value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pmargem == 'high' ? "checked" :null}} title="Pmargem: Alto prêmio no critério margem de contribuição" class="form-check-input" type="radio" name="contribution" id="inlineRadio1" value="high">Alto
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="criterion">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">
                                            Escolha o critério da margem de volume (Pvolume)
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pvolume == 'low' ? "checked" :null}} title="Pvolume: Baixo prêmio no critério volume" class="form-check-input" type="radio" name="volume" id="inlineRadio1" value="low"> Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pvolume == 'medium' ? "checked" :null}} title="Pvolume: Moderado prêmio no critério volume" class="form-check-input" type="radio" name="volume" id="inlineRadio2" value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pvolume == 'high' ? "checked" :null}} title="Pvolume: Alto prêmio no critério volume" class="form-check-input" type="radio" name="volume" id="inlineRadio1" value="high">Alto
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="criterion">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text">
                                            Escolha o critério na baixa necessidade de investimento em nova planta industrial
                                        </label>
                                    </div>

                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pinvestimento == 'low' ? "checked" :null}} class="form-check-input" type="radio" name="investment" id="inlineRadio1" value="low"> Baixo
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pinvestimento == 'medium' ? "checked" :null}} class="form-check-input" type="radio" name="investment" id="inlineRadio2" value="medium"> Moderado
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input {{$method->pinvestimento == 'high' ? "checked" :null}} class="form-check-input" type="radio" name="investment" id="inlineRadio1" value="high">Alto
                                            <span class="circle">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                    <label class="input-group-text">
                                        ou investimento em equipamentos. (Pinvestimento)
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{$method->id}}">
                            @endif
                        </div>
                        <div class="card-footer justify-content-center">
                            <button type="submit" class="btn btn-primary btn-md">{{ __('Recalcular projeto') }}</button>
                </form>
                <form class="form" method="post" action="/project/{{$data['id']}}/delete">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-danger btn-md">{{ __('Excluir projeto') }}</button>
                </form>
            </div>
        </div>
    </div>
    @include('project.methods.pita.info')
</div>