<div class="card mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form  action="{{ route('Mobilizers.search') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <input type="date" name="fecha1" id="fecha1" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <input type="date" name="fecha2" id="fecha2" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <select name="lider" class="searchlider form-control"id="lider1" required>
                                <option selected disabled> Selecciona un lider</option>
                                @foreach($lideres as $lider)
                                    <option value="{{ $lider->getInfo->id }}">{{$lider->getInfo->nombre.' '. $lider->getInfo->paterno .' '. $lider->getInfo->materno}}
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
</div>
