<?php
use API\Api;
use Utils\Functions;

$api = new Api;

if ( !empty($_GET) ) {
    $getForm = filter_input_array(INPUT_GET, FILTER_DEFAULT);
    
    if ( isset($getForm['newTask']) AND $getForm['newTask'] == 'true' ) {
        $placeholderData = [
            'title' => 'Rascunho',
            'status' => 'pendente',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $api::$method = 'POST';
        $api->request('tasks', $placeholderData);
        if ( $api->getError() ) {
            // Erro
            echo '<div class="alert alert-danger">Erro ao atualizar os dados da tarefa!</div>';
        } else {
            Functions::location();
        }
    }
} 
 
?>

<form action="/" method="get">
    <button type="submit" name="newTask" value="true" id="createTask">
        <i data-lucide="plus-square"></i> Criar tarefa
    </button>
</form>