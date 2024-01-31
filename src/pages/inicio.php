<article class="text-white container mt-5">
    <div class="d-flex align-items-center justify-content-center flex-column">
        <?php
        use API\Api;

        $api = new Api;
        $api::$method = 'GET';
        $api->request('tasks');

        $response = $api->getResponse();
        if ( !$api->getError() ) {
            // Sucesso
            foreach($response as $task) {
                $taskID = $task->id;
                $taskTitle = $task->title;
                $taskStatus = ucfirst($task->status);
                $taskCreatedAt = $task->created_at;
    
                echo "<div class='card text-bg-light mb-3' style='max-width: 18rem;'>",
                     "<div class='card-header text-bg-warning'>$taskStatus</div>",
                     "<div class='card-body'>",
                     "  <h5 class='card-title'>$taskTitle</h5>",
                     "</div>",
                     "</div>";
            }
        } else {
            // Erro
            
        }
        
        ?>
        <button type="button" class="btn btn-primary" data-bs-dismiss="toast" data-bs-target="#liveToast" id="buttonToast">Show live toast</button>

        <div id="liveToast" aria-live="polite" aria-atomic="true">
            <div class="toast-container top-0 end-0 p-3">
                <div class="toast bg-dark" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header text-white bg-dark">
                        <img src="..." class="rounded me-2" alt="...">
                        <strong class="me-auto">Bootstrap</strong>
                        <small class="text-secondary">2 seconds ago</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Heads up, toasts will stack automatically
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>