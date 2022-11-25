@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Cadastrar projeto')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                <form class="form" method="POST" action="{{ route('project.fcd') }}">
                    @csrf
                    @method('post')

                    <div class="card card-login card-hidden mb-3">
                        <a href={{route('registerProject')}}><i title="Voltar" style="padding-left: 10px; padding-top: 10px" class="fa fa-arrow-left"></i> </a>
                        <div class="card-header text-center">
                            <h4 class="card-title"><strong>{{ __('Cálculo método FCD') }}</strong></h4>
                        </div>
                        @if (Request::input('period'))
                        <div class="card-body ">
                            @for ($i = 1; $i <= Request::input('period'); $i++) <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    {{$i}}
                                    <input type="number" name="data[]" class="form-control" placeholder="{{ __('Informe o valor do período ') }}{{$i}}" value="" required>
                                </div>
                                @endfor
                        </div>
                        @else
                        <div class="card-body ">
                            <div class="bmd-form-group mt-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-list-ol"></i>
                                        </span>
                                    </div>
                                    <input type="number" step="0.01" name="tax" class="form-control" placeholder="{{ __('Informe a taxa...') }}" value="" required>
                                </div>
                                <div class="bmd-form-group mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="number" name="period" class="form-control" placeholder="{{ __('Informe a quantidade de período (meses/anos)...') }}" value="" required>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="card-footer justify-content-center">
                                <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Próximo') }}</button>
                            </div>
                        </div>
                        <input type="hidden" name="data[]" class="form-control" placeholder="{{ __('Informe o valor do período ') }}" value="" required>
                        <input type="hidden" name="calculated" class="form-control" placeholder="{{ __('Responsáveis do projeto...') }}" value="0" hidden>
                        <input type="hidden" class="form-check-input" type="text" name="method" value="{{ $data['method'] }}">
                        <input type="hidden" name="name" class="form-control" placeholder="{{ __('Nome do projeto...') }}" value="{{ $data['name'] }}" hidden>
                        <input type="hidden" name="responsible" class="form-control" placeholder="{{ __('Responsáveis do projeto...') }}" value="{{ $data['responsible'] }}" required>
                </form>
            </div>
            @include('project.methods.fcd.info')
        </div>

    </div>
</div>
</div>
@endsection