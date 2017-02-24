@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Gerar Relatórios<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Esta interface é responsavel de gerar os relatórios pretendidos, é possível escolher a data inicial, a data final, o tipo do relatório, e mais.."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/relatorios') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <!-- <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                      <label for="tipo" class="col-md-4 control-label">Tipo do Relatório</label>
                    <div class="col-md-2">
                      <select class="form-control" id="tipo" name="tipo">

                            <option value="0"> Geral </option>
                            <option value="1"> Falhas </option>
                      </select>
                    </div>
                  </div> -->
                  <div class="form-group{{ $errors->has('datafrom') ? ' has-error' : '' }}">
                      <label for="data" class="col-md-3 control-label">Data Inicial </label>
                    <div class="col-md-2">
                      <input type="text" id="datepicker" name="datafrom" class="form-control">
                      @if ($errors->has('datafrom'))
                          <span class="help-block">
                              <strong>{{ $errors->first('datafrom') }}</strong>
                          </span>
                      @endif
                    </div>
                    <label for="data" class="col-md-2 control-label">Data Final </label>
                    <div class="col-md-2">
                      <input type="text" id="datepicker2" name="datato" class="form-control">
                    </div>
                    @if ($errors->has('datato'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datato') }}</strong>
                        </span>
                    @endif
                  </div>





                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Gerar Relatório
                          </button>
                      </div>
                  </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
