<?php
/**
 * Arquivo de configurações
 */

/**
 * URI
 */
$uri = ( isset($_GET['uri']) ) ? filter_var($_GET['uri'], FILTER_SANITIZE_URL) : null;

/**
 * Título das páginas
 */
switch($uri) {
    case '404':
        define('META_TITLE', 'Página não encontrada');
        break;
}

/**
 * Tabelas do banco
 */
define('TB_USER', 'tbl_user');
define('TB_FILE', 'tbl_file');
?>