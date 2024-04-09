<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <style>
        /* Styles CSS pour la facture */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 10px
        }
        .container {
            width: 40%;
        }
        h1 {
            text-align: center;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 6px;

        }

        .total {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="container">
        <h3>{{ $etablissement->nom_etablissement }}</h3>
        <h5>RCCM:{{ $etablissement->rccm }} ID Nat: {{ $etablissement->num_impot }}</h5>
        <h5>{{ $etablissement->adresse }}</h5>
        <h5>{{ $commande->updated_at }}</h5>
        <h4>Facture N°{{$commande->id}}</h4>
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Libelle</th>
                    <th>PU</th>
                    <th>Qté</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product['produit']->nom }}</td>
                    <td>{{ $product['produit']->prix }} FC</td>
                    <td>{{ $product['quantite'] }}</td>
                    <td>{{ $product['total'] }} {{ session('devise') }}</td>
                </tr>
                @endforeach
                <tr class="total">
                    <td colspan="4" style="text-align: right;">Total général :</td>
                    <td>{{ $totalGeneral }} {{ session('devise') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
