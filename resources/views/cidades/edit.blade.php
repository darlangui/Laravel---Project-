@extends('layouts.app');

@section('titulo1')
    Editar Cidade: 
@endsection

@section('conteudo')
<br>
<br>
<form action="{{route('cidades.update', $cidades->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="formGroupExampleInput">Nome</label>
      <input type="text" class="form-control" id="formGroupExampleInput" name="nome" value="{{$cidades->nome}}" required>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="inputEstado">UF</label>
            <select id="inputEstado" name="uf" class="form-control" required>
              <option selected>Escolher...</option>
              <option value="AC" name="uf">Acre</option>
              <option value="AL" name="uf">Alagoas</option>
              <option value="AP" name="uf">Amapá</option>
              <option value="AM" name="uf">Amazonas</option>
              <option value="BA" name="uf">Bahia</option>
              <option value="CE" name="uf">Ceará</option>
              <option value="DF" name="uf">Distrito Federal</option>
              <option value="ES" name="uf">Espírito Santo</option>
              <option value="GO" name="uf">Goiás</option>
              <option value="MA" name="uf">Maranhão</option>
              <option value="MT" name="uf">Mato Grosso</option>
              <option value="MS" name="uf">Mato Grosso do Sul</option>
              <option value="MG" name="uf">Minas Gerais</option>
              <option value="PA" name="uf">Pará</option>
              <option value="PB" name="uf">Paraíba</option>
              <option value="PR" name="uf">Paraná</option>
              <option value="PE" name="uf">Pernambuco</option>
              <option value="PI" name="uf">Piauí</option>
              <option value="RJ" name="uf">Rio de Janeiro</option>
              <option value="RN" name="uf">Rio Grande do Norte</option>
              <option value="RS" name="uf">Rio Grande do Sul</option>
              <option value="RO" name="uf">Rondônia</option>
              <option value="RR" name="uf">Roraima</option>
              <option value="SC" name="uf">Santa Catarina</option>
              <option value="SP" name="uf">São Paulo</option>
              <option value="SE" name="uf">Sergipe</option>
              <option value="TO" name="uf">Tocantins</option>
            </select>
          </div>
        <div class="col">
          <label for="inputEstado">CEP</label>
          <input type="text" class="form-control" name="cep" value="{{$cidades->cep}}" required>
        </div>
      </div>
      <br><br>
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



  