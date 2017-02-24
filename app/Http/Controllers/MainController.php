<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Rede;
use App\Poste;
use App\Luminaria;
use App\Data;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
      return view('controle.rede1')->with('poste', $poste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
        return view('controle.rede1')->with('poste', $poste);
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
        $poste = Rede::where('poste_numero', $equip['poste_numero'])->where('derivacao_numero' , $equip['derivacao_numero'])->leftjoin('poste as pos','pos.poste_id', '=', 'rede.poste_id')->first();
        $luminaria = Luminaria::orderBy('luminaria_letra', 'asc')->get();
         return view('controle.updaterede1')->with('poste', $poste)->with('luminaria', $luminaria);
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
    //   dd("deu");
    // try{
        $equip=$request->all();
    //       Poste::where('poste_id', $id)->update([
    //         'luminaria1' => $equip['lamp1'],
    //         'luminaria2'=>$equip['lamp2'],
    //         'luminaria_id' => $equip['lamp1']
    //       ]);
          $get = Rede::where('poste_id', $id)->leftjoin('data as pos','pos.data_id', '=', 'rede.data_id')->orderBy('pos.data_id', 'desc')->first();
          $getime= Data::where('data_id', $get['data_id'])->first();
          $current_time = \Carbon\Carbon::now()->toDateTimeString();
          if($equip['lamp1'] != 100 and $equip['lamp2'] != 100){
            if(!is_null($getime['data_2']) or !is_null($getime['data_1']) ){
              Data::create([
                 'data_1' => $current_time,
                 'data_2' => $current_time,
                 'parent_data_id' => $getime['data_id'],
                 'luminaria_id' => $equip['lamp1']
               ]);
            }else {
              Data::where('data_id', $get['data_id'])->update([
                    'data_1' => $current_time,
                    'luminaria_id' => $equip['lamp1']

                  ]);
            }
            Poste::where('poste_id', %id)->update([
                  'luminaria1' => $equip['lamp1'],
                  'luminaria2' => $equip['lamp2']

                ]);
          }
          elseif($equip['lamp2'] != 100){
            if(!is_null($getime['data_2']) ){
              Data::create([
                 'data_2' => $current_time,
                 'parent_data_id' => $getime['data_id'],
                 'luminaria_id' => $equip['lamp2']
               ]);
            }else {
              Data::where('data_id', $get['data_id'])->update([
                    'data_2' => $current_time,
                    'luminaria_id' => $equip['lamp2']

                  ]);
            }
            Poste::where('poste_id', %id)->update([
                  'luminaria2' => $equip['lamp2']

                ]);

          }elseif($equip['lamp1'] != 100){
            if(!is_null($getime['data_1']) ){
              Data::create([
                 'data_1' => $current_time,
                 'parent_data_id' => $getime['data_id'],
                 'luminaria_id' => $equip['lamp1']
               ]);
            }else {
              Data::where('data_id', $get['data_id'])->update([
                    'data_1' => $current_time,
                    'luminaria_id' => $equip['lamp1']

                  ]);
            }
            Poste::where('poste_id', %id)->update([
                  'luminaria1' => $equip['lamp1']

                ]);
          }
          if($equip['lamp1'] = 100){
            if(!is_null($getime['data_1'])){
              Data::where('data_id', $get['data_id'])->update([
                    'data_queimada1' => $current_time

                  ]);
            }

          }
          if($equip['lamp2'] = 100){
          if(!is_null($getime['data_2'])){
              Data::where('data_id', $get['data_id'])->update([
                    'data_queimada2' => $current_time

                  ]);
            }
          }



        $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
        return view('controle.rede1')->with('poste', $poste)->with('success','Poste de rede atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //   $teste = Rede::find($id)->poste()->first();
    //   $teste2 = Rede::find($id)->data()->first();
    //   if(!is_null($teste) or !is_null($teste2)){
    //     Rede::find($id)->update([
    //       'poste_ativo' => false
    //     ]);
    //
    //   }else {
    //     Rede::find($id)->delete();
    //     Poste::find($id)->delete();
    //     \App\Data::find($teste2)->delete();
    //   }
    //   $poste = Rede::orderBy('poste_numero', 'asc')->where('poste_ativo', true)->get();
    //   return view('poste.create')->with('poste', $poste)->with('success','Poste de Rede deletado com sucesso');
    // }
}
