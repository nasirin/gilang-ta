<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        h2,
        h4 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2>{{$title}}</h2>
    <h4>{{$date}}</h4>

    <table>
        <tr>
            <th>#</th>
            <th>Barang</th>
            <th>Satuan</th>
            <th>Qty</th>
            <th>Harga satuan</th>
            <th>Total</th>
        </tr>
        <tr>
            <th>1</th>
            <td>Coklat</td>
            <td>kg</td>
            <td>20</td>
            <td>Rp 2000</td>
            <td>Rp 2.000.000</td>
        </tr>
    </table>

</body>

</html>