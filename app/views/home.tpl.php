
<section class="pokeMain">

    <?php foreach ($viewData['homePokemons'] as $pokemonObject) :?>
    <div class="pokeVignette">
        <a href="<?= $router->generate('details', ['id' => $pokemonObject->getId()]) ?>"><img src="../assets/img/<?= $pokemonObject->getNumber() . '.png'?>">
        <h3>
            <p>#<?= $pokemonObject->getNumber() . ' ' . $pokemonObject->getName()?></p>
            </a>
        </h3>
    </div>
    <?php endforeach;?>

</section>
