@extends('layouts.app');
    @section('titulo1')
        Relatório dos Preços em determinado Posto
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
        <form action="{{url('/relatorios/listaPrecosPostos')}}" method="get">
            
                <div class="form-group col-md-4">
                  <label for="inputEstado">Escolha o posto: </label>
                  <select id="inputEstado" class="form-control" name="id" required>
                    <option selected>Escolher...</option>
                    @foreach ($postos as $postos)
                            <option value="{{$postos->id}}"> {{$postos->nome}} </option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-12" style="text-align: right;">
                <button type="submit" class="btn btn-success"> Pesquisar </button>
              </div>
          </form>
        <br>
        @if ($precos_postos!=null)
        <div class="table-responsive">
            <table class="table table-bordered">
                <caption>  Preços cadastrados neste posto </caption>
                <thead>
                  <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Tipo de Combustível </th>
                    <th scope="col"> Preço de Venda </th>
                    <th scope="col"> Posto </th>
                    <th scope="col"> Data de Coleta do Preço </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($precos_postos as $precos)
                  <tr>
                    <th scope="row"> {{$precos->id}} </th>
                    <td>{{$precos->tipo}}</td>
                    <td>{{$precos->precov}}</td>
                    <td>{{$precos->postos->nome}}</td>
                    <td>{{implode("/",array_reverse(explode("-",$precos->coleta)));}}</td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
          </div>     
        @endif
        <br><br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <caption>  Postos Cadastradas </caption>
                
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
                @foreach ($postos1 as $postos1)
                  <tr>
                    <th scope="row"> {{$postos1->id}} </th>
                    <td>{{$postos1->cnpj}}</td>
                    <td>{{$postos1->razao}}</td>
                    <td>{{$postos1->nome}}</td>
                    <td>{{$postos1->bandeira}}</td>
                    <td>{{$postos1->endereco}}</td>
                    <td>{{$postos1->bairro}}</td>
                    <td>{{$postos1->cidades->nome}}</td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
          </div> 
     
    @endsection