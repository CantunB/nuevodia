<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion del Simpatizante</title>
</head>
<body>
    <br>
    <h2  style="background-color: #2995FA;text-align:center" >INFORMACION PERSONAL.</h2>
    <h4 style="text-align: right;">FECHA: {{now()->format('M d Y')}}</h4>
    
    <hr/>
    <p>
        <strong>NOMBRE:&nbsp;
            </strong><span style="text-decoration: underline;">{{$leader->getInfo->nombre}} {{$leader->getInfo->paterno}} {{$leader->getInfo->materno}}&nbsp;</span>
        
        <strong>&nbsp; &nbsp; &nbsp; CLAVE DE ELECTOR: </strong>
            <span style="text-decoration: underline">{{$leader->getInfo->clave_elector}}</span></p>

        <p><strong>CALLE: </strong>
            <span style="text-decoration: underline;">{{$leader->getInfo->calle}}</span>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
        
        <strong>CRUZAMIENTO:&nbsp;&nbsp;
            </strong><span style="text-decoration: underline;">{{$leader->getInfo->cruzamiento}}</span>
    </p>

    <p>
        <strong>COLONIA:&nbsp;
        </strong><span style="text-decoration: underline;">{{$leader->getInfo->colonia}}</span>&nbsp;&nbsp;
        
        <strong>No.EXT:&nbsp;</strong>
        <span style="text-decoration: underline;">{{$leader->getInfo->no_ext}}</span>&nbsp; &nbsp;&nbsp;
        
        <strong>No.INT:</strong>&nbsp;
        <span style="text-decoration: underline;">{{$leader->getInfo->no_int}}</span>    
    </p>

    <p>
        <strong>DISTRITO:</strong> 
        <span style="text-decoration: underline;">{{$leader->getInfo->distrito}}</span>&nbsp; &nbsp;&nbsp;
        
        <strong>SECCION:&nbsp;</strong>
        <span style="text-decoration: underline;">{{$leader->getInfo->seccion}}</span>&nbsp; &nbsp;
        
        <strong>C.P.: </strong>
        <span style="text-decoration: underline;">{{$leader->getInfo->cp}}</span>
    </p>

    <h3 style="background-color: #2995FA; text-align:center">SOCIAL</h3>
    <hr />
    <p>
        <strong>CELULAR:</strong> 
        <span style="text-decoration: underline;">{{$leader->getInfo->celular}}&nbsp;</span>&nbsp; 
        
        <strong>CORREO:</strong> 
        <span style="text-decoration: underline;"><a href="{{$leader->getInfo->email}}">{{$leader->getInfo->email}}</a></span>&nbsp;
        
        <strong>FACEBOOK:</strong>
        <span style="text-decoration: underline;">{{$leader->getInfo->facebook}}</span>
        
    </p>
    <h3  style="background-color: #2995FA; text-align:center" >DETALLES</h3>
    <hr />
    
    <p>
        <strong>F.NACIMIENTO:</strong>&nbsp;
            <span style="text-decoration: underline;">{{$leader->getInfo->fe_nacimiento}}</span>&nbsp;&nbsp;
            
        <strong>F.CAPTURA:&nbsp;</strong>
            <span style="text-decoration: underline;">{{$leader->getInfo->created_at->format('M d Y')}}&nbsp;</span>&nbsp;&nbsp;
        <strong>CAPTURO:&nbsp;</strong>
            <span style="text-decoration: underline;">{{$leader->getUser->nombre}}</span>
    </p>
    
    <p>
        <strong>OBSERVACIÓN:&nbsp;</strong>
            <span style="text-decoration: underline;">{{$leader->getInfo->observacion}}&nbsp;</span>
    </p>
</body>
</html>