<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rede;
use App\Poste;
use App\Petala;


class PetalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $petala = \App\Petala::orderBy('petala_nome', 'asc')->where('petala_ativa', true)->get();
      return view('petala.create')->with('petala', $petala);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $petala = \App\Petala::orderBy('petala_nome', 'asc')->where('petala_ativa', true)->get();
      return view('petala.create')->with('petala', $petala);
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
      'petala_nome' => 'required',
      'petala_numero'=> 'required|numeric|unique:petala'
    ]);
    try {
      $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $date=  \App\Data::create([
          'data_ativa'=> 'false'
        ]);
        $poste=Poste::create([
          'poste_ativo'=> 'false'
        ]);

         Petala::create([
           'poste_id' => $poste->poste_id,
           'petala_nome' => $equip['petala_nome'],
           'petala_numero' => $equip['petala_numero'],
           'data_id' => $date->data_id,
         ]);


         $petala = \App\Petala::orderBy('petala_nome', 'asc')->where('petala_ativa', true)->get();
         return view('petala.create')->with('petala', $petala)->with('success','Poste pétala cadastrado com sucesso');


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
      $petala = \App\Petala::orderBy('petala_nome', 'asc')->where('petala_ativa', true)->get();
      return view('petala.create')->with('petala', $petala);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $petala = \App\Petala::where('petala_id',$id)->first();
      return view('petala.edit')->with('petala', $petala);
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
      $petala = \App\Petala::orderBy('petala_nome', 'asc')->where('petala_ativa', true)->get();
      return view('petala.create')->with('petala', $petala);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $teste = Petala::find($id)->poste()->first();
      $teste2 = Petala::find($id)->data()->first();
      if(!is_null($teste) or !is_null($teste2)){
        Petala::find($id)->update([
          'petala_ativa' => false
        ]);

      }else {
        Petala::find($id)->delete();
        Poste::find($id)->delete();
        \App\Data::find($teste2)->delete();
      }
      $petala = Petala::orderBy('petala_nome', 'asc')->where('petala_ativa', true)->get();
      return view('petala.create')->with('petala', $petala)->with('success','Poste pétala deletado com sucesso');
    }
}
