@extends('index')
@section('machote')
<body>
<br>
    <div class="container">
    <div class="row">
    <table class="table table-bordered">
  <thead class="thead-dark" align="center">
    <tr>
      <th scope="col">Folio</th>
      <th scope="col">Motivo</th>
      <th scope="col">Monto</th>
      <th scope="col">Departamento</th>
      <th scope="col">Tipo</th>
      <th scope="col">Fecha de Comprobación</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody align="center">
@foreach($vales as $val)
    <tr>
      <th scope="row">{{$val->Folio}}</th>
      <td>{{$val->Motivo}}</td>
      <td>${{$val->Monto}}</td>
      <td>{{$val->Departamento}}</td>
      <td>{{$val->Tipo}}</td>
      <td>{{date('d-M-Y', strtotime($val->Fecha_Comprobar))}}</td>
      <td>
      <button type="button" class="btn btn-outline-success">
      <i class="fa fa-check-square-o" aria-hidden="true"></i> Comprobar Vale</button>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
    </div>
    </div>
</body>
<body>
  
</body>
@stop