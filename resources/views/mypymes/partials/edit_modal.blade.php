<<<<<<< HEAD
<div class="modal fade" id="EditModalMypymes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR INFORMACION MYPYMES</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
=======
<div class="modal fade" id="EditModalMypymes" data-backdrop="static"   tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">ACTUALIZAR INFORMACION MYPYMES</h4>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                   <form id="form_mypymes_edit" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Fecha</label>
<<<<<<< HEAD
                            <input type="date" class="form-control" id="date_edit" name="date" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
=======
                            <input type="hidden" class="form-control" id="id_edit" required>
                            <input type="date" class="form-control" id="date_edit" name="date" required>
                        </div>
                        <div class="form-group col-md-8">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                            <label for="name_promoter">PROMOTOR</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_promoter_edit" name="name_promoter" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
<<<<<<< HEAD
                            <label for="distrito">DISTRITO</label>
                            <input type="text" class="form-control" id="distrito_edit" name="distrito" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="seccion">SECCION</label>
                            <input type="text" class="form-control" id="seccion_edit" name="seccion" required minlength="3" maxlength="3">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name_commerce">NOMBRE COMERCIO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_commerce_edit" name="name_commerce" >
                        </div>
                        <div class="form-group col-md-12">
=======
                            <label for="example-select">SECCION</label>
                                <select class="form-control select2" id="seccion_edit" name="seccion" required>
                                    <option selected value="null" disabled>SECCION</option>
                                    @foreach($secciones as $seccion)
                                        <option value="{{ $seccion->seccion_electoral }}">{{ $seccion->seccion_electoral }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="example-select">DISTRITO</label>
                                <select class="form-control" name="distrito" id="distrito_edit">
                                <option selected value="null" disabled>DISTRITO</option>
                                </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name_commerce">NOMBRE COMERCIO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_commerce_edit" name="name_commerce" >
                        </div>
                        <div class="form-group col-md-6">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                            <label for="turn">GIRO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="turn_edit" name="turn" >
                        </div>
                        <div class="form-group col-md-10">
                            <label for="name_owner">PROPIETARIO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_owner_edit" name="name_owner" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="votantes">+18</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="votantes_edit" name="votantes">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="calle">CALLE</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="calle_edit" name="calle">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cruzamiento">CRUZAMIENTO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="cruzamiento_edit" name="cruzamiento">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="no_ext">NO.EXT</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="no_ext_edit" name="no_ext">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="no_int">NO.INT</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="no_int_edit" name="no_int">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="colonia">COLONIA</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="colonia_edit" name="colonia">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp">C.P</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="cp_edit" name="cp" minlength="5" maxlength="5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="celular">CELULAR</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="celular_edit" name="celular" minlength="10" maxlength="10">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">CORREO</label>
                            <input onkeyup="mayus(this);" type="email" class="form-control" id="email_edit" name="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="social_network">RED SOCIAL</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="social_network_edit" name="social_network">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gestion">GESTION</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="gestion_edit" name="gestion" value="SIN GESTION">
                        </div>
                            <div class="form-group col-lg-6">
                                    <label>AREAS</label>
<<<<<<< HEAD
                                    <select class="js-example-basic-multiple" id="areas_edit"name="areas[]" multiple="multiple">
                                        <option>SIN AREA</option>
=======
                                    <select class="js-example-basic-multiple" id="areas_edit"name="areas[]" multiple="multiple" required>
                                        <option value="" selected>SIN AREA</option>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                                        <option value="OBRAS PUBLICAS">OBRAS PUBLICAS</option>
                                        <option value="DESARROLLO SOCIAL">DESARROLLO SOCIAL</option>
                                        <option value="SMAPAC">SMAPAC</option>
                                        <option value="SERVICIOS PUBLICOS">SERVICIOS PUBLICOS</option>
                                        <option value="TESORERIA">TESORERIA</option>
                                        <option value="DESARROLLO URBANO">DESARROLLO URBANO</option>
                                        <option value="SEGURIDAD PUBLICA">SEGURIDAD PUBLICA</option>
                                        <option value="GOBERNACION">GOBERNACION</option>
                                        <option value="SECRETARIA DEL AYUNTAMIENTO">SECRETARIA DEL AYUNTAMIENTO</option>
                                    </select>
                            </div>
<<<<<<< HEAD
=======
                            <div class="form-group col-md-4">
                                <label for="observation">ESTADO DEL COMERCIO</label>
                                <select class="form-control" name="trade_status" id="trade_status_edit" required>
                                            <option selected value="" disabled>SELECCIONA UNA OPCION</option>
                                            <option value="ABIERTO">ABIERTO</option>
                                            <option value="CERRADO">CERRADO</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="observation">SIMPATIZANTE</label>
                                <select class="form-control" name="sympathizer" id="sympathizer_edit">
                                            <option selected value="" disabled>SELECCIONA UNA OPCION</option>
                                            <option value="SIMPATIZA">SIMPATIZA</option>
                                            <option value="NO SIMPATIZA">NO SIMPATIZA(Otro partido)</option>
                                            <option value="NO INTERESADO">NO INTERESADO</option>

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="observation">INFORMACION DEL DUEÑO</label>
                                <select class="form-control" name="stay" id="stay_edit">
                                            <option selected value="" disabled>SELECCIONA UNA OPCION</option>
                                            <option value="SE ENCONTRABA">SE ENCONTRABA</option>
                                            <option value="NO SE ENCONTRABA">NO SE ENCONTRABA</option>
                                </select>
                        </div>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                        <div class="form-group col-md-12">
                            <label for="observation">OBSERVACION</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="observation_edit" name="observation" value="SIN OBSERVACION">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">GUARDAR</button>
<<<<<<< HEAD
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" class="close" data-dismiss="modal" aria-hidden="true">Cancel</button>
=======
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" class="close" data-dismiss="modal" aria-hidden="true">CANCELAR</button>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    </div>

                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
