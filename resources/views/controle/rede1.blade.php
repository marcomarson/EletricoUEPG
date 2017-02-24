@extends('layout.layout')
@section('content')
<style>
select {
  text-indent: 1px;
  text-overflow: '';
  width:100px !important;
  height: 30px !important;
  margin-left: 4.5cm;
}
</style>
@if (isset($success))
  <div class="row">
      <div class="col-md-8 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading"> {{$success}}
              </div>
          </div>
      </div>
  </div>
@endif
<div class="row">
  <div class="col-md-10">
    <div class="panel panel-default">
      <div class="panel-heading">Controle dos Postes de Rede<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-question-circle fa-2x"></i></a></div>

    {{ csrf_field() }}
    <form class="form-horizontal" role="form" method="POST" action="{{ url('') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group{{ $errors->has('poste_numero') ? ' has-error' : '' }}">
          <label for="poste_numero" class="col-md-4 control-label">Número do Poste</label>

          <div class="col-md-6">
            <select  id="poste_numero" name="poste_numero"   >
              @foreach ($poste->all() as $post)
              <option value="{{$post->poste_numero}}"> {{$post->poste_numero}} </option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="form-group{{ $errors->has('derivacao_numero') ? ' has-error' : '' }}">
          <label for="petala_nome" class="col-md-4 control-label">Número da Derivação</label>

          <div class="col-md-6">
            <select  id="derivacao_numero" name="derivacao_numero">
              @foreach ($poste->all() as $post)
              <option value="{{$post->derivacao_numero}}"> {{$post->derivacao_numero}} </option>
              @endforeach
            </select>
          </div>
      </div>
      <div class="form-group">
          <div class="col-md-offset-5 col-md-1">
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-sign-in"></i> Selecionar Poste de Rede
              </button>
          </div>
      </div>


      </div>
  </div>
</div>
@endsection
