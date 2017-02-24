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
            <div class="panel-heading">Registrar Luminária<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title="Essa interface é utilizada para registrar uma luminária."><i class="fa fa-question-circle fa-2x"></i></a></div>
            <div class="panel-body">
                {{ csrf_field() }}
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/luminaria') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group{{ $errors->has('modelo') ? ' has-error' : '' }}">
                      <label for="modelo" class="col-md-4 control-label">Modelo da Luminária</label>

                      <div class="col-md-6">
                          <input id="modelo" type="text" class="form-control" name="modelo" value="{{ old('modelo') }}">

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
                          <input id="potencia" type="text" class="form-control" name="potencia" value="{{ old('potencia') }}">

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
                          <input id="descricao" type="text" class="form-control" name="descricao" value="{{ old('descricao') }}">

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
                              <i class="fa fa-btn fa-sign-in"></i> Cadastrar Luminária
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

      <form name="form" class="col-md-13" action="{{ url('/getluminaria') }}" method="get">
      <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Busca pelo nome do equipamento" name="equipamento_nome" title="Digite um nome">
      <br>
      <div class="form-group">
          <div class="col-md-offset-5 col-md-1">
              <button type="submit" class="btn btn-primary">
                  <i class="fa fa-btn fa-sign-in"></i> Buscar Lâmpada
              </button>
          </div>
      </div>
      </form>

      <table id="myTable" class="table table-responsive table-striped table-hover" style="margin-bottom:60px;">
        <thead>
          <tr>
            <th class="col-md-1">Luminária Letra</th>
            <th class='col-md-1'>Modelo</th>
            <th class='col-md-1'>Potência</th>
            <th class='col-md-1'>Descrição</th>
            <th class="col-md-1">Status</th>
          </tr>
        </thead>
        <tbody>

          @if(!$luminaria->isEmpty())
            @foreach($luminaria as $key => $value)
              <tr>
                <td>
                  {{$value->luminaria_letra}}
                </td>
                <td>
                  {{$value->modelo}}
                </td>
                <td>
                  {{$value->potencia}}
                </td>
                <td>
                  {{$value->descricao}}
                </td>
                <td>
                  {!! Form::open(['method' => 'DELETE','route' => ['luminaria.destroy', $value->luminaria_id],'style'=>'display:inline']) !!}
                  {!! Form::submit('Deletar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                  <a class="btn btn-primary" href="{{ route('luminaria.edit',$value->luminaria_id) }}">Editar</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">Não há registros de luminárias</td>
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
