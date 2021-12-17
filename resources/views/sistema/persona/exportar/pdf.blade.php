<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Listar Personas</title>
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
        <h1>Personas</h1>
    </header>

    <main>
        <table class="resp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Número celular</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                <tr>
                    <td>{{ $persona->PK_ID_persona }}</td>
                    <td>{{ $persona->NO_persona }}</td>
                    <td>{{ $persona->AP_paterno_persona }} {{ $persona->AP_materno_persona }}</td>
                    <td>
                        @if ($persona->TI_sexo == '1')
                        Masculino
                        @else
                        Femenino
                        @endif
                    </td>
                    <td>{{ $persona->NU_dni }}</td>
                    <td>{{ $persona->NU_celular }}</td>
                    <td>{{ $persona->DI_persona }}</td>
                    <td>{{ $persona->IM_persona}}</td>
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