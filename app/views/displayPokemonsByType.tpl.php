
<section>

    <div class="pokeMain">
        <?php

        ?>
        <?php foreach ($viewData['pokemons'] as $pokemon) : 
            // On récupère l'id dans la variable $pokeId
            $pokeId = $pokemon->findIdFromNumber($pokemon->getNumber());
        ?>
        <div class="pokeVignette">
            <a href="<?= $router->generate('details', ['id' => $pokeId[0]->getId()]);
            ?>
            "><img src="../assets/img/<?= $pokemon->getNumber() . '.png'?>">
            <h3>
                <p>#<?= $pokemon->getNumber() . ' ' . $pokemon->getName()?></p>
                </a>
            </h3>
        </div>
        <?php endforeach;?>
    </div>


</section>