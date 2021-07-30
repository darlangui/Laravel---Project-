<?php

namespace App\Http\Controllers;

use App\Models\Postos;
use App\Models\Precos;
use Illuminate\Http\Request;

class PrecosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $precos = Precos::all();
        return view('precos/index', compact('precos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $postos = Postos::all();
        return view('precos/cadastrar', compact('postos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'tipo', 'coleta', 'precov', 'postos_id
        $regras =[
            'tipo'=> 'required|min:2|max:100',
            'coleta'=>'required',
           // 'nome'=>'required|min:4|max:150',
            'precov'=>'required',
        ];

        $msgs = [
            'required' => 'O preenchimento do campo [:attribute] é obrigatório',
            'min' => 'O campo [:attribute] tem como minimo de caracteres [:min]',
            'max' => 'O campo [:attribute] tem como maximo de caracteres [:max]',
            'numeric' => 'O campo [:attribute] aceita somente caracteres numerais'
        ];

        $request->validate($regras, $msgs);

        Precos::create($request->all());
        return redirect('precos/')->with('success', 'Preço cadastrado com sucesso');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Precos  $precos
     * @return \Illuminate\Http\Response
     */
    public function show(Precos $precos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Precos  $precos
     * @return \Illuminate\Http\Response
     */
    public function edit(Precos $precos, $id)
    {
        //
        $postos = Postos::all();
        $precos = Precos::find($id);
        return view("precos/edit",compact("precos"),compact("postos"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Precos  $precos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $regras =[
            'tipo'=> 'required|min:2|max:100',
            'coleta'=>'required',
            'precov'=>'required',
        ];

        $msgs = [
            'required' => 'O preenchimento do campo [:attribute] é obrigatório',
            'min' => 'O campo [:attribute] tem como minimo de caracteres [:min]',
            'max' => 'O campo [:attribute] tem como maximo de caracteres [:max]',
            'numeric' => 'O campo [:attribute] aceita somente caracteres numerais'
        ];

        $request->validate($regras, $msgs);

        $precos = Precos::find($id);
        $precos->update($request->all());
        return redirect("precos")->with('success', 'Preço alterado com sucesso');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Precos  $precos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $precos = Precos::find($id); //reconhece o id
        $precos->delete();
        return redirect('precos');
    }
}
