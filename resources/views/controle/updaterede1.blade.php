@extends('layout.layout')
@section('content')
<style>
select {
  text-indent: 1px;
  text-overflow: '';
  width:70px !important;
    height: 30px !important;
  margin-left: 4.5cm;
}
table p{
  text-align: center;
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
      <div class="panel-heading">Atualizar Poste de Rede<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-question-circle fa-2x"></i></a></div>
    </div>

    {{ csrf_field() }}
      {!! Form::model($poste, ['method' => 'PATCH','route' => ['atualiza.update', $poste->poste_id], 'class' => 'form-horizontal']) !!}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group{{ $errors->has('poste_numero') ? ' has-error' : '' }}">
          <label for="poste_numero" class="col-md-4 control-label">Número do Poste</label>

          <div class="col-md-6">
              <label for="poste_numero" class="col-md-4 control-label"> {{ $poste->poste_numero }}</label>
          </div>
      </div>
      <div class="form-group{{ $errors->has('derivacao_numero') ? ' has-error' : '' }}">
          <label for="derivacao_numero" class="col-md-4 control-label">Número da Derivação</label>

          <div class="col-md-6">
                <label for="derivacao_numero" class="col-md-4 control-label"> {{ $poste->derivacao_numero }}</label>
          </div>
      </div>
      <div class="form-group{{ $errors->has('lamp1') ? ' has-error' : '' }}">
          <label for="derivacao_numero" class="col-md-4 control-label">Luminária 1</label>

          <div class="col-md-6">
            <select  id="lamp1" name="lamp1">
              <option value="100">X</option>
              @foreach ($luminaria->all() as $lamp)
              <option value="{{$lamp->luminaria_id}}"> {{$lamp->luminaria_letra }} </option>
              @endforeach
            </select>
          </div>
          @if ($errors->has('lamp1'))
              <span class="help-block">
                  <strong>{{ $errors->first('lamp1') }}</strong>
              </span>
          @endif
      </div>

      <div class="form-group{{ $errors->has('lamp1') ? ' has-error' : '' }}">
          <label for="derivacao_numero" class="col-md-4 control-label">Luminária 2</label>

          <div class="col-md-6">
            <select  id="lamp2" name="lamp2">
              <option value="100">X</option>
              @foreach ($luminaria->all() as $lamp)
              @if ($poste->luminaria1 == $lamp->luminaria_letra)

                <option default value="{{$lamp->luminaria_id}}"> {{$lamp->luminaria_letra }} </option>
              @else
                <option value="{{$lamp->luminaria_id}}"> {{$lamp->luminaria_letra }} </option>
              @endif
              @endforeach
            </select>
          </div>
          @if ($errors->has('lamp2'))
              <span class="help-block">
                  <strong>{{ $errors->first('lamp2') }}</strong>
              </span>
          @endif
      </div>


      <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Atualizar Poste de Rede
                          </button>
                      </div>
                  </div>
      {!! Form::close() !!}


  </div>
</div>
@endsection
