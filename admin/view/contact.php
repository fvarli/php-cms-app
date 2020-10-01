<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Contact Messages
            <!--<a href="#">Members</a>-->
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
            <tr>
                <th width="80">Status</th>
                <th class="hide">Full Name</th>
                <th class="hide">Email</th>
                <th class="hide">Phone</th>
                <th class="hide">Subject</th>
                <th class="hide">Date</th>
                <?php if(permission('contact', 'edit') || permission('contact', 'delete')):?>
                <th class="">Process</th>
                <?endif;;?>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $row): ?>
                <tr>
                    <td>
                        <?php if($row['contact_read'] == 1):?>
                        <div style="background: green; color: #fff; padding: 3px 6px;border-radius: 3px; text-align: center">Read</div>
                        <?php else: ?>
                            <div style="background: darkred; color: #fff; padding: 3px 6px;border-radius: 3px; text-align: center;">Not Read</div>
                        <?php endif;?>
                    </td>

                    <td>
                        <a href="<?= admin_url('view_contact?id=' . $row['contact_id']); ?>" class="title">
                            <?= $row['contact_name']; ?>
                        </a>
                    </td>
                    <td class="hide">
                        <a href="#"><?= $row['contact_email']; ?></a>
                    </td>
                    <td class="hide">
                        <a href="#"><?= $row['contact_phone']; ?></a>
                    </td>
                    <td class="hide">
                        <a href="#"><?= $row['contact_subject']; ?></a>
                    </td>
                    <td class="hide">
                        <a href="#">received <?= timeConvert($row['contact_date']); ?></a>
                        <?php if($row['contact_read_date']):?>
                            <div style="color: #999; font-size: 12px">
                                read <?=timeConvert($row['contact_read_date']);?>
                                <br>
                                <strong>read by:</strong> <?=$row['user_name'];?>
                            </div>
                        <?php else:?>
                            <div style="color: #999; font-size: 12px">
                                not read yet
                            </div>
                        <?php endif;?>
                    </td>
                    <td>
                        <?php if(permission('contact', 'edit')):?>
                            <a href="<?= admin_url('view_contact?id=' . $row['contact_id']); ?>" class="btn">View</a>
                        <?php endif;?>

                        <?php if(permission('users', 'delete')):?>
                            <a href="<?= admin_url('delete?table=contact&column=contact_id&id=' . $row['contact_id']); ?>"
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