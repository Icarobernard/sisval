@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Cadastrar projeto')])

@section('content')

@if ($step == false)
@include('project.methods.royalty.form');
@else
@include('project.methods.royalty.list');
@endif


@endsection