<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= $_SERVER['BASE_URI'] ?>/">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <title>pO'kedex</title>
</head>
    <body>
        <header>
            <nav>
                <a class="navLeft" href="#"><h1>Pokédex</h1></a>
                <div>
                <a class="navRight" href="#">Liste</a>
                <a class="navRight" href="<?= $router->generate('glossaireTypes')?>">Types</a>
                </div>
            </nav>
        </header>