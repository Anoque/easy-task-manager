<div class="tasks-actions">
    <a class="btn btn-success" href="/tasks/add">Добавить задачу</a>
</div>

<div class="tasks-sort">
    <span>Сортировать по: </span>
    <a 
        class="btn btn-<?= \Core\Utils::orderByCheck('id') ? 'info' : 'secondary' ?>" 
        href="?<?= \Core\Utils::getAllUrl('orderBy', 'id') ?>">
        id
    </a>
    <a 
        class="btn btn-<?= \Core\Utils::orderByCheck('username') ? 'info' : 'secondary' ?>" 
        href="?<?= \Core\Utils::getAllUrl('orderBy', 'username') ?>">
        Имя пользователя
    </a>
    <a 
        class="btn btn-<?= \Core\Utils::orderByCheck('email') ? 'info' : 'secondary' ?>" 
        href="?<?= \Core\Utils::getAllUrl('orderBy', 'email') ?>">
        Email
    </a>
    <a 
        class="btn btn-<?= \Core\Utils::orderByCheck('task') ? 'info' : 'secondary' ?>" 
        href="?<?= \Core\Utils::getAllUrl('orderBy', 'task') ?>">
        Задача
    </a>
</div>

<div class="tasks-list">
    <?php foreach ($data['tasks'] as $value): ?>
        <div class="card">
            <div class="card-body">
                <div class="card-title"><?= $value['id'] ?>: <?= $value['username'] ?></div>
                <span>Email: <?= $value['email'] ?></span>
                <p>Задача: <?= $value['task'] ?></p>
                <div class="tasks-messages">
                    <?= ($value['status'] == '1') ? '<span class="green">Выполненно</span>' : '' ?>
                    <?= ($value['admin_id'] != NULL) ? '<span class="green">Отредактированно администратором</span>' : '' ?>
                </div>
            </div>
            <?php if (\Core\Utils::isAdmin()): ?>
                <div class="card-footer">
                    <a class="btn btn-warning" href="/tasks/edit/<?= $value['id'] ?>">Редактировать</a>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

<nav class="tasks-pagination" aria-label="Main page navigation">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="?<?= \Core\Utils::getAllUrl('page', 1) ?>">Начало</a>
        </li>

        <?php for ($i = 0; $i < $data['pages']; $i++): ?>
            <li class="page-item"><a class="page-link" href="?<?= \Core\Utils::getAllUrl('page', $i + 1) ?>"><?= $i + 1 ?></a></li>
        <?php endfor; ?>

        <li class="page-item">
            <a class="page-link" href="?<?= \Core\Utils::getAllUrl('page', $data['pages']) ?>">Конец</a>
        </li>
    </ul>
</nav>