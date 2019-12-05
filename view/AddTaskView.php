<form action="/tasks/<?= (!isset($data['isAdmin'])) ? "add" : "edit/{$data['id']}" ?>" method="POST">
    <div class="form-group">
        <label for="username">Имя пользователя</label>
        <input type="text" class="form-control" id="username" name="username" maxlength="255" required
            value="<?=(isset($data['username'])) ? $data['username'] : ''?>"
            <?= (isset($data['isAdmin']) && $data['isAdmin']) ? 'disabled' : '' ?>>

        <?php if (isset($data['errors']['username'])): ?>
            <span class="form-error-message"><?= $data['errors']['username'] ?></span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" maxlength="255" required
            value="<?=(isset($data['email'])) ? $data['email'] : ''?>"
            <?= (isset($data['isAdmin']) && $data['isAdmin']) ? 'disabled' : '' ?>>

        <?php if (isset($data['errors']['email'])): ?>
            <span class="form-error-message"><?= $data['errors']['email'] ?></span>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="task">Задача</label>
        <input type="text" class="form-control" id="task" name="task" maxlength="255" required
            value="<?=(isset($data['task'])) ? $data['task'] : ''?>">

        <?php if (isset($data['errors']['task'])): ?>
            <span class="form-error-message"><?= $data['errors']['task'] ?></span>
        <?php endif; ?>
    </div>

    <?php if (isset($data['isAdmin']) && $data['isAdmin']): ?>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status"
                value="1" <?=(isset($data['status']) && $data['status'] == '1') ? 'checked' : ''?>>
            <label class="form-check-label" for="status">Статус</label>
        </div>
    <?php endif; ?>

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