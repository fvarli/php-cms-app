<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Members
            <!--<a href="#">Members</a>-->
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th>User Name</th>
                <th class="hide">Email</th>
                <th class="hide">User Role</th>
                <th class="hide">Register Date</th>
                <?php if(permission('users', 'edit') || permission('users', 'delete')):?>
                <th class="">Process</th>
                <?endif;;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td>
                        <a href="<?= admin_url('edit_user?id=' . $row['user_id']); ?>" class="title">
                            <?= $row['user_name']; ?>
                        </a>
                    </td>
                    <td class="hide">
                        <a href="#"><?= $row['user_email']; ?></a>
                    </td>
                    <td class="hide">
                        <a href="#"><?= user_ranks($row['user_rank']); ?></a>
                    </td>
                    <td class="hide">
                        <a href="#"><?= date('d/m/Y H:i:s', strtotime($row['user_date'])); ?></a>
                    </td>
                    <td>
                        <?php if(permission('users', 'edit')):?>
                            <a href="<?= admin_url('edit_user?id=' . $row['user_id']); ?>" class="btn">Edit</a>
                        <?php endif;?>

                        <?php if(permission('users', 'delete')):?>
                            <a href="<?= admin_url('delete?table=users&column=user_id&id=' . $row['user_id']); ?>"
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