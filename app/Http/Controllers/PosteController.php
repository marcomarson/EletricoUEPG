<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rede;
use App\Poste;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
      return view('poste.create')->with('poste', $poste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
        return view('poste.create')->with('poste', $poste);
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
      'poste_numero' => 'required|numeric',
      'derivacao_numero'=> 'required|unique:rede'
    ]);
    try {
      $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $date=  \App\Data::create([
          'data_ativa'=> 'false'
        ]);
        $poste=Poste::create([
          'poste_ativo'=> 'false'
        ]);

         Rede::create([
           'poste_id' => $poste->poste_id,
           'poste_numero' => $equip['poste_numero'],
           'derivacao_numero' => $equip['derivacao_numero'],
           'data_id' => $date->data_id,
         ]);


        $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
        return view('poste.create')->with('poste', $poste)->with('success','Poste cadastrado com sucesso');


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
    $poste = Poste::where('poste_id',$id)->first();
    return view('poste.edit')->with('poste', $poste);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $teste = Rede::find($id)->poste()->first();
      $teste2 = Rede::find($id)->data()->first();
      if(!is_null($teste) or !is_null($teste2)){
        Rede::find($id)->update([
          'poste_ativo' => false
        ]);

      }else {
        Rede::find($id)->delete();
        Poste::find($id)->delete();
        \App\Data::find($teste2)->delete();
      }
      $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
      return view('poste.create')->with('poste', $poste)->with('success','Poste de Rede deletado com sucesso');
    }
}
