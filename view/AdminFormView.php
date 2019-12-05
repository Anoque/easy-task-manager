<form action="/admin/auth" method="POST">
    <div class="form-group">
        <label for="username">Имя</label>
        <input type="text" class="form-control" id="username" name="username" maxlength="255" required>
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password" maxlength="255" required>
    </div>

    <?php if (isset($data['error'])): ?> 
        <div class="alert alert-danger" role="alert">Неверные логин или пароль</div>
    <?php endif; ?>


    <button type="submit" class="btn btn-success">Войти</button>
</form>