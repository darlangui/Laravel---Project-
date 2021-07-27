@extends('layouts.app');

@section('titulo1')
    Editar Cidade: 
@endsection
@section('conteudo')
<br>
<br>
<form action="{{route('postos.update', $postos->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">CNPJ</label>
          <input type="text" class="form-control"  name="cnpj" value="{{$postos->cnpj}}" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nome</label>
          <input type="text" class="form-control" name="nome" value="{{$postos->nome}}" required>
        </div>
    </div>
      <div class="form-group">
        <label for="inputAddress">Razão Social</label>
        <input type="text" class="form-control"  name="razao" value="{{$postos->razao}}" required>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Bandeira</label>
        <input type="text" class="form-control"  name="bandeira" value="{{$postos->bandeira}}" required>
      </div>
      <div class="form-row">
        <div class="row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Endereço</label>
              <input type="text" class="form-control"  name="endereco" value="{{$postos->endereco}}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Bairro</label>
              <input type="text" class="form-control" name="bairro" value="{{$postos->bairro}}" required>
            </div>
        </div>
        <br>
        <div class="form-group col-md-4">
          <label for="inputEstado">Cidade</label>
          <select id="inputEstado" class="form-control" name="cidades_id" required>
            <option selected>Escolher...</option>
            @foreach ($cidades as $cidades)
                    <option value="{{$cidades->id}}"> {{$cidades->nome}} </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="col-lg-12" style="text-align: right;">
        <button type="submit" class="btn btn-success"> Alterar </button>
      </div>
  </form>
  @if ($errors->any())
  <div class="alert alert-danger">
    <strong> Atenção </strong>
    Cidade não cadastrada devido aos seguintes erros: 
    <ul>
    @foreach ($errors->all() as $erro)
    <li> {{$erro}} </li>
    @endforeach
    </ul>
  </div>  
@endif
@endsection