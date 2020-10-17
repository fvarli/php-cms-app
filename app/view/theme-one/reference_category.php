<?php require view('static/header') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1><?= $curr_category['category_name'] ?></h1>
        <div class="breadcrumb-custom">
            <a href="<?= site_url() ?>">Home</a> /
            <a href="<?= site_url('references') ?>">References</a> /
            <a href="<?= site_url('references/' . $curr_category['category_url']) ?>"
               class="active"><?= $curr_category['category_name'] ?></a>
        </div>
    </div>
</section>

<div class="portfolio">
    <div class="container">

        <div class="row">
            <div class="col-md-12 text-center">
                <nav class="nav nav-pills nav-fill mb-4">
                    <a href="<?= site_url('references') ?>"
                       class="nav-item nav-link<?= !route(1) ? ' active' : null ?>">All</a>
                    <?php foreach ($categories as $category): ?>
                        <a class="nav-item nav-link<?= route(1) == $category['category_url'] ? ' active' : null ?>"
                           href="<?= site_url('references/' . $category['category_url']) ?>"><?= $category['category_name'] ?></a>
                    <?php endforeach; ?>
                </nav>

            </div>
        </div>

        <div class="row">

            <?php if ($query): ?>

                <?php foreach ($query as $row): ?>
                    <div class="col-md-4">
                        <a href="<?= site_url('references/' . $row['reference_url']) ?>">
                            <img class="img-rounded"
                                 src="<?= site_url('upload/reference/' . $row['reference_url'] . '/' . $row['reference_image']) ?>"
                                 alt="">
                        </a>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <div class="col-md-12">
                    <div class="alert alert-warning">
                        Reference has been not added yet.
                    </div>
                </div>
            <?php endif; ?>

        </div>

    </div>
</div>

<?php require view('static/footer') ?>
