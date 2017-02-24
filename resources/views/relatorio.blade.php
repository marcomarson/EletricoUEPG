<?php

$date = str_replace('/', '-', $datafrom);
$datefrom= date('Y-m-d', strtotime($date));

$date = str_replace('/', '-', $datato);
$dateto= date('Y-m-d', strtotime($date));
if ( $autoclave_id=="" and $admin_id=="" and $disciplina_id=="" ){
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('data_final', NULL)->count();

  $escrita = "Este relatório foi gerado levando em consideração o período de ".$datafrom." e ".$datato.".";

}else if($autoclave_id=="" and $admin_id==""){
  $conjuntoteste=\App\Conjunto::where('disciplina_id',$disciplina_id)->first();
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('conjunto_id',$conjuntoteste['conjunto_id'])->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('conjunto_id',$conjuntoteste['conjunto_id'])->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->whereDate('data_inicio', '>=', $datefrom)->whereDate('data_retirada', '<=', $dateto)->where('conjunto_id',$conjuntoteste['conjunto_id'])->where('data_final', NULL)->count();


  $dis=\App\Disciplina::where('disciplina_id',$disciplina_id)->first();
  $escrita = "Este relatório foi gerado levando em consideração a disciplina ".$dis['disciplina_nome']." no período de ".$datafrom." e ".$datato.".";


}else if($admin_id=="" and $disciplina_id=="") {
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('data_final', NULL)->count();

  $clave=\App\Autoclave::where('autoclave_id',$autoclave_id)->first();
  $escrita = "Este relatório foi gerado levando em consideração a autoclave ".$clave['marca']." no período de ".$datafrom." e ".$datato.".";


}else if($autoclave_id=="" and $disciplina_id=="") {
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('data_final', NULL)->count();

  $lab= \App\Admin::where('admin_id',$admin_id)->first();
  $escrita = "Este relatório foi gerado levando em consideração  a laboratorista ".$lab['nome']." no período de ".$datafrom." e ".$datato.".";


}else if($disciplina_id=="")  {
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('admin_id',$admin_id)
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('data_final', NULL)->count();

  $clave=\App\Autoclave::where('autoclave_id',$autoclave_id)->first();
  $lab= \App\Admin::where('admin_id',$admin_id)->first();

  $escrita = "Este relatório foi gerado levando em consideração a autoclave ".$clave['marca'].", a laboratorista ".$lab['nome']."  no período de ".$datafrom." e ".$datato.".";


}else if($autoclave_id=="")  {
    $conjuntoteste=\App\Conjunto::where('disciplina_id',$disciplina_id)->first();
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('admin_id',$admin_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('admin_id',$admin_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('admin_id',$admin_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('data_final', NULL)->count();


  $lab= \App\Admin::where('admin_id',$admin_id)->first();
  $dis=\App\Disciplina::where('disciplina_id',$disciplina_id)->first();

  $escrita = "Este relatório foi gerado levando em consideração a laboratorista ".$lab['nome'].", e a disciplina ".$dis['disciplina_nome']." no período de ".$datafrom." e ".$datato.".";


}else if($admin_id=="")  {
    $conjuntoteste=\App\Conjunto::where('disciplina_id',$disciplina_id)->first();
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)->whereDate('data_retirada', '<=', $dateto)->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)->whereDate('data_retirada', '<=', $dateto)->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)->whereDate('data_retirada', '<=', $dateto)->where('data_final', NULL)->count();

  $clave=\App\Autoclave::where('autoclave_id',$autoclave_id)->first();
  $dis=\App\Disciplina::where('disciplina_id',$disciplina_id)->first();
  $escrita = "Este relatório foi gerado levando em consideração a autoclave ".$clave['marca']." e a disciplina ".$dis['disciplina_nome']." no período de ".$datafrom." e ".$datato.".";


}else {
    $conjuntoteste=\App\Conjunto::where('disciplina_id',$disciplina_id)->first();
  $esterilizacao = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('admin_id',$admin_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->get();

  $esterilizacaocontador = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('admin_id',$admin_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->count();

  $falha = \App\Esterilizacao::join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->where('autoclave_id',$autoclave_id)->where('admin_id',$admin_id)->where('conjunto_id',$conjuntoteste['conjunto_id'])
  ->whereDate('data_inicio', '>=', $datefrom)-> whereDate('data_retirada', '<=', $dateto)->where('data_final', NULL)->count();



  $clave=\App\Autoclave::where('autoclave_id',$autoclave_id)->first();
  $lab= \App\Admin::where('admin_id',$admin_id)->first();
  $dis=\App\Disciplina::where('disciplina_id',$disciplina_id)->first();
  $escrita = "Este relatório foi gerado levando em consideração a autoclave ".$clave['marca'].", a laboratorista ".$lab['nome'].", e a disciplina ".$dis['disciplina_nome']." no período de ".$datafrom." e ".$datato.".";

}


//$q->whereDate('created_at', '=', date('Y-m-d'));

?>
<style>
    <?php include(public_path().'/css/bootstrap.min.css');?>
    <?php include(public_path().'/css/sb-admin.css');?>
</style>
<div class="container">
  <div id="page-wrapper">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <h1 align="center">Relatório Geral de Esterilizações</h1>
          </div>
        </div>
        <h5> {{ $escrita }} </h5>

          <!-- /.col-lg-12 -->
      </div>
      <!-- /.row -->
      <div class="row">
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-blue">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa fa-tasks fa-5x"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{ $esterilizacaocontador}}</div>
                              <div>Esterilizações Feitas</div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <div class="col-lg-3 col-md-6">
              <div class="panel panel-blue">
                  <div class="panel-heading">
                      <div class="row">
                          <div class="col-xs-3">
                              <i class="fa  fa-exclamation-triangle fa-5x" aria-hidden="true"></i>
                          </div>
                          <div class="col-xs-9 text-right">
                              <div class="huge">{{ $falha}}</div>
                              <div>Falhas Encontradas</div>
                          </div>
                      </div>
                  </div>

              </div>
          </div>
</div>
  <div class="row">
    <div class="col-lg-12 ">
      <table id="myTable" class="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th class="col-md-1" align="center">Esterilização ID</th>
            <th  class='col-md-1' align="center">Nome do Cliente</th>
            <th  class="col-md-1" align="center">Data de Início</th>
            <th  class="col-md-1" align="center">Data de Retirada</th>
            <th  class="col-md-1" align="center">Autoclave</th>
          </tr>
        </thead>
      <tbody>

          @if(!$esterilizacao->isEmpty())
            @foreach($esterilizacao as $key => $value)
              <tr>
                <td align="center">
                  {{$value->esterilizacao_id}}
                </td>
                <td align="center">
                  {{$value->nome}}
                </td>
                <td align="center">
                  {{$value->data_inicio}}
                </td>
                <td align="center">
                  {{$value->data_retirada}}
                </td>
                <td align="center">
                  {{$value->autoclave_id}}
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de esterilizações</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
