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
        <link rel="stylesheet" href="<?= admin_public_url('styles/extra.css?=' . time()) ?>">
        <link rel="shortcut icon" href="/php-cms-app/admin/view/favicon.ico">


        <!--scripts-->
        <script src="<?= admin_public_url('scripts/jquery-1.12.2.min.js') ?>"></script>
        <script src="<?= admin_public_url('scripts/jquery-ui.min.js') ?>"></script>
        <!--    <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>-->
        <script> let api_url = '<?=admin_url('api')?>'</script>
        <script src="<?= admin_public_url('scripts/api.js') ?>"></script>
        <script src="<?= admin_public_url('scripts/admin.js') ?>"></script>

        <style>
            .menu-container .handle {
                width: 15px;
                height: 15px;
                background: #ccc;
                position: absolute;
                top: 15px;
                right: -15px;
                cursor: pointer;
            }

            .menu-container form > ul li {
                background: #f5f5f5;
                overflow: inherit;
            }

            .menu-container form > ul li.ui-sortable-helper {
                box-shadow: 0 0 10px 0 rgba(0, 0, 0, .2);
            }

            .ui-sortable-helper {
                background: #f7ffd8 !important;
                visibility: visible !important;
            }
        </style>

    </head>
<body>

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