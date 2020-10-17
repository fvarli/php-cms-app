<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Tags
            <?php if (permission('tags', 'add')): ?>
                <a href="<?= admin_url('add_tag') ?>">Add New</a>
            <?php endif; ?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Tag</th>
                <th>Using Number</th>
                <th>Process</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td>
                        <?= $row['tag_name'] ?>
                    </td>
                    <td>
                        <?= $row['total'] ?>
                    </td>
                    <td>
                        <?php if (permission('tags', 'edit')): ?>
                            <a href="<?= admin_url('edit_tag?id=' . $row['tag_id']) ?>"
                               class="btn">Edit</a>
                        <?php endif; ?>
                        <?php if (permission('tags', 'delete')): ?>
                            <a onclick="return confirm('Are you sure?')"
                               href="<?= admin_url('delete?table=tags&column=tag_id&id=' . $row['tag_id']) ?>"
                               class="btn">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php if ($totalRecord > $pageLimit): ?>
    <div class="pagination">
        <ul>
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]')) ?>
        </ul>
    </div>
<?php endif; ?>

<?php require admin_view('static/footer') ?>