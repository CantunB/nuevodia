 <!-- Modal -->
<<<<<<< HEAD
 <div class="modal fade " id="CreateModalEmpresa" tabindex="-1" role="dialog" aria-hidden="true">
=======
 <div class="modal fade " id="CreateModalEmpresa" data-backdrop="static"  tabindex="-1" role="dialog" aria-hidden="true">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Nueva Empresa</h4>
<<<<<<< HEAD
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body p-4">
                <input type="button" class="btn btn-primary waves-effect waves-ligth" onclick="myFunction()" value="Limpiar Formulario">
                <hr>
                <form id="form_empresa" method="POST">
=======
            </div>
            <div class="modal-body p-4">
                <form id="form_empresa" method="POST" action="{{ route('Empresas.store') }}">
>>>>>>> 260f8ef (Ultima actualizacion del sistema, termino del proyecto. Se necesitan corregir detalles para una previa implentacion)
                    @csrf
                    @method('POST')
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Nombre</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="direccion">Direccion</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telephone">Telefono</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name_responsable">Responsable</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="name_responsable" name="name_responsable" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="address_responsable">Direccion del responsable</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="address_responsable" name="address_responsable" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="telephone_responsable">Telefono del responsable</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="telephone_responsable" name="telephone_responsable" required>
                        </div>
                      <!--  <div class="form-group col-md-8">
                            <label for="email">Correo</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>-->
                    </div>
                    <div class="form-row">
                       <!-- <div class="form-group col-md-6">
                            <label for="rfc">RFC</label>
                            <input onkeyup="mayus(this);" type="text" class="form-control" id="rfc" name="rfc" minlength="12" maxlength="13" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="website">SitioWeb</label>
                            <input type="text" class="form-control" id="website" name="website" >
                        </div>-->
                    </div>


                   <!-- <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea type="text" class="form-control" id="description" name="description">SIN DESCRIPCION</textarea>
                    </div>-->
                    <div class="form-group col-md-4">
                        <label for="user_id">Capturista</label>
                        <input type="text" readonly class="form-control" value="{{ Auth::user()->nombre }}">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ Auth::user()->id}}">
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
