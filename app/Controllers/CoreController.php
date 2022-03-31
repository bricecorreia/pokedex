<?php

namespace Pokedex\Controllers;

class CoreController {

    // méthode show
    protected function show($viewName, $viewData = [])
    {   
        // on donne la possibilité à la méthode show d'accéder à $router qui est défini dans le contexte global
        // => mot clé global
        global $router;
        
        // on définit cette variable pour que nos vues puissent mettre le lien de la page courante en avant
        // Toutes nos données dynamiques à utiliser dans les vues se trouveront dans $viewData 
        $viewData['currentPage'] = $viewName;
        // dump($viewData);
        
        // juste avant l'inclusion des views (maintenant qu'on a fini de déterminer ce qui est présent dans $viewData)
        // on demande à PHP de générer une variable pour chaque élément dans $viewData
        extract($viewData);

        // __DIR__ vaut /var/www/html/S05/..../Controllers
        require __DIR__ . '/../views/header.tpl.php';
        // on inclut une vue selon la valeur du paramètre $viewName
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
        
    }
}