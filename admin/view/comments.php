<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Comments
        </h1>
    </div>

    <div class="filter">
        <ul>
            <li class="<?=!get('status') ? 'active' : null?>">
                <a href="<?=admin_url('comments')?>">
                    All
                </a>
            </li>
            <li class="<?=get('status') == 1 ? 'active' : null?>">
                <a href="<?=admin_url('comments?status=1')?>">
                    Approved
                </a>
            </li>
            <li class="<?=get('status') == 2 ? 'active' : null?>">
                <a href="<?=admin_url('comments?status=2')?>">
                    Pending
                </a>
            </li>
        </ul>
    </div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th style="width: 10px;"></th>
                <th class="hide">Comment</th>
                <th class="hide">Subject</th>
                <th class="hide">Date</th>
                <?php if(permission('comments', 'edit') || permission('comments', 'delete')):?>
                <th class="">Process</th>
                <?endif;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td>
                        <img src="<?=get_gravatar($row['comment_email']);?>" alt="" height="40px;" style="border-radius: 50%">
                    </td>
                    <td class="hide">
                        <p style="font-size: 12px; color: #666;">
                            <?= $row['comment_name'] ?> (<?= $row['comment_email'] ?>)
                            <?php if ($row['comment_status'] == 0): ?>
                                <span style="background: #999; margin-left: 10px; border-radius: 3px; color:#fff; padding: 2px 5px;">Pending</span>
                            <?php else:?>
                                <span style="background: #999; margin-left: 10px; border-radius: 3px; color:#fff; padding: 2px 5px;">Approved</span>
                            <?php endif; ?>
                        </p>
                        <p>
                            <?= $row['comment_content'] ?>
                        </p>
                    </td>
                    <td class="hide">
                        <a target="_blank" href="<?=site_url('blog/' . $row['post_url']);?>"><?=$row['post_title'];?></a>
                    </td>
                    <td class="hide" title="<?=date("d/m/Y", strtotime($row['comment_date']));?>">
                        <?= timeConvert($row['comment_date']); ?> <br> <?=date("d/m/Y", strtotime($row['comment_date']));?>
                    </td>

                    <td>
                        <?php if(permission('comments', 'edit')):?>
                            <a href="<?= admin_url('edit_comment?id=' . $row['comment_id']); ?>" class="btn">Edit</a>
                        <?php endif;?>

                        <?php if(permission('comments', 'delete')):?>
                            <a href="<?= admin_url('delete?table=comments&column=comment_id&id=' . $row['comment_id']); ?>"
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
            <?= $db->showPagination(admin_url(route(1) . '?' . $pageParam . '=[page]&status=' . get('status'))) ?>
        </ul>
    </div>
<?php endif; ?>

    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure?');
        }
    </script>

<?php require admin_view('static/footer') ?>