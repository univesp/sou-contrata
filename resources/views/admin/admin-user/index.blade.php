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
                        <th scope="col">Creação</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
			    <tbody>                
                    @foreach ($users as $user)                   
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->format('d/m/y') }}</td>
                            <td><a href="{{ url('admin/personal-data/edit', $user->id) }}"><button type="button" class="btn btn-danger">Perfil</button></a></td>
                        </tr>
                    @endforeach
			    </tbody>
		    </table>
        </form>
    </div>
    
    @include('layouts.footer')
@endsection

