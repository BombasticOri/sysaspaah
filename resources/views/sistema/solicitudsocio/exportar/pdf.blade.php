<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Listar Solicitudes</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Courier, "Lucida Console", monospace;
        }
        body {
            margin: 3cm 2cm 2cm;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #b36b50;
            color: white;
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #b36b50;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        table {
            width: 100%;
            background: white;
            margin-bottom: 1.25em;
            border: solid 1px #dddddd;
            border-collapse: collapse;
            border-spacing: 0;
        }
        table tr th,
        table tr td {
            padding: 0.5625em 0.625em;
            font-size: 0.875em;
            color: #222222;
            border: 1px solid #dddddd;
            text-align: center;
        }
        table tr.even,
        table tr.alt,
        table tr:nth-of-type(even) {
            background: #f9f9f9;
        }
    </style>
</head>

<body>
    <header>
        <h1>Solicitudes de Socios</h1>
    </header>

    <main>
        <table class="resp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Estado Solicitud</th>
                    <th scope="col">Fecha de ingreso</th>
                    <th scope="col">ID/Telefono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->PK_ID_sol_socio }}</td>
                    <td>{{ $solicitud->NO_solicitante }}</td>
                    <td>{{ $solicitud->AP_paterno_solicitante }}{{ $solicitud->AP_materno_solicitante }}</td>
                    <td>
                        @if ($solicitud->ES_solicitud == '0')
                        Proceso
                        @elseif($solicitud->ES_solicitud == '1'))
                        Aprobado
                        @else
                        No aprobado
                        @endif
                    </td>
                    <td>{{ $solicitud->FE_creado}}</td>
                    <td>{{ $solicitud->FK_ID_persona}}, {{$solicitud->persona->NU_celular}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        <h1>Grupo - 5</h1>
    </footer>
</body>

</html>