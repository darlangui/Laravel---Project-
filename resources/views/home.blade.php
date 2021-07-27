@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Opções') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Relatórios <br> 
                    <br>
                    <a href="{{url('relatorios/listaPrecosPostos')}}"> <button type="button" class="btn btn-outline-primary btn-sm"> Listagem dos preços por postos </button>
                    <br><br>
                    <a href="{{url('relatorios/listaPostosCidades')}}"> <button type="button" class="btn btn-outline-primary btn-sm"> Listagem de postos por cidade </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
