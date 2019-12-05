<form action="/tasks/add" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="username" maxlength="255" required>

        <?php if (isset($data['errors']['username'])): ?>
            <span class="form-error-message"><?= $data['errors']['username'] ?></span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" maxlength="255" required>

        <?php if (isset($data['errors']['email'])): ?>
            <span class="form-error-message"><?= $data['errors']['email'] ?></span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="task">Задача</label>
        <input type="text" class="form-control" id="task" name="task" maxlength="255" required>

        <?php if (isset($data['errors']['task'])): ?>
            <span class="form-error-message"><?= $data['errors']['task'] ?></span>
        <?php endif; ?>
    </div>

    <div class="messages">
        <?php if (isset($data['added'])): ?> 
            <?php if ($data['added']): ?>
                <div class="alert alert-success" role="alert">Добавлено</div>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">Ошибка добавления</div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-success">Добавить</button>
    <button type="reset" class="btn btn-danger">Очистить</button>
</form>