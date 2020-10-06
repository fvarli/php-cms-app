<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Pages
            <?php if (permission('pages', 'add')):?>
                <a href="<?= admin_url('add_page ')?>">Add New</a>
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
                <?php if(permission('contact', 'edit') || permission('contact', 'delete')):?>
                <th class="">Process</th>
                <?endif;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td class="hide">
                        <a href="#"><?= $row['page_title']; ?></a>
                    </td>
                    <td class="hide" title="<?=date("d/m/Y/", strtotime($row['page_date']));?>">
                        <a href="#"><?= timeConvert($row['page_date']); ?></a>
                    </td>

                    <td>
                        <a href="<?= site_url('page/' . $row['page_url']) ?>" class="btn" target="_blank">View</a>
                        <?php if(permission('pages', 'edit')):?>
                            <a href="<?= admin_url('edit_page?id=' . $row['page_id']); ?>" class="btn">Edit</a>
                        <?php endif;?>

                        <?php if(permission('pages', 'delete')):?>
                            <a href="<?= admin_url('delete?table=pages&column=page_id&id=' . $row['page_id']); ?>"
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