<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Factura</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 5px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .cont {
            width: 50%;
        }
    </style>
</head>

<body>
    <h1>Reporte de Factura</h1>


    @if ($venta_pdf)
        <p><strong>Direccion:</strong> {{ $venta_pdf->razon_social }} </p>
        <p><strong>Número de Factura:</strong> {{ $venta_pdf->numero_comprobante }}</p>
        <p><strong>Titulo:</strong> {{ $venta_pdf->comprobante->tipo_comprobante }} </p>
        <p><strong>Número de Factura:</strong> {{ $venta_pdf->numero_comprobante }}</p>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Descuento</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($venta_pdf->productos as $item)
                <tr>

                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->pivot->cantidad }}</td>
                    <td>{{ $item->pivot->precio_venta }}</td>
                    <td>{{ $item->pivot->descuento }}</td>
                    <td>{{ $item->pivot->cantidad * $item->pivot->precio_venta - $item->pivot->descuento }}</td>

                </tr>
                @empty($item)
                    <tr>
                        <td colspan="3">No hay datos para mostrar.</td>
                    </tr>
                @endempty
            @endforeach
            <tr>
                <td colspan="6"></td>
            </tr>
        </tbody>
        <tfoot>
            @if ($venta_pdf)
                <tr>
                    <th colspan="5" class="text-right">Subtotal</th>
                    <td id="td-subtotal ">
                        {{ $item->pivot->cantidad * $item->pivot->precio_venta - $item->pivot->descuento }}</td>
                </tr>
                <tr>
                    <th colspan="5" class="text-right">IVA 12%</th>
                    <td id="th-igv ">{{ $venta_pdf->impuesto }}</td>
                </tr>
                <tr>
                    <th colspan="5" class="text-right">Total</th>
                    <td id="th-total">{{ $venta_pdf->total }}</td>
                </tr>
            @endif
        </tfoot>
    </table>

    <p><strong>Tipo de comprobante:</strong> {{ $venta_pdf->comprobante->tipo_comprobante }}</p>

    <br>

    <p class="text-center">**Firma del Cliente**</p>
</body>

</html>
