<div class="tab-pane show active" id="aboutme">
    <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
        REGISTROS DE CAPTURA</h5>
    <div class="table-responsive">
        <table class="table table-borderless mb-0">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Lideres</th>
                <th>Mov.</th>
                <th>Toc.</th>
                <th>Prop.</th>
                <th>Toc S/C</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach($created_at as $key => $date)
            <tr>
                <td style="text-align: center">{{$loop->iteration}}</td>
                <td style="text-align: center">{{$date->created_at->toDateString()}}</td>
                <td style="text-align: center">{{$lideres[$key]}}</td>
                <td>{{$movilizadores[$key]}}</td>
              <!--  <td><span class="badge badge-info">Work in Progress</span></td> -->
                <td>{{$tocados[$key]}}</td>
                <td>{{$propietarios[$key]}}</td>
                <td>{{$simpatizantes[$key]}}</td>
                <td>{{$total[$key]}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div> <!-- end tab-pane -->
<!-- end about me section content -->
