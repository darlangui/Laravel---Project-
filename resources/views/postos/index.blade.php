@extends('layouts.app');
    @section('titulo1')
        POSTOS 
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
        <a href="{{url('postos/create')}}"> <button type="button" class="btn btn-outline-success"> Cadastrar </button> </a>
        <br>
        <br>
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
                    <th scope="col" colspan="2"> Opções </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($postos as $postos)
                  <tr>
                    <th scope="row"> {{$postos->id}} </th>
                    <td>{{$postos->cnpj}}</td>
                    <td>{{$postos->razao}}</td>
                    <td>{{$postos->nome}}</td>
                    <td>{{$postos->bandeira}}</td>
                    <td>{{$postos->endereco}}</td>
                    <td>{{$postos->bairro}}</td>
                    <td>{{$postos->cidades->nome}}</td>
                    <td> <a href="{{url("postos/". $postos->id ."/edit")}}"> <button type="button" class="btn btn-outline-primary btn-sm"> Editar </button> </a></td>
                    <td>
                        <form action="{{route('postos.destroy', $postos->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm"> Excluir </button>
                        </form>
                    </td>
                  </tr>
                  @endforeach 
                </tbody>
              </table>
          </div>     
    @endsection