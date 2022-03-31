
<section>

    <div >
        <h3 class="detailsPokeName">Détails de <?=$viewData['pokemon']->getName();?></h3>
    </div>

    <div class="mainDetails">
        <div class="imgLeft">
            <img src="../assets/img/<?= $viewData['pokemon']->getNumber() . '.png'?>">
        </div>

        <div class="typesAndStats">
            <!-- Affichage du nom du pokémon -->
            <h4>#<?=$viewData['pokemon']->getNumber() . ' ' . $viewData['pokemon']->getName();?></h4>

                <div class ="allTypes"><!-- foreach sur le/les type(s) du pokémon:-->
                    <?php foreach ($viewData['pokemonType'] as $type_name) :
                    ?>
                    <div class="pokemonType" style="background-color:#<?=$type_name->getColor()?>;"><?=$type_name->getType_name();?></div>
                    <?php endforeach; ?>
                </div>
                
            <h5>Statistiques</h5>
                <div class="stats">

                
                <div class="hp singleStats">
                    <div class="singleStatsLeft">
                        <label for="hp">PV</label>
                        <span><?= $viewData['pokemonStats'][0]->getHp()?></span>
                    </div>
                    <progress id="hp" max="255" value=<?= $viewData['pokemonStats'][0]->getHp()?>></progress>
                </div>
                <div class="atk singleStats">
                    <div class="singleStatsLeft">
                    <label for="atk">Attaque</label>
                    <span><?= $viewData['pokemonStats'][0]->getAtk()?></span>
                    </div>
                    <progress id="atk" max="255" value=<?= $viewData['pokemonStats'][0]->getAtk()?>></progress>
                </div>
                <div class="def singleStats">
                    <div class="singleStatsLeft">
                    <label for="def">Défense</label>
                    <span><?= $viewData['pokemonStats'][0]->getDef()?></span>
                    </div>
                    <progress id="def" max="255" value=<?= $viewData['pokemonStats'][0]->getDef()?>></progress>
                </div>
                <div class="atk_spe singleStats">
                    <div class="singleStatsLeft">
                    <label for="atk_spe">Attaque Spé.</label>
                    <span><?= $viewData['pokemonStats'][0]->getAtk_spe()?></span>
                    </div>
                    <progress id="atk_spe" max="255" value=<?= $viewData['pokemonStats'][0]->getAtk_spe()?>></progress>
                </div>
                <div class="def_spe singleStats">
                    <div class="singleStatsLeft">
                    <label for="def_spe">Défense Spé.</label>
                    <span><?= $viewData['pokemonStats'][0]->getDef_spe()?></span>
                    </div>
                    <progress id="def_spe" max="255" value=<?= $viewData['pokemonStats'][0]->getDef_spe()?>></progress>
                </div>
                <div class="speed singleStats">
                    <div class="singleStatsLeft">
                    <label for="speed">Speed</label>
                    <span><?= $viewData['pokemonStats'][0]->getSpeed()?></span>
                    </div>
                    <progress id="speed" max="255" value=<?= $viewData['pokemonStats'][0]->getSpeed()?>></progress>
                </div>
                    
                    
                </div>

        </div>
    </div>
</section>