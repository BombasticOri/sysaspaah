<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Listar Eventos</title>
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
        <h1>Eventos</h1>
    </header>

    <main>
        <table class="resp">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre evento</th>
                    <th scope="col">Lugar</th>
                    <th scope="col">Fecha inicio</th>
                    <th scope="col">Fecha fin</th>
                    <th scope="col">Descripcion</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                <tr>
                    <td>{{ $evento->PK_ID_eventos }}</td>
                    <td>{{ $evento->NO_eventos }}</td>
                    <td>{{ $evento->NO_lugar }}</td>
                    <td>{{ $evento->FE_inicio }}</td>
                    <td>{{ $evento->FE_fin }}</td>
                    <td>{{ $evento->DE_eventos }}</td>
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