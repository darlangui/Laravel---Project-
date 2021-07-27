<?php

namespace App\Http\Controllers;

use App\Models\Cidades;
use App\Models\Postos;
use Illuminate\Http\Request;


class PostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $postos = Postos::all();
        return view('postos/index', compact('postos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cidades = Cidades::all();
        return view('postos/cadastrar', compact('cidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras =[
            'cnpj'=> 'required|min:3|max:100',
            'razao'=>'required|min:4|max:150',
            'nome'=>'required|min:4|max:150',
            'bandeira'=>'required|min:2|max:100',
            'endereco'=>'required|min:2|max:100',
            'bairro'=>'required|min:3|max:100'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo [:attribute] é obrigatório',
            'min' => 'O campo [:attribute] tem como minimo de caracteres [:min]',
            'max' => 'O campo [:attribute] tem como maximo de caracteres [:max]',
            'numeric' => 'O campo [:attribute] aceita somente caracteres numerais'
        ];

        $request->validate($regras, $msgs);

        Postos::create($request->all());
        return redirect('postos/')->with('success', 'Posto cadastrado com sucesso');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function show(Postos $postos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function edit(Postos $postos, $id)
    {
        //
        $cidades = Cidades::all();
        $postos = Postos::find($id);
        return view("postos/edit",compact("postos"),compact("cidades"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //'cnpj', 'razao', 'nome', 'bandeira', 'endereco', 'bairro', 'cidades_id'
        
        $regras =[
            'cnpj'=> 'required|min:3|max:100',
            'razao'=>'required|min:4|max:150',
            'nome'=>'required|min:4|max:150',
            'bandeira'=>'required|min:2|max:100',
            'endereco'=>'required|min:2|max:100',
            'bairro'=>'required|min:3|max:100'
        ];

        $msgs = [
            'required' => 'O preenchimento do campo [:attribute] é obrigatório',
            'min' => 'O campo [:attribute] tem como minimo de caracteres [:min]',
            'max' => 'O campo [:attribute] tem como maximo de caracteres [:max]',
            'numeric' => 'O campo [:attribute] aceita somente caracteres numerais'
        ];

        $request->validate($regras, $msgs);

        $postos = Postos::find($id);
        $postos->update($request->all());
        return redirect("postos")->with('success', 'Posto alterado com sucesso');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postos  $postos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $postos = Postos::find($id); 
        $postos->delete();
        return redirect('postos');
    }

    public function listaPrecosPostos(Request $request){
        $postos = Postos::all();
        $postos1 = Postos::all();
        $postosescolhidos = Postos::find($request->id);
        if(isset($postosescolhidos->precos_postos))
            $precos_postos = $postosescolhidos->precos_postos;
        else    
            $precos_postos = null;
        return view('relatorios/listaPrecosPostos' ,compact("postos", "precos_postos", "postos1"));
    }
    
}
