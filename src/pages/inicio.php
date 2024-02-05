<article class="text-white container mt-5">
    <div class="d-flex align-items-center justify-content-center flex-column">
    <?php 
    use API\Api;
    use Utils\Functions;

    $api = new Api;

    if ( !empty($_POST) ) {
        $postForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $api::$method = 'PUT';
        $api->request('tasks/' . $postForm['id'], $postForm);
        if ( $api->getError() ) {
            // Erro
            echo '<div class="alert alert-danger">Erro ao atualizar os dados da tarefa!</div>';
        }
    }

    $api::$method = 'GET';
    $api->request('tasks');
    $response = $api->getResponse();
    if ( !$api->getError() ) {
        // Sucesso
        foreach($response as $task) {
            $taskID = $task->id;
            $taskTitle = $task->title;
            $taskStatus = ucfirst($task->status);
            $taskCreatedAt = Functions::removeTime(Functions::brazilianDate($task->created_at));

            switch($taskStatus) {
                case 'Pendente': 
                    $status = 'warning';
                    $icon = '<ion-icon name="time"></ion-icon>';
                    $changeStatusIcon = '<ion-icon name="arrow-round-forward" class="click-icon"></ion-icon>';
                    $inputValue = 'em andamento';
                    break;
                case 'Em andamento': 
                    $status = 'info';
                    $icon = '<ion-icon name="bookmarks"></ion-icon>';
                    $changeStatusIcon = '<ion-icon name="checkbox-outline" class="click-icon"></ion-icon>';
                    $inputValue = 'finalizado';
                    break;
                case 'Finalizado': 
                    $status = 'success';
                    $icon = '<ion-icon name="checkmark-circle-outline"></ion-icon>';
                    $changeStatusIcon = '<ion-icon name="arrow-round-forward" class="click-icon"></ion-icon>';
                    $inputValue = 'pendente';
                    break;
                default:
                    $status = 'light';
                    break;
                }
                
            require "./utils/components/taskCard.php";
        }
    } else {
        // Erro
        echo '<div class="alert alert-danger"><ion-icon name="close-circle-outline"></ion-icon> Ooops! Ocorreu um erro ao tentar recuperar suas tarefas.</div>';
    }

    require_once "./utils/components/taskButton.php";
    ?>
    </div>
</article>