<?php $title = 'TP 2'; ?>
<?php ob_start(); ?>
    <?php $nomdelaview = 'TP 2 Hypermédia : indexation'; ?>   
        <h2>Quel texte voulez-vous indexer ? </h2>
        <p>
        Nom des documents disponibles pour le tp dans le répertoire de test "textes": <br />
        test1, test2, test3, texte1, texte2, texte3, texte4, texte5. <br /><br />
        <strong> Liste de mots vides créée </strong> <br />
        Mots mis dans cette liste : contre, avec, pour, encore, sans, jamais, interdit. <br />

        <form action="index.php?action=tpindexation" method="post">
            <input type="text" name="source" value="Nom du document à indexer" />
            <button type="submit">Envoyerrrrrr</button>
        </form>
        </p>

        <?php 
        if (isset($_POST['source'])){
			// echo'Post fait<br/>';
		    $sourceposte = $_POST['source'];
            // echo("Nom du document à indexer : $sourceposte <br/>");
            echo("Nom du document à indexer : <strong>$sourceposte</strong>  <br/>");


		    $source = "textes/$sourceposte.txt";
            // echo $source;
		    $indexation = indexer($source);
        }
        ?>

        <h2>----------------------------------------------</h2>

        <h2>Quel mot cherchez-vous ? </h2>
        <p>
            Mots disponibles dans la db  pour le tp après indexation des documents de test : <br />
            air, bleue, orange. <br />
            <form action="index.php?action=tpindexation" method="post">
                <input type="text" name="mot" value="Mot recherché ..." />
                <button type="submit">Envoyerrrrrr</button>
            </form>
        </p>

        <?php 
        if (isset($_POST['mot'])){
		    $motposte = $_POST['mot'];
		    $motcherche = getMot($motposte);

            echo("Résultat de la recherche pour le mot <strong>$motposte</strong> <br/>");

                while ($row = $motcherche->fetch()){
                    ?>
                        <p>
                        Fréquence d'apparition du mot dans le document : <?= $row['occurence'] ?><br />
                        Accès au document : <a href="<?php echo $row['source'] ?>" target="_blank"><?php echo $row['source'] ?></a><br />
                        </p>
                    <?php
                    }
        }
        ?>
<?php $content = ob_get_clean(); ?>
<?php require('view/frontend/template.php'); ?>





