<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8" />
 <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>{{$mov}}</title>
<style>
    @page {
    size: auto;/* es el valor por defecto */
     margin-top: 1.5cm;
    margin-bottom: 1.5cm; 
    }
    table {
        border: black 2px solid;
        border-collapse: collapse;
        width: 100%;
    }
</style>
</head>
    <body>
        <div>
            <table class="table table-sm" border="1">
                <thead>
                    <tr>
                    <th align="left">{{$mov}}</th>
                    <th>DIRECCION</th>
                    <th>CELULAR</th>
                    <th colspan="2">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tocados as $key => $tocado)
                        <tr>
                            <td>{{$tocado->getInfo->nombre}} {{$tocado->getInfo->paterno}} {{$tocado->getInfo->materno}}</td>
                            <td>CALLE {{$tocado->getInfo->calle}} {{$tocado->getInfo->cruzamiento}} {{$tocado->getInfo->no_ext}} {{$tocado->getInfo->no_int}} {{$tocado->getInfo->colonia}} {{$tocado->getInfo->cp}}</td>
                            <td align="center"width="60px" >{{$tocado->getInfo->celular}}</td>
                            <td width="50px" align="center" >SI</td>
                            <td width="50px" align="center">NO</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>