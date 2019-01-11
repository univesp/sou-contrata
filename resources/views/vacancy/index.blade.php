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
                    <th scope="col">Cargo</th>
                    <th scope="col">Edital</th>
                    <th scope="col">Início</th>
                    <th scope="col">Término</th>
                    <th scope="col"></th>
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
                    <td>{{$d->edict->name}}</td>
                    <td>{{date_format(date_create($d->edict->date_start), 'd/m/Y')}}</td>
                    <td>{{date_format(date_create($d->edict->date_end), 'd/m/Y')}}</td>
                    <td>
                        @if(date_diff(date_create($d->edict->date_end), date_create(now()))->format('d') > '0')
                            <a href="{{route('edict',$d->edict->id)}}"><button type="button" class="btn btn-info">Acessar</button></a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->appends(['id' => isset($filter_id) ? $filter_id : ''])->links() }}
    </div>
    @include('layouts.footer')
@endsection

