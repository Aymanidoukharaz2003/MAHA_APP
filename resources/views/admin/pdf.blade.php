<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>le produit : {{ $produit->name }} </h1>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom Produit</th>
                <th>N°_serie</th>
                <th>Déscription</th>
            </tr>
        </thead>
        <tbody>
            @foreach($echantillons as $echantillon)
            <tr>
                <td>{{$loop->index+1 }}</td>
                <td>
                    @if($echantillon->produit)
                     {{ $echantillon->produit->name }}
                    @else
                    Aucun produit associé
                    @endif
                </td>
                <td>{{$echantillon->nserie}}</td>
                <td>{{$echantillon->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
