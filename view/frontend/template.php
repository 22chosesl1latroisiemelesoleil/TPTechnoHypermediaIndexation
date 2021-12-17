<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
    </head>
        
    <body>
        <!-- <h3>Template</h3> -->
        <!-- <h3>Nom de la view : <?= $nomdelaview ?></h3> -->
        <h1><?= $nomdelaview ?></h1>

        <?= $content ?>
        <p><a href="index.php">Retour à l'index</a></p>
        <!-- <p><a href="index.php?action=listPosts" target="_blank">TP MVC Connection db</a></p> -->
        <p><a href="index.php?action=tpindexation" target="_blank">TP 2 Indexation</a></p>
    </body>
</html>