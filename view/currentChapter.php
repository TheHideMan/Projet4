<?php $title = 'Projet 4'; ?>

<?php ob_start(); ?>
    
    <h1 class="text-center">VOIR CHAPITRE </h1>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                

            <?php
                while($donnes = $reponse -> fetch()) {

            ?>
            <p>
                <strong><?php echo $donnes['titre']; ?></strong> <br/>
                <?php echo $donnes['manu']; ?>
            </p>
            <?php
            }
            ?>




                
            </div>
            
        </div>
    </div>
    

    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>