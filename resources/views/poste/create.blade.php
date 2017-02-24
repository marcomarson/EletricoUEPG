@extends('layout.layout')

@section('content')


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
    <div class="col-md-8 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Registrar Poste de Rede<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Essa interface é utilizada para registrar um poste."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/poste') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('poste_numero') ? ' has-error' : '' }}">
                      <label for="poste_numero" class="col-md-4 control-label">Número do Poste</label>

                      <div class="col-md-6">
                          <input id="poste_numero" type="text" class="form-control" name="poste_numero" value="{{ old('poste_numero') }}">

                          @if ($errors->has('poste_numero'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('poste_numero') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="form-group{{ $errors->has('derivacao_numero') ? ' has-error' : '' }}">
                      <label for="petala_nome" class="col-md-4 control-label">Número da Derivação</label>

                      <div class="col-md-6">
                          <input id="derivacao_numero" type="text" class="form-control" name="derivacao_numero" value="{{ old('derivacao_numero') }}">

                          @if ($errors->has('derivacao_numero'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('derivacao_numero') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>






                  <div class="form-group">
                      <div class="col-md-offset-5 col-md-1">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Poste
                          </button>
                      </div>
                  </div>


                </form>

            </div>
        </div>
    </div>
</div>
  <div class="row">
    <div class="col-md-8 col-md-offset-1">



      <form name="form" class="col-md-13" action="{{ url('/getposte') }}" method="get">
      <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca pelo nome do equipamento" name="equipamento_nome" title="Digite um nome">
      <br>
      <div class="form-group">
          <div class="col-md-offset-5 col-md-1">
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-sign-in"></i> Buscar Poste
              </button>
          </div>
      </div>
      </form>

      <table id="myTable" class="table table-responsive table-striped table-hover" style="margin-bottom:60px;">
        <thead>
          <tr>
            <th class="col-md-1">Número do Poste</th>
            <th class="col-md-1">Derivação</th>
            <th class='col-md-1'>Luminária 1</th>
            <th class='col-md-1'>Luminária 2</th>
            <th class="col-md-1">Status</th>
          </tr>
        </thead>
        <tbody>

          @if(!$poste->isEmpty())
            @foreach($poste as $key => $value)
              <tr>
                <td>
                  {{$value->poste_numero}}
                </td>
                <td>
                  {{$value->derivacao_numero}}
                </td>
                <td>
                  {{$value->luminaria1}}
                </td>
                <td>
                  {{$value->luminaria2}}
                </td>
                <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['poste.destroy', $value->poste_id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                  <a class="btn btn-primary" href="{{ route('poste.edit',$value->poste_id) }}">Editar</a>

                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de postes</td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>

</div>
@endsection
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

</script>
