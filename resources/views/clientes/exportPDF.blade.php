<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        body {
            font-family: 'Helvetica';
            font-size: 10px;
        }
        .container {
            width: 100%;
            max-width: 1024px;
        }
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .card_indicator {
            position: relative;
        }
        .indicator {
            display: block;
            font-size: 4rem;
            font-weight: 700;
            color: #2f2f2f;
        }
        .legend {
            font-weight: 700;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: .05rem;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            padding: 4px;
        }
        .table {
            margin-bottom: 2rem;
        }
        .table tr {
            border-bottom: 1px solid rgba(0,0,0,.225);
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2
        }
        .table-bordered, .table-bordered td, .table-bordered th {
            border-collapse: collapse;
            border: 1px solid black !important;
        }
        .mb-4, .my-4 {
            margin-bottom: 1.5rem!important;
        }
        .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: .25rem;
            padding: 1rem;
        }
        .card .card-header {
            background: #fff;
            padding: 0 0 .5rem 0;
        }
        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
        }
        .card-header {
            padding: .75rem 1.25rem;
            margin-bottom: 0;
            color: inherit;
            background-color: rgba(0,0,0,.03);
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        small, small {
            font-size: 80%;
            font-weight: 400;
        }
        .text-center {
            text-align: center !important;
        }
    </style>
</head>
<body>
    <b>DETALLE DE CLIENTES - DORINA</b>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>Telefono</th>
                    <th>E-mail</th>
                    <th>Dirección</th>
                    <th>Producto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>
                        {{$cliente->id }}
                    </td>
                    <td>
                        {{ $cliente->nombre}} {{ $cliente->apellidoPaterno}}  {{$cliente->apellidoMaterno}}
                    </td>
                    <td>
                        {{ $cliente->rfc}}
                    </td>
                    <td>
                        {{ $cliente->telefono}}
                    </td>
                    <td>
                        {{ $cliente->correo}}
                    </td>
                    <td>
                        {{ $cliente->direccion}}
                    </td>
                    <td>
                        {{ $cliente->getProducto->nombre}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</html>
