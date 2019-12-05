
<div class="tasks-actions">
    <a class="btn btn-success" href="/tasks/add">Добавить задачу</a>
</div>

<div class="tasks-list">
    <?php foreach ($data['tasks'] as $value): ?>
        <div class="card">
            <div class="card-body">
                <div class="card-title"><?= $value['id'] ?>: <?= $value['username'] ?></div>
                <span>Email: <?= $value['email'] ?></span>
                <p>Задача: <?= $value['task'] ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>