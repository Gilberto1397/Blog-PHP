<?php
require_once __DIR__ . '/inicio-html.php';
?>

    <form method="post">
        <div class="container d-flex flex-column mt-5">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </div>
    </form>

<?php
require_once __DIR__ . '/fim-html.php';