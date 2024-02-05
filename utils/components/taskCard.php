<form action="/" method="post">
    <div class="card-container">
        <div class="taskCard">
            <input class="title" value="<?= ( isset($taskTitle) AND !empty($taskTitle) ) ? $taskTitle : 'Rascunho' ?>" name="title"></input>
        </div>
        <div class="status">
            <strong>Status</strong>: <?= ( isset($taskStatus) AND !empty($taskStatus) ) ? $taskStatus : null ?>
        </div>
    </div>
    <?php 
    echo '<input type="hidden" name="status" value="' . $taskStatus . '">',
         '<input type="hidden" name="id" value="' . $taskID . '">';
    ?>
</form>
