<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Subjects
            <?php if (permission('references', 'add')):?>
                <a href="<?= admin_url('add_reference ')?>">Add New</a>
            <?php endif;?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th class="hide">Reference</th>
                <th class="hide">Category</th>
                <th class="hide">Date</th>
                <?php if(permission('references', 'edit') || permission('references', 'delete')):?>
                <th class="">Process</th>
                <?endif;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td width="80">
                        <img src="<?= site_url('upload/reference/' . $row['reference_url'] . '/' . $row['reference_image']) ?>"
                             alt="" height="80">
                    </td>
                    <td class="hide">
                        <a href="#"><?= $row['reference_title']; ?></a>
                    </td>
                    <td>
                        <?= $row['categories'] ?>
                    </td>
                    <td class="hide" title="<?=date("d/m/Y/", strtotime($row['post_date']));?>">
                        <a href="#"><?= timeConvert($row['reference_date']); ?></a>
                    </td>

                    <td>
                        <?php if(permission('references', 'edit')):?>
                            <a href="<?= admin_url('reference_images?id=' . $row['reference_id']); ?>" class="btn">Images</a>
                            <a href="<?= admin_url('edit_reference?id=' . $row['reference_id']); ?>" class="btn">Edit</a>
                        <?php endif;?>

                        <?php if(permission('references', 'delete')):?>
                            <a href="<?= admin_url('delete?table=reference&column=reference_id&id=' . $row['reference_id']); ?>"
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