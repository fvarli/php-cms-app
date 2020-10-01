<?php require admin_view('static/header') ?>

    <div class="content">

        <div class="box-">
            <h1>
                All Menus

                <?php
                if (!permission('menu', 'add')) {
                    permission_page();
                } else {?>
                    <a href="<?= admin_url('add_menu') ?>">Add New</a>
                <?php }

                ?>


            </h1>
        </div>

        <div class="clear" style="height: 10px;"></div>

        <div class="table">
            <table>
                <thead>
                <tr>
                    <th>Title</th>
                    <th class="hide">Date</th>
                    <?php if (permission('menu', 'edit') || permission('menu', 'delete')): ?>
                        <th>Process</th>
                    <?php endif; ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td>
                            <?= $row['menu_title'] ?>
                        </td>
                        <td>
                            <span class="date"><?= date('d/m/Y H:i:s', strtotime($row['menu_date'])); ?></span>
                        </td>
                        <td>
                            <?php if (permission('menu', 'edit')): ?>
                                <a href="<?= admin_url('edit_menu?id=' . $row['menu_id']); ?>" class="btn">Edit</a>
                            <?php endif; ?>
                            <?php if (permission('menu', 'delete')): ?>
                                <a href="<?= admin_url('delete?table=menu&column=menu_id&id=' . $row['menu_id']); ?>"
                                   class="btn" onclick="return confirm('Are you sure?')">Delete</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>

<?php require admin_view('static/footer') ?>