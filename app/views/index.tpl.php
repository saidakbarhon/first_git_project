<?php require VIEWS . '/incs/header.php' ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php foreach ($posts as $post) : ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><a href="post/<?= $post['id'] ?>"><?= h($post['suppler_name']) ?></a></h5>
                            <p class="card-text"><?= $post['company_name'] ?></p>
                            <a href="post?id=<?= $post['id'] ?>">Go somewhere</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <?php require VIEWS . '/incs/sidebar.php' ?>
        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php' ?>