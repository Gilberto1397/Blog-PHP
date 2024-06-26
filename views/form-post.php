<?php
require_once __DIR__ . '/inicio-html.php';
/** @var \ProjetoBlog\Entity\Post|null $post */
?>

    <form method="post" enctype="multipart/form-data">
        <div class="container d-flex flex-column mt-5">
            <div class="mb-3">
                <input type="title" class="form-control" name="title"
                       value="<?= !empty($post) ? $post->getTitle() : '' ?>" placeholder="Título do post">
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" name="content"
                          style="height: 100px"><?= !empty($post) ? $post->getContent() : '' ?></textarea>
                <label for="content">Conteúdo</label>
            </div>

            <div class="mb-3">
                <input class="form-control" name="image"  accept="image/*" type="file" id="formFile">
            </div>

            <?php if (!empty($post)): ?>
                <div style="width: 30%;">
                    <img src="img/uploads/<?= $post->getImagePath() ?>" class="img-thumbnail"
                         alt="" style="height: 300px">
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>

<?php
require_once __DIR__ . '/fim-html.php';