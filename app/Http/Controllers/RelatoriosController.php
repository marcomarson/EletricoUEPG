<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PDF;

class RelatoriosController extends Controller
{
    public function index(){
      // $laboratorista = \App\Admin::all();
      // $autoclave = \App\Autoclave::all();
      // $disciplina = \App\Disciplina::where('disciplina_ativo', true)->get();
      return view('relatorios.index');
    }

    public function create(){
      $laboratorista = \App\Admin::all();
      $autoclave = \App\Autoclave::all();
      $disciplina = \App\Disciplina::where('disciplina_ativo', true)->get();
      return view('relatorios.index')->with('laboratorista', $laboratorista)->with('autoclave', $autoclave)->with('disciplina', $disciplina);
    }

    public function store(Request $request){
      $dados=$request->all();
      $this->validate($request, [
        'datafrom' => 'date|date_format:d/m/Y|before:datato'
      ]);
      //dd($esterilizacoes);
      if($dados['tipo'] == 1){
        $pdf= PDF::loadView('fail',$dados)->setPaper('a4');
        return $pdf->stream();
      }else {
        $pdf= PDF::loadView('daily',$dados)->setPaper('a4');
        return $pdf->download();
      }
      //daily vai ser relatório geral
      //fail vai ser relatório de falhas



    }
}
