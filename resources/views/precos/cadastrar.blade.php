@extends('layouts.app');

@section('titulo1')
    Editar Preço: 
@endsection
@section('conteudo')
<br>
<br>
<form action="{{route('precos.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Tipo de Combustível</label>
          <input type="text" class="form-control"  name="tipo" placeholder="Digite o tipo de combustível" value="{{old('tipo')}}" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputPassword4">Preço de Venda</label>
          <input type="text" class="form-control" name="precov" placeholder="Digite o preço de venda"  value="{{old('precov')}}" required>
        </div>
    </div>
      <div class="form-group">
        <label for="inputAddress">Data de Coleta</label>
        <input type="date" class="form-control"  name="coleta"  value="{{old('coleta')}}" required>
      </div>
      <div class="form-row">
        <br>
        <div class="form-group col-md-4">
          <label for="inputEstado">Posto</label>
          <select id="inputEstado" class="form-control" name="postos_id" required>
            <option selected>Escolher...</option>
            @foreach ($postos as $postos)
                    <option value="{{$postos->id}}"> {{$postos->nome}} </option>
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
