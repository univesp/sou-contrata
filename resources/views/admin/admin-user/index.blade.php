@extends('layouts.header')

@section('title')
    USUÁRIO ADMINISTRADOR
@endsection

@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('content')
    @section('cabecalho')
        USUÁRIO ADMINISTRADOR
    @endsection

    @section('username')
       {{ "Bem vindo, ". Session::get('user')['user'] }}
    @endsection

    <div class="container">
        <div class="row" style="margin-top: 26px; font-size: 20px;">
            <div class="col-sm">
                <a href="{{route('home')}}" class="btn btn-danger">Pagina Inicial</a>
            </div>
        </div>
        <form id="form" name="#" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <ul class="nav nav-tabs">
                <li class="active"><a href="#">Lista de todos os usuários</a></li>
            </ul>

            <div class="form_dados"></div>
            <table id="example" class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Login</th>
                        <th scope="col">Email</th>
                        <th scope="col">Criação</th>
                        <th scope="col">Ativo</th>
                        <th scope="col"></th>
                    </tr>
                    {{ csrf_field() }}
                </thead>
			    <tbody>                
                    @foreach ($users as $user)                   
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/y') }}</td>
                            <td><input type="checkbox" class="change-status" data-id="{{$user->id}}" @if ($user->flag_ativo) checked @endif></td>
                            @if($user->flag_ativo == 1)
                                <td><a href="{{ route('admin/personal-data/edit', $user->id) }}"><button type="button" class="btn btn-danger">Perfil</button></a></td>
                            @else 
                                <td><a href="{{ route('home') }}"><button type="button" class="btn btn-danger">Perfil</button></a></td>
                            @endif
                        </tr>
                    @endforeach
			    </tbody>
		    </table>
        </form>
    </div>
    
    @include('layouts.footer')
@endsection

