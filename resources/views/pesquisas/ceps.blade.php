@extends('adminlte::page')
@section('title', 'Busca CEPS')
@section('content_header')
    <h1>Busca CEP</h1>

    <ol class="breadcrumb">
        <li><a href="">dashboard</a></li>
        <li><a href="">Busca Ceps</a></li>
    </ol>
@stop
@section('content')
    <div class="box">
        <div class="box-header">
            <!-- <form action="{{ route('pesquisa.BuscaCeps')}}" method="POST" class="form form-inline"> -->
            <form action="#" class="form form-inline">
                <!-- {!! csrf_field() !!} -->
                <input type="text" name="cep" class="form-control numeroDoCepDigitadoPeloUsuario" placeholder="Cep"> 
                <!-- <button type="submit" class="btn btn-primary">Pesquisar</button> -->
                <button class="btn btn-primary buscarCepBtn">Pesquisar</button>
            </form>
        </div>
        <div class="box-body">     
        <h3>Endereço: </h3>          
        <div class="card" style="width: 27rem;">

            <ul class="list-group list-group-flush informacoesDoCep">

            </ul>

            <!-- @if(isset($ceps))
                <div class="card-header">
                    Endereço: 
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$ceps['cep']}}</li>

                </ul>
            @else
            @endif -->
        </div>
    </div>
@stop

@section('js')
    <script>
        $( document ).ready(function() {
            $( ".buscarCepBtn" ).click(function(event) {
                event.preventDefault();

                var numeroDoCep = $(".numeroDoCepDigitadoPeloUsuario").val()

                $.get("http://api.postmon.com.br/v1/cep/"+numeroDoCep, function(data, status){
                    $( ".informacoesDoCep" ).append('<li class="list-group-item">'+"<b>CEP:</b> "+data.cep+'</li>');
                    $( ".informacoesDoCep" ).append('<li class="list-group-item">'+"<b>Estado:</b> "+data.estado+'</li>');
                    $( ".informacoesDoCep" ).append('<li class="list-group-item">'+"<b>Cidade:</b> "+data.cidade+'</li>');
                    $( ".informacoesDoCep" ).append('<li class="list-group-item">'+"<b>Bairro:</b> "+data.bairro+'</li>');
                    $( ".informacoesDoCep" ).append('<li class="list-group-item">'+"<b>Rua:</b> "+data.logradouro+'</li>');
                });
            });
        });
    </script>
@stop