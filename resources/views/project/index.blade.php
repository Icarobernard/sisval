@extends('layouts.app', ['activePage' => 'project', 'titlePage' => __('Projetos')])

@section('content')
<div class="content">
    <script>
        function redirect(id) {
            return window.location.href = '/project/' + id
        }
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="card-header card-header-primary">
                        <a href="{{ route('registerProject') }}""><button type=" button" class="btn btn-primary">Cadastrar projeto</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="">
                                    <th>
                                        Nome do projeto
                                    </th>
                                    <th>
                                        Responsáveis
                                    </th>
                                    <th>
                                        Método
                                    </th>
                                    <th>
                                        Cálculo
                                    </th>
                                    <th>
                                        Editado por
                                    </th>
                                    <th>
                                        Data de criação
                                    </th>

                                </thead>
                                <tbody>
                                    @foreach($data as $value)
                                    <tr style="cursor: pointer" onclick="redirect( {{ $value['id'] }} );">
                                        <td>
                                            {{ $value['name'] }}
                                        </td>
                                        <td>
                                            {{ $value['responsible'] }}
                                        </td>
                                        <td>
                                            {{ $value['method'] }}
                                        </td>
                                        <td>
                                            <b>R$ {{number_format($value['calculated'] , 2, ',', '.') }} </b>
                                        </td>
                                        <td>
                                            {{ $value['admin'] }}
                                        </td>
                                        <td>
                                            {{date_format($value['created_at'],"d/m/Y H:i:s") }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection