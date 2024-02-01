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
        if ( !$api->getError() ) {
            // Sucesso
            echo '<div class="alert alert-success">Sucesso ao atualizar os dados da tarefa!</div>';
        } else {
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

            echo "<form action='/' method='post'>",
                    "<div class='card text-bg-light mb-3' style='max-width: 18rem;'>",
                    "<div class='card-header text-bg-$status d-flex align-items-center gap-2'>$icon <strong>$taskStatus</strong> - $taskCreatedAt</div>",
                    "<div class='card-body d-flex align-items-center justify-content-between gap-2'>",
                    " <h5 class='card-title'>$taskTitle</h5>",
                    " <button class='click-icon' type='submit'><ion-icon name='arrow-forward'></ion-icon></button>",
                    " <input type='hidden' name='id' value='$taskID'>",
                    " <input type='hidden' name='title' value='$taskTitle'>",
                    " <input type='hidden' name='status' value='$inputValue'>",
                    "</div>",
                    "</div>",
                    "</form>";
        }
    } else {
        // Erro
        echo '<div class="alert alert-danger"><ion-icon name="close-circle-outline"></ion-icon> Ooops! Ocorreu um erro ao tentar recuperar suas tarefas.</div>';
    }
    ?>
    </div>
</article>