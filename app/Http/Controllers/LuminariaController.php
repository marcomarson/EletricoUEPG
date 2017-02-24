<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\luminaria;

class luminariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $luminaria = Luminaria::orderBy('luminaria_letra', 'asc')->get();
      return view('luminaria.create')->with('luminaria', $luminaria);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $luminaria = Luminaria::orderBy('luminaria_letra', 'asc')->get();
      return view('luminaria.create')->with('luminaria', $luminaria);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $equip=$request->all();
    $this->validate($request, [
      'modelo' => 'required|string',
      'potencia'=> 'required|numeric',
      'luminaria_letra' => 'required|unique:luminaria'

 ]);
    try {
        Luminaria::create([
           'modelo' => $equip['modelo'],
           'descricao' => $equip['descricao'],
           'potencia' => $equip['potencia'],
           'luminaria_letra' => $equip['luminaria_letra']
         ]);
         $luminaria = Luminaria::orderBy('luminaria_letra', 'asc')->get();
         return view('luminaria.create')->with('luminaria', $luminaria)->with('success','Luminaria cadastrada com sucesso');


     } catch (Exception $ex) {
         return 'erro';
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $luminaria = Luminaria::where('luminaria_id',$id)->first();
    return view('luminaria.edit')->with('luminaria', $luminaria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $equip=$request->all();
      $this->validate($request, [
        'modelo' => 'required|string|',
        'potencia'=> 'required|numeric',
        'luminaria_letra' => 'required|unique:luminaria,luminaria_letra,'.$id.',luminaria_id'

 ]);
      try{

            Luminaria::where('luminaria_id', $id)->update([
              'modelo' => $equip['modelo'],
              'descricao' => $equip['descricao'],
              'potencia' => $equip['potencia'],
              'luminaria_letra' => $equip['luminaria_letra']

            ]);

            $luminaria = Luminaria::orderBy('luminaria_letra', 'asc')->get();
            return view('luminaria.create')->with('luminaria', $luminaria)->with('success','Luminaria atualizada com sucesso');

      } catch (Exception $ex) {
          return 'erro';
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id){
       $teste = luminaria::find($id)->poste()->first();
       if(!is_null($teste)){
         Luminaria::find($id)->update([
           'luminaria_ativa' => false
         ]);

       }else {
         Luminaria::find($id)->delete();
       }
       $luminaria = Luminaria::orderBy('luminaria_letra', 'asc')->get();
       return view('luminaria.create')->with('luminaria', $luminaria)->with('success','Luminaria deletada com sucesso');
     }


     public function getequipamento(Request $request)
     {
       $equip=$request->all();
       $x=$equip['equipamento_nome'];
       $equipamento = Equipamento::where('equipamento_nome','LIKE',  "%$x%")->where('equipamento_ativo',true)->get();
       return view('equipamento.create')->with('equipamento', $equipamento)->with('success','Busca realizada com sucesso');
     }
}
