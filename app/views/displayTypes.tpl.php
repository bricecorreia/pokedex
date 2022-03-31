
<h5>Cliquez sur un type pour voir tous les Pokémons de ce type :</h5>

<section class="sectionType">

    <div class="displayTypes">
    <?php foreach ($viewData['types'] as $type) :
    ?>
        <div class="singleType" style="background-color:#<?=$type->getColor()?>;"><a href="<?= $router->generate('pokeByType', ['id' => $type->getId()])?>"><?php echo ($type->getType_name())?>
        </div>

        <?php endforeach;?>


    </div>


</section>