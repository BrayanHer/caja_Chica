@extends('welcome')
@section('root')

<style>

[class*=" bmd-label"], [class^=bmd-label] {
    color: rgba(0, 0, 0, 0.98);
    font-size:110%;
}
.bmd-form-group .bmd-label-static{
  font-size: .85rem;
  font-weight: bold;
}

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Caja Chica</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter">Creacion de Vale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('comprobacion')}}">Comprobacion de Vale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Historial de Vales</a>
            </li>
          </ul>
           
        </div>
        <p class="mt-2" style="color:#95a1a1;"><i class="fa fa-user"></i> &nbsp;{{Session::get('sesionname')}} &nbsp;&nbsp;</p>
     
    <a href="{{route('cerrarsesion')}}">
      <button class="btn btn-outline-success my-2 my-sm-0 mr-5" type="submit">Cerrar Sesión</button>
    </a>
</nav>

@yield('machote')
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" aria-labelledby="exampleModalCenterTitle" style="background: #040404d9;">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Creación de Vale </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <!-- |____________________________________________________________________________________________________| -->
<form action="{{route('Gvales')}}" method="POST">
{{csrf_field()}}
    <div class="modal-body">
      <strong >Folio&nbsp;&nbsp; </strong><span class="badge badge-pill badge-success">&nbsp;#{{$IdVale}}&nbsp;</span>
        <br>
          <hr>
          <input type="hidden" value="{{$IdVale}}" name="folio">
  <div class="row col-md-12">
    <div class="form-group col-md-6">
      <label>Departamento </label>
        <select class="form-control" name="departamento">
        @foreach($departamentos as $dept)
          <option value="{{$dept->ID_DEPT}}">{{$dept->Nombre}}</option>
          @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
      <label>Motivo </label>
        <select class="form-control"name="motivo">
        @foreach($motivos as $mot)
          <option value="{{$mot->ID_MOT}}">{{$mot->Motivo}}</option>
        @endforeach
        </select>
    </div>
  </div>

  <div class="row col-md-12">
    <div class="form-group col-md-6">
      <label for="formGroupExampleInput2">Monto</label>
      <input type="number" class="form-control" name="monto" placeholder="$">
    </div>
    <div class="form-group col-md-6">
      <label>Tipo</label>
      <select class="form-control" name="tipo">
        <option value="1" >Solicitud</option>
        <option value="2">Reembolso</option>
      </select>
    </div>
  </div>

  <div class="row col-md-12">
    <div class="form-group col-md-6">
      <label for="formGroupExampleInput2">Fecha de Creacion </label>
        <input type="text" class="form-control" value="<?php $date=date('d/m/Y'); echo $date; ?>" name="fechaCre" readonly>
    </div>
    <div class="form-group col-md-6">
      <label for="formGroupExampleInput2">Fecha a Comprobar </label>
        <input type="date" class="form-control" name="fechaComp">
    </div>
  </div>

    <div class="modal-footer">
      <button type="reset" class="btn btn-outline-danger">Cancelar</button> &nbsp;&nbsp;&nbsp;
      <button type="submit" class="btn btn-outline-success">Guardar Vale</button>      
    </div>

</form>
  <!-- |____________________________________________________________________________________________________| -->

    </div>
  </div>
</div>
@stop