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
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
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
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total {
            font-weight: bold;
        }
        @media print {
            body {
                width: 210mm; /* Largeur d'une page standard */
                height: auto;
            }
            .container {
                width: 190mm; /* Largeur du contenu de la facture */
                padding: 10mm;
                margin: 0;
                border: none;
                background-color: #fff;
            }
            /* Ajoutez d'autres styles pour l'impression si nécessaire */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Facture</h1>
        <table>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Produit</th>
                    <th>Prix unitaire</th>
                    <th>Quantité</th>
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
                    <td>{{ $product['total'] }} FC</td>
                </tr>
                @endforeach
                <tr class="total">
                    <td colspan="4" style="text-align: right;">Total général :</td>
                    <td>{{ $totalGeneral }} FC</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
