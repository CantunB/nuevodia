<div class="card mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('Sympathizers.search') }}">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" name="fecha1" id="fecha1" class="form-control" id="inputPassword2" required>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="fecha2" id="fecha2" class="form-control" id="inputPassword2" required>
                        </div>
                        <div class="col-md-3">
                            <select name="movilizador" class=" select2 form-control" data-toggle="select2" id="movilizador" required>
                                <option value="" selected disabled> SELECCIONA UN MOVILIZADOR</option>
                                @foreach($movilizadores as $movilizador)
                                    <option value="{{ $movilizador->getInfo->id }}">
                                        {{ $movilizador->getInfo->nombre .' '. $movilizador->getInfo->paterno .' '. $movilizador->getInfo->materno }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="SUBMIT" class="btn btn-success waves-effect waves-light mb-2">BUSCAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end card-body-->
</div> <!-- end card-->
