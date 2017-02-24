@extends('layout.layout')
@section('content')
<style>
select {
  -webkit-appearance: none;
  -moz-appearance: none;
  text-indent: 1px;
  text-overflow: '';
  width:45px;
  padding-left: 35%;
}
table p{
  text-align: center;
}
</style>
<div class="row">
  <div class="col-md-10">
    <div class="panel panel-default">
      <div class="panel-heading">Rede Elétrica 01/02<a  href="#" class='pull-right' data-toggle="tooltip" data-placement="bottom" title=""><i class="fa fa-question-circle fa-2x"></i></a></div>
    </div>

    {{ csrf_field() }}
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/conjunto') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Número do poste - Tronco</th>
            @for ($i = 1; $i < 24; $i++)
            <th><p class="teste">{{$i}}</p></th>
            @endfor
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Primeira Luminária</td>
            @for ($i = 1; $i < 24; $i++)
            <td><select  id={{ "lamp".$i."_1"}} name={{ "lamp".$i."_1"}}>
              <option> </option>
              @foreach ($luminaria->all() as $lamp)
              <option value="{{$lamp->luminaria_id}}"> {{$lamp->luminaria_letra }} </option>
              @endforeach
            </select>
          </td>
          @endfor
        </tr>
        <tr>
          <td>Segunda Luminária</td>
          @for ($i = 1; $i < 24; $i++)
          <td><select id={{ "lamp".$i."_2"}} name={{ "lamp".($i)."_2"}}>
            <option> </option>
            @foreach ($luminaria->all() as $lamp)
              <option value="{{$lamp->luminaria_id}}"> {{$lamp->luminaria_letra }} </option>
            @endforeach
          </select></td>
          @endfor
        </tr>
      </tbody>
    </table>



    <table class="table table-striped">
      <thead>
        <tr>
          <th>Número do poste - Tronco</th>
          @for ($i = 24; $i < 47; $i++)
          <th><p class="teste">{{$i}}</p></th>
          @endfor
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Primeira Luminária</td>
          @for ($i = 1; $i < 24; $i++)
          <td><select  id={{ "lamp".($i+23)."_1"}} name={{ "lamp".($i+23)."_1"}}>
            <option> </option>
            @foreach ($luminaria->all() as $lamp)
            <option value="{{$lamp->luminaria_id}}"> {{$lamp->luminaria_letra }} </option>
            @endforeach
          </select>
        </td>
        @endfor
      </tr>
      <tr>
        <td>Segunda Luminária</td>
        @for ($i = 1; $i < 24; $i++)
        <td><select id={{ "lamp".($i+23)."_2"}} name={{ "lamp".($i+23)."_2"}}>
          <option> </option>
          @foreach ($luminaria->all() as $lamp)
            <option value="{{$lamp->luminaria_id}}"> {{$lamp->luminaria_letra }} </option>
          @endforeach
        </select></td>
        @endfor
      </tr>
    </tbody>
  </table>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-btn fa-edit"></i> Atualizar valores
        </button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
@endsection
