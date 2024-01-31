<?php
require_once 'autoload.php';
require_once './config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <title><?php echo $uri; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-dark">
<?php
require_once('./utils/header.html');
// Encontra a página para carregamento
if ( isset($uri) ) {
    $url = explode('/', $uri);
    if ( file_exists("src/pages/$url[0].php") ) {
        require_once("src/pages/$url[0].php");
    } else {
        require_once '404.html';
        exit();
    }
} else {
    require_once("src/pages/inicio.php");
}
require_once('./utils/footer.html');

// Importa o JS das páginas
if ( empty($uri) ) {
    echo '<script src="./js/pages/inicio.js"></script>';
}
?>
</body>
