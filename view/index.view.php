<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <div>
            <label for="nom">nom</label><br>
            <input id="nom" name="nom" type="text"></div>
        <div>
            <label for="prix">prix</label><br>
            <input id="prix" name="prix" type="number"></div>
        <div>
            <label for="description">description</label><br>
            <textarea name="description" id="description"></textarea>
        </div>
        <button type="submit" name="ajoute_submit">ajoute</button>
            
    </form>
    <hr>
    <div>
        <h2>la liste des produits.</h2>
        <ul>
        <?php foreach($products as $product ) :?>
            <li>
                nom : <?=$product['nom'] ?>------- prix : <?=$product['prix'] ?> ------description : <?=$product['description'] ?> ---- 
                <form style="display: inline-block;" action="" method="POST">
                    <input type="hidden" name="id" value="<?=$product['id'] ?>">
                    <button type="submit" name="delete">supprimer <?=$product['nom'] ?> </button>
                </form>
                
            </li>
            <hr>
        <?php endforeach ;?>
        </ul>
    </div>
</body>
</html>