@extends('layouts.app');
    @section('titulo1')
        CIDADES 
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
        <a href="{{url('cidades/create')}}"> <button type="button" class="btn btn-outline-success"> Cadastrar </button> </a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <caption>  Cidades Cadastradas </caption>
                <thead>
                  <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Nome </th>
                    <th scope="col">UF </th>
                    <th scope="col"> CEP </th>
                    <th scope="col" colspan="2"> Opções </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($cidades as $cidades)
                  <tr>
                    <th scope="row"> {{$cidades->id}} </th>
                    <td>{{$cidades->nome}}</td>
                    <td>{{$cidades->uf}}</td>
                    <td>{{$cidades->cep}}</td>
                    <td> <a href="{{url('cidades/'.$cidades->id.'/edit')}}"> <button type="button" class="btn btn-outline-primary btn-sm"> Editar </button> </a></td>
                    <td>
                        <form action="{{route('cidades.destroy', $cidades->id)}}" method="POST">
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
  
