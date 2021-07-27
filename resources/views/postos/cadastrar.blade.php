@extends('layouts.app');

@section('titulo1')
    Cadastrar Cidade: 
@endsection
@section('conteudo')
<br>
<br>
<form action="{{route('postos.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">CNPJ</label>
          <input type="text" class="form-control"  name="cnpj" placeholder="Digite o CNPJ" value="{{old('cnpj')}}" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Nome</label>
          <input type="text" class="form-control" name="nome" placeholder="Digite o nome fantasia" value="{{old('nome')}}" required>
        </div>
    </div>
      <div class="form-group">
        <label for="inputAddress">Razão Social</label>
        <input type="text" class="form-control"  name="razao" placeholder="Digite a Razão Social" value="{{old('razao')}}" required>
      </div>
      <div class="form-group">
        <label for="inputAddress2">Bandeira</label>
        <input type="text" class="form-control"  name="bandeira" placeholder="Digite a bandeira (marca da distribuidora)" value="{{old('bandeira')}}" required>
      </div>
      <div class="form-row">
        <div class="row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Endereço</label>
              <input type="text" class="form-control"  name="endereco" placeholder="Digite o endereço" value="{{old('endereco')}}" required>
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Bairro</label>
              <input type="text" class="form-control" name="bairro" placeholder="Digite o bairro" value="{{old('bairro')}}" required>
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
        <button type="submit" class="btn btn-success"> Cadastrar </button>
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