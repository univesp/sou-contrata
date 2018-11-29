@extends('layouts.header')
@section('title')
    Cadastro de Professores
@endsection
@section('css')
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('cabecalho')
    ÁREA DE INTERESSE
@endsection
@section('username')
    {{ "Bem vindo, ". Session::get('user')['user'] }}
@endsection
@section('content')
    <div class="container">
		<ul class="nav nav-tabs">
            {{-- <li><a href="{{ route('personal-data.index') }}">Dados Pessoais</a></li> --}}
            <li class="disabled"><a href="#">Dados Pessoais</a></li>
            {{-- <li><a href="{{ route('professorAcademicData') }}">Dados Academicos</a></li> --}}
            <li class="disabled"><a href="#">Dados Academicos</a></li>
            <li class="active, link3"><a href="{{ route('professorPosition', ['id' => Session::get('vagueId')]) }}">Área de Interesse</a></li>
		</ul>
        <div class="vague-information">
            <p class="ob, cor-campo">*Obrigatório</p>
            <p>Você esta se credenciando</p>
            <p><strong>{{$data->title}}</strong></p>
            Requisitos
            <ul>
                <li>Docente nas universidades conveniadas com a Univesp</li>
                <li>Minimo: Título de Doutor</li>
            </ul>
        </div>
		<hr/>

       

            <div class="row">

                <div class="float-right">
                    <button type="submit" class="btn btn-danger">AVANÇAR</button>
                </div>
            </div>
           <br /><br />
            </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  @endsection
