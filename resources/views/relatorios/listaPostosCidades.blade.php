@extends('layouts.app');
    @section('titulo1')
        Relatório de Postos em uma determinada Cidade  
    @endsection
    @section('titulo2')
        
    @endsection

    @section('conteudo')
    @if ($message=Session::get('success'))
    <div class='alert alert-success'>
       <p> {{$message}} </p>
     </div>
   @endif 
        <br>
        <form action="{{url('/relatorios/listaPostosCidades')}}" method="get">
            
                <div class="form-group col-md-4">
                  <label for="inputEstado">Escolha a cidade: </label>
                  <select id="inputEstado" class="form-control" name="id" required>
                    <option selected>Escolher...</option>
                    @foreach ($cidades as $cidades)
                            <option value="{{$cidades->id}}"> {{$cidades->nome}} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-success"> Pesquisar </button>
              </div>
          </form>
        <br>
        <br>
        @if ($postos_cidades!=null)
        <div class="table-responsive">
            <table class="table table-bordered">
                <caption>  Postos cadastrados nessa cidade </caption>
                <thead>
                  <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> CNPJ </th>
                    <th scope="col"> Razão Social </th>
                    <th scope="col"> Nome Fantasia </th>
                    <th scope="col"> Bandeira </th>
                    <th scope="col"> Endereço </th>
                    <th scope="col"> Bairro </th>
                    <th scope="col"> Cidade </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($postos_cidades as $postos)
                  <tr>
                    <th scope="row"> {{$postos->id}} </th>
                    <td>{{$postos->cnpj}}</td>
                    <td>{{$postos->razao}}</td>
                    <td>{{$postos->nome}}</td>
                    <td>{{$postos->bandeira}}</td>
                    <td>{{$postos->endereco}}</td>
                    <td>{{$postos->bairro}}</td>
                    <td>{{$postos->cidades->nome}}</td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
          </div>     
        @endif
    @endsection