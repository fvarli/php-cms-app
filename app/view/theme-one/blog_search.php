<?php require view('static/header') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1>Search Results for <?=get('query')?></h1>
        <div class="breadcrumb-custom">
            <a href="<?= site_url(); ?>">Home</a> /
            <a href="<?= site_url('blog') ?>" class="active">Blog Category</a> /
            <a href="<?= site_url('blog/search?query='. get('query')) ?>" class="active"><?=get('query')?></a> /
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h4 class="pb-3">Last Articles</h4>

            <?php if ($query): ?>

                <?php foreach ($query as $row): ?>
                    <div class="card mb-3">
                        <div class="card-header">
                            <?= $row['category_name'] ?>
                            <div class="date">
                                <?= date('d/m/Y H:i:s', strtotime($row['post_date'])) . ' - ' . timeConvert($row['post_date']); ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['post_title']; ?></h5>
                            <div class="card-text">
                                <?= htmlspecialchars_decode($row['post_short_content']); ?>
                            </div>
                            <a href="<?= site_url('blog/') . $row['post_url']; ?>" class="btn btn-dark">View</a>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($totalRecord > $pageLimit): ?>
                    <div class="pagination-container text-center mb-4">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link"
                                       href="<?= site_url('blog/search/?query=' . get('query') . '&' . $pageParam . '=' . $db->prevPage()) ?>"
                                       aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <?= $db->showPagination(site_url('blog/search/?query=' . get('query') . '&' . $pageParam . '=[page]'), 'active', true) ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="<?= site_url('blog/search/?query=' . get('query') . '&' . $pageParam . '=' . $db->nextPage()) ?>"
                                       aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                <? endif; ?>

            <?php else: ?>
                <div class="alert alert-warning">
                    There is no any article yet. Please check later.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require view('static/footer') ?>
