 <!-- Modal -->
 <div class="modal fade " id="CreateModalMypymes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Nueva MYPYME</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <form id="form_mypymes" method="POST" action="{{ route('Mypymes.store') }}">
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Fecha</label>
                            <input type="date" class="form-control" id="data" name="date" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name_promoter">PROMOTOR</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_promoter" name="name_promoter" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
<<<<<<< HEAD
                            <label for="distrito">DISTRITO</label>
                            <input type="text" class="form-control" id="distrito" name="distrito" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="seccion">SECCION</label>
                            <input type="text" class="form-control" id="seccion" name="seccion" required minlength="3" maxlength="3">
=======
                            <label for="example-select">SECCION</label>
                                <select class="form-control select2" id="seccion" name="seccion" required>
                                    <option selected value="null" disabled>SECCION</option>
                                    @foreach($secciones as $seccion)
                                        <option value="{{ $seccion->seccion_electoral }}">{{ $seccion->seccion_electoral }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group col-md-4">
                                <label for="example-select">DISTRITO</label>
                                <select class="form-control" name="distrito" id="distrito">
                                <option selected value="null" disabled>DISTRITO</option>
                                </select>
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="name_commerce">NOMBRE COMERCIO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_commerce" name="name_commerce" >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="turn">GIRO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="turn" name="turn" >
                        </div>
                        <div class="form-group col-md-10">
                            <label for="name_owner">PROPIETARIO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_owner" name="name_owner" >
                        </div>
                        <div class="form-group col-md-2">
                            <label for="votantes">+18</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="votantes" name="votantes">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="calle">CALLE</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="calle" name="calle">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cruzamiento">CRUZAMIENTO</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="cruzamiento" name="cruzamiento">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="no_ext">NO.EXT</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="no_ext" name="no_ext">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="no_int">NO.INT</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="no_int" name="no_int">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="colonia">COLONIA</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="colonia" name="colonia">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cp">C.P</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="cp" name="cp" minlength="5" maxlength="5">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="celular">CELULAR</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="celular" name="celular" minlength="10" maxlength="10">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">CORREO</label>
                            <input onkeyup="mayus(this);" type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="social_network">RED SOCIAL</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="social_network" name="social_network">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gestion">GESTION</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="gestion" name="gestion" value="SIN GESTION">
                        </div>
<<<<<<< HEAD
                            <div class="form-group col-lg-6">
                                    <label>AREAS</label>
                                    <select class="js-example-basic-multiple" name="areas[]" multiple="multiple">
                                        <option selected>SIN AREA</option>
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
=======
                        <div class="form-group col-lg-6">
                                <label>AREAS</label>
                                <select class="js-example-basic-multiple" name="areas[]" multiple="multiple">
                                    <option selected>SIN AREA</option>
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
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                        
                        <div class="form-group col-md-4">
                            <label for="observation">ESTADO DEL COMERCIO</label>
                            <select class="form-control" name="trade_status" required>
                                        <option selected value="" disabled>SELECCIONA UNA OPCION</option>
                                        <option value="ABIERTO">ABIERTO</option>
                                        <option value="CERRADO">CERRADO</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="observation">SIMPATIZANTE</label>
                            <select class="form-control" name="sympathizer">
                                        <option selected value="" disabled>SELECCIONA UNA OPCION</option>
                                        <option value="SIMPATIZA">SIMPATIZA</option>
                                        <option value="NO SIMPATIZA">NO SIMPATIZA(Otro partido)</option>
                                        <option value="NO INTERESADO">NO INTERESADO</option>

                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="observation">INFORMACION DEL DUEÑO</label>
                            <select class="form-control" name="stay">
                                        <option selected value="" disabled>SELECCIONA UNA OPCION</option>
                                        <option value="SE ENCONTRABA">SE ENCONTRABA</option>
                                        <option value="NO SE ENCONTRABA">NO SE ENCONTRABA</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="observation">OBSERVACION</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="observation" name="observation" value="SIN OBSERVACION">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="user_id">Capturista</label>
<<<<<<< HEAD
                        <input type="text" readonly class="form-control" value="{{ Auth::user()->nombre }}">
=======
                        <input type="text" style="background-color: #6658dd; color: #fff;" readonly class="form-control" value="{{ Auth::user()->nombre }}">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id}}">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-success waves-effect waves-light">GUARDAR</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light m-l-10" class="close" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    </div>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
