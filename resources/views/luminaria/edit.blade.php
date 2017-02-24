@extends('layout.layout')

@section('content')


@if (isset($success))
  <div class="row">
      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading"> {{$success}}
              </div>
          </div>
      </div>
  </div>
@endif
  <div class="row">
    <div class="col-md-8 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Luminária<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Essa interface é utilizada para registrar uma luminária."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
              {{ csrf_field() }}
              {!! Form::model($luminaria, ['method' => 'PATCH','route' => ['luminaria.update', $luminaria->luminaria_id], 'class' => 'form-horizontal']) !!}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
                      <label for="modelo" class="col-md-4 control-label">Modelo da Luminária</label>

                      <div class="col-md-6">
                          <input id="modelo" type="text" class="form-control" name="modelo" value="{{ $luminaria->modelo }}">

                          @if ($errors->has('modelo'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('modelo') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('potencia') ? ' has-error' : '' }}">
                      <label for="potencia" class="col-md-4 control-label">Potência</label>

                      <div class="col-md-6">
                          <input id="potencia" type="text" class="form-control" name="potencia" value="{{ $luminaria->potencia }}">

                          @if ($errors->has('potencia'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('potencia') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                      <label for="descricao" class="col-md-4 control-label">Descrição</label>

                      <div class="col-md-6">
                          <input id="descricao" type="text" class="form-control" name="descricao" value="{{ $luminaria->descricao }}">

                          @if ($errors->has('descricao'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('descricao') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('luminaria_letra') ? ' has-error' : '' }}">
                      <label for="luminaria_letra" class="col-md-4 control-label">Letra de Utilização</label>
                    <div class="col-md-2">
                      <select class="form-control" id="luminaria_letra" name="luminaria_letra">
                        <?php
                        for($i=65;$i<91;$i++) {  ?>
                          <option value=" <?php echo  chr($i); ?>"> <?php echo  chr($i); ?> </option>
                       <?php  } ?>
                      </select>
                      @if ($errors->has('luminaria_letra'))
                          <span class="help-block">
                              <strong>{{ $errors->first('luminaria_letra') }}</strong>
                          </span>
                      @endif
                    </div>
                  </div>



                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Atualizar Luminária
                          </button>
                      </div>
                  </div>


                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>

@endsection
