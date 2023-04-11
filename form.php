<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>télécharger un fichier - serveur avec PHP </title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <h1>Charger un fichier </h1>

    <div class="container_in">
        <form action="destination.php" method = "POST" enctype = "multipart/form-data">
            <div class="input">
                <input type="file" name="fichier_a_envoyer" id="fichier_a_envoyer">
            </div>
            <div class="input">
                <button type="submit">ENVIAR</button>
            </div>
        </form>
    </div>
    
    <div class="container_out" id= "container_out">
        <?php
            if($_GET){
                $message = $_GET['message'];
                echo '<p class="msg" id="msg">'. $message . '</p>';
            }
        ?>
    </div>

    <script src="main.js"></script>
</body>
</html>