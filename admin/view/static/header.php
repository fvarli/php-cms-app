<?php
?>
    <!doctype html>
    <html lang="en">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <meta charset="UTF-8">
        <title>Admin</title>

        <!--styles-->
        <link rel="stylesheet" href="<?= admin_public_url('styles/main.css?=' . time()) ?>">
        <link rel="stylesheet" href="<?= admin_public_url('styles/extras.css?=' . time()) ?>">
        <link rel="shortcut icon" href="/php-cms-app/admin/view/favicon.ico">

        <!--scripts-->
        <script src="<?= admin_public_url('scripts/jquery-1.12.2.min.js') ?>"></script>
        <script src="<?= admin_public_url('scripts/jquery-ui.min.js') ?>"></script>
        <script src="<?=admin_public_url('vendor/jquery_tags_input/jquery.tagsinput-revisited.min.js')?>"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="<?= admin_public_url('vendor/jquery_tags_input/jquery.tagsinput-revisited.min.css?=' . time()) ?>">
        <script src="https://cdn.tiny.cloud/1/xbiwycvpc2s72vwxbkjbphccz649p8xdf5tdlxjgpkrfq5fd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <!--    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>-->
        <script> let api_url = '<?=admin_url('api')?>'</script>
        <script> let app_url = '<?=site_url('app')?>'</script>
        <script src="<?= admin_public_url('scripts/api.js') ?>"></script>
        <script src="<?= admin_public_url('scripts/admin.js') ?>"></script>

    </head>
<body>

    <div class="success-msg">
        <a href="#" class="success-close-btn"><i class="fa fa-times"></i></a>
        <div></div>
    </div>

<?php if (session('user_rank') && session('user_rank') != 3): ?>

    <!--navbar-->
    <div class="navbar">
        <ul dropdown>

            <li>
                <a href="#">
                    <span class="fa fa-home"></span>
                    <span class="title"><?= settings('title') ?></span>
                </a>
            </li>

            <li>
                <a href="#">
                    <span class="title"> <?= session('user_name');?></span>
                </a>
            </li>

            <li>
                <a href="<?= admin_url('logout') ?>">
                    Log Out
                </a>
            </li>

            <!--<li>-->
            <!--    <a href="#">-->
            <!--        <span class="fa fa-plus"></span>-->
            <!--        <span class="title">New</span>-->
            <!--    </a>-->
            <!--    <ul>-->
            <!--        <li>-->
            <!--            <a href="#">-->
            <!--                New Post-->
            <!--            </a>-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <a href="#">-->
            <!--                New Page-->
            <!--            </a>-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <a href="#">-->
            <!--                New Category-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</li>-->
        </ul>
    </div>

    <!--sidebar-->
    <div class="sidebar">

        <ul>
            <?php foreach ($menu_list as $main_url => $menu): if (!permission($main_url, 'show', false)) continue; ?>
                <li class="<?= (route(1) == $main_url) || isset($menu['submenu'][route(1)]) == $main_url ? 'active' : null; ?>">
                    <a href="<?= admin_url($main_url); ?>">
                        <span class="fa fa-<?= $menu['icon']; ?>"></span>
                        <span class="title">
                        <?= $menu['title']; ?>
                    </span>
                    </a>
                    <?php if (isset($menu['submenu'])): ?>
                        <ul class="sub-menu">
                            <?php foreach ($menu['submenu'] as $url => $title): ?>
                                <li>
                                    <a href="<?= admin_url($url); ?>">
                                        <?= $title; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>

            <li class="line">
                <span></span>
            </li>
        </ul>
        <a href="#" class="collapse-menu">
            <span class="fa fa-arrow-circle-left"></span>
            <span class="title">
            Collapse menu
        </span>
        </a>

    </div>

    <!--content-->
    <div class="content">

    <?php if (isset($error)): ?>
        <div class="message error box-">
            <?= $error; ?>
        </div>
    <?php endif; ?>

<?php endif; ?>