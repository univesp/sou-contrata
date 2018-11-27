@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('cabecalho')
    CADASTRO DE PROFESSORES
@endsection
@section('username')
{{Session::get('user')->name}} 
@endsection

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cargo</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Termino</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                    @if(date_diff(date_create($d->edict->date_end), date_create(now()))->format('d') > 0)
                        <tr class="bg-danger">
                    @else
                        <tr>
                    @endif

                    <td>{{$d->title}} {{$d->matter}}</td>
                    <td>{{date_format(date_create($d->edict->date_start), 'd-m-Y')}}</td>
                    <td>{{date_format(date_create($d->edict->date_end), 'd-m-Y')}}</td>
                    <td>
                        @if(date_diff(date_create($d->edict->date_end), date_create(now()))->format('d') > '0')
                            <a href="/edict/{{$d->id}}"><button type="button" class="btn btn-info">Acessar</button></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->appends(['id' => isset($filter_id) ? $filter_id : ''])->links() }}
    </div>
@endsection

