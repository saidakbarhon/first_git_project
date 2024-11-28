<?php require VIEWS . '/incs/header.php' ?>

<main class="main py-3">

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="Supplier" class="form-label">Supplier name</label>
                        <input name="supplier" type="text" class="form-control" id="Supplier" placeholder="Supplier" value="<?= old('supplier') ?>">
                        <?= isset($validator) ? $validator ->errorList('supplier') : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="Company" class="form-label">Company name</label>
                        <textarea type="" name="company" class="form-control" id="Company" rows="3"><?= old('company') ?></textarea>
                        <?= isset($validator) ? $validator ->errorList('company') : '' ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">
                            Отправить
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>

</main>

<?php require VIEWS . '/incs/footer.php' ?>