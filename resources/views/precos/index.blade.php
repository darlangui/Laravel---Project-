@extends('layouts.app');
    @section('titulo1')
        PREÇOS 
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
        <a href="{{url('precos/create')}}"> <button type="button" class="btn btn-outline-success"> Cadastrar </button> </a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered">
                <caption>  Preços Cadastradas </caption>
                <thead>
                  <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> Tipo de Combustível </th>
                    <th scope="col"> Preço de Venda </th>
                    <th scope="col"> Posto </th>
                    <th scope="col"> Data de Coleta do Preço </th>
                    <th scope="col" colspan="2"> Opções </th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($precos as $precos)
                  <tr>
                    <th scope="row"> {{$precos->id}} </th>
                    <td>{{$precos->tipo}}</td>
                    <td>{{$precos->precov}}</td>
                    <td>{{$precos->postos->nome}}</td>
                    <td>{{implode("/",array_reverse(explode("-",$precos->coleta)));}}</td>
                    <td> <a href="{{url('precos/'.$precos->id.'/edit')}}"> <button type="button" class="btn btn-outline-primary btn-sm"> Editar </button> </a></td>
                    <td>
                        <form action="{{route('precos.destroy', $precos->id)}}" method="POST">
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