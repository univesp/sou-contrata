@extends('layouts.header')
@section('title')
    CADASTRO DE PROFESSORES
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('cabecalho')
    CADASTRO DE PROFESSORES
@endsection
@section('username')
@if (Session::get('user')['user'])
    {{ "Bem vindo, ". Session::get('user')['user'] }}
@else
    {{ "Bem vindo"}}
@endif
@endsection
@section('content')

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Edital</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Início</th>
                    <th scope="col">Término</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                    <?php $diff = date_diff(date_create($d->date_end), date_create(now()));
                    ?>

                    @if($diff->format("%R%a") > 0)
                        <tr style="color: #93222a">
                    @else
                        <tr>
                    @endif

                    <td>{{$d->name}}</td>
                    <td>
                        @if($diff->format("%R%a") > 0)
                            Encerrado
                        @else
                            Ativo
                        @endif
                    </td>
                    <td>{{date_format(date_create($d->date_start), 'd/m/Y')}}</td>
                    <td>{{date_format(date_create($d->date_end), 'd/m/Y')}}</td>
                    <td>
                        <a href="{{route('edict',$d->id)}}"><button type="button" class="btn btn-info">Acessar</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->appends(['id' => isset($filter_id) ? $filter_id : ''])->links() }}
    </div>
    @include('layouts.footer')
@endsection


