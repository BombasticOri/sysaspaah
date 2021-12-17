<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .header {
            background-color: #f1f1f1;
            padding: 30px;
            text-align: center;
            font-size: 35px;
        }
        .row {
            display: flex;
            flex-direction: column;
        }
        .column {
            padding: 10px;
            height: 450px;
        }
        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }
        @media (max-width: 900px) {
            .row {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>foto</h2>
    </div>

    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <table style="border: hidden">
                <tbody style="border: hidden">
                    <tr style="border: hidden">
                        <td style="border: hidden">DATOS PERSONALES:</td>
                        <td style="border: hidden"></td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr style="border: hidden">
                        <td style="border: hidden">Nombres:</td>
                        <td style="border: hidden">{{$socio->persona->NO_persona}}</td>
                    </tr>
                    <tr style="border: hidden">
                        <td style="border: hidden">Apellidos:</td>
                        <td style="border: hidden">{{$socio->persona->AP_materno_persona}} {{$socio->persona->AP_paterno_persona}}</td>
                    </tr>
                    <tr style="border: hidden;">
                        </td>
                        <td style="border: hidden;">DNI:</td>
                        <td style="border: hidden">{{$socio->persona->NU_dni}}</td>
                    </tr>
                    <tr style="border: hidden;">
                        </td>
                        <td style="border: hidden;">Teléfono:</td>
                        <td style="border: hidden">{{$socio->persona->NU_celular}}</td>
                    </tr>
                    <tr style="border: hidden;">
                        </td>
                        <td style="border: hidden;">Género:</td>
                        <td style="border: hidden">
                            @if ($socio->persona->TI_sexo == '1')
                            Masculino
                            @else
                            Femenino
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr style="border: hidden">
                        <td style="border: hidden">DIRECCIÓN:</td>
                        <td style="border: hidden">{{$socio->persona->DI_persona}}</td>
                    </tr>
                    <tr>
                        <td><br></td>
                    </tr>
                    <tr style="border: hidden;">
                        </td>
                        <td style="border: hidden;">Comunidad de:</td>
                        <td style="border: hidden">{{$socio->comunidad->NO_comunidad}}</td>
                    </tr>
                    <tr style="border: hidden;">
                        </td>
                        <td style="border: hidden;">Distrito de:</td>
                        <td style="border: hidden">{{$socio->comunidad->distrito->NO_distrito}}</td>
                    </tr>
                    <tr style="border: hidden;">
                        </td>
                        <td style="border: hidden;">Provincia de:</td>
                        <td style="border: hidden">{{$socio->comunidad->distrito->provincia->NO_provincia}}</td>
                    </tr>
                    <tr style="border: hidden;">
                        </td>
                        <td style="border: hidden;">Departamento de:</td>
                        <td style="border: hidden">
                            {{$socio->comunidad->distrito->provincia->departamento->NO_departamento}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footer">
        Firma del socio
    </div>
    <div class="footer">
        <hr width="300px">
    </div>
    <div class="footer">
        Firma del Presidente
    </div>
    <div class="footer">
        <hr width="200px">
    </div>
</body>

</html>