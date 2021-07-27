<?php
namespace App\Http\Controllers;

use App\Models\Cidades;
use Illuminate\Http\Request;

class CidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cidades = Cidades::all();
        return view('cidades/index', compact('cidades'));
    }

    /**s
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cidades/cadastrar');
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
            'nome'=> 'required|min:3|max:100',
            'uf'=>'required',
            'cep'=>'required|min:5|numeric'
            
        ];

        $msgs = [
            'required' => 'O preenchimento do campo [:attribute] é obrigatório',
            'min' => 'O campo [:attribute] tem como minimo de caracteres [:min]',
            'max' => 'O campo [:attribute] tem como maximo de caracteres [:max]',
            'numeric' => 'O campo [:attribute] aceita somente caracteres numerais'
        ];

        $request->validate($regras, $msgs);
        
        Cidades::create($request->all());
        return redirect('cidades')->with('success', 'Cidade cadastrada com sucesso');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */

    
    public function show(Cidades $cidades)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cidades = Cidades::find($id);
        return view('cidades/edit', compact('cidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $regras =[
            'nome'=> 'required|min:3|max:100',
            'uf'=>'required',
            'cep'=>'required|min:5|numeric'
            
        ];

        $msgs = [
            'required' => 'O preenchimento do campo [:attribute] é obrigatório',
            'min' => 'O campo [:attribute] tem como minimo de caracteres [:min]',
            'max' => 'O campo [:attribute] tem como maximo de caracteres [:max]',
            'numeric' => 'O campo [:attribute] aceita somente caracteres numerais'
        ];

        $request->validate($regras, $msgs);
        
        $cidades = Cidades::find($id);
        $cidades->update($request->all());
        return redirect('cidades')->with('success', 'Cidade alterada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cidades  $cidades
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cidades = Cidades::find($id);
        $cidades->delete();
        return redirect('cidades');
    }

    public function listaPostosCidades(Request $request){
        $cidades = Cidades::all();
        $cidadeescolhida = Cidades::find($request->id);
        if(isset($cidadeescolhida->postos_cidades))
            $postos_cidades = $cidadeescolhida->postos_cidades;
        else    
            $postos_cidades = null;
        return view('relatorios/listaPostosCidades' ,compact("cidades", "postos_cidades"));
    }
}
