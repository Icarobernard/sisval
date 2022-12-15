@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Descrição')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-6 col-sm-8 ml-auto mr-auto">
                @if ($data['method']=='Pita')
                @include('edit.pita')
                @elseif($data['method']=='Royalty Rates')
                @include('edit.royalty')
                @elseif($data['method']=='Fluxo de caixa descontado')
                @include('edit.fcd')
                @elseif($data['method']=='Sunk Cost')
                @include('edit.sunk')
                @endif
            </div>
        </div>
    </div>
    @endsection