<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription réussie</title>
</head>
<body>
    <table style="width: 100%; max-width: 600px; margin: 0 auto; padding: 20px; border-collapse: collapse; border: 1px solid #ccc;">
        <tr>
            <td style="text-align: center; background-color: #f8f8f8; padding: 20px;">
                <h1 style="margin: 0; color: #333;">Bienvenue sur notre site !</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p>Bonjour {{ $user->name }},</p>
                <p>Vous avez été inscrit sur notre plateforme pour la pharmacie <strong>{{ $etablissement->nom_etablissement }}</strong> avec succès.
                    <br> Voici vos coordonnées d'accès: <ul>
                        <li>email: <strong>{{ $user->email }}</strong></li>
                        <li>password: <strong>pharmapp{{ \Carbon\Carbon::now()->year }}</strong></li>
                    </ul>
                    <br>Passez à changer votre mot de passe une fois connecté
                </p>
                <p>Votre rôle est : <strong>{{ $user->getRoleNames()->first() }}</strong></p>
                <p>Merci de nous rejoindre, faites de bonnes affaires 😉</p>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; background-color: #f8f8f8; padding: 20px;">
                <p style="margin: 0; color: #666;">Cordialement,<br>Pharmapp par OpencommonHealth </p>
            </td>
        </tr>
    </table>
</body>
</html>
