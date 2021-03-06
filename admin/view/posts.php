<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Subjects
            <?php if (permission('posts', 'add')):?>
                <a href="<?= admin_url('add_post ')?>">Add New</a>
            <?php endif;?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th class="hide">Title</th>
                <th class="hide">Date</th>
                <?php if(permission('posts', 'edit') || permission('posts', 'delete')):?>
                <th class="">Process</th>
                <?endif;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td class="hide">
                        <a href="#"><?= $row['post_title']; ?></a>
                    </td>
                    <td class="hide" title="<?=date("d/m/Y/", strtotime($row['post_date']));?>">
                        <a href="#"><?= timeConvert($row['post_date']); ?></a>
                    </td>

                    <td>
                        <?php if(permission('posts', 'edit')):?>
                            <a href="<?= admin_url('edit_post?id=' . $row['post_id']); ?>" class="btn">Edit</a>
                        <?php endif;?>

                        <?php if(permission('posts', 'delete')):?>
                            <a href="<?= admin_url('delete?table=posts&column=post_id&id=' . $row['post_id']); ?>"
                           onclick="return confirm('Are you sure?')" class="btn">Delete</a>
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php if ($totalRecord > $pageLimit): ?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')); ?>
        </ul>
    </div>
<?php endif; ?>

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>

<?php require admin_view('static/footer') ?>