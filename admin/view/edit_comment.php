<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Edit Comment
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">

        <div style="background: rgba(13,136,193,0.07); padding: 15px; border: 1px solid #0D88C1; margin-bottom: 15px">
            <a style="color: #0D88C1" href="<?=site_url('blog/' . $row['post_url'])?>" target="_blank"> The comment was written by <?=$row['user_name'] ? $row['user_name'] : $row['comment_name']?> for <strong><?=$row['post_title']?></strong> at <?=timeConvert($row['comment_date'])?>.</a>
        </div>

        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Written By</label>
                    <div class="form-content">
                        <input type="text" name="comment_name"
                               value="<?= post('comment_name') ? post('comment_name') : $row['comment_name'] ?>">
                    </div>
                </li>
                <li>
                    <label>Email</label>
                    <div class="form-content">
                        <input type="text" name="comment_email"
                               value="<?= post('comment_email') ? post('comment_email') : $row['comment_email'] ?>">
                    </div>
                </li>
                <li>
                    <label>Comment</label>
                    <div class="form-content">
                        <textarea name="comment_content" cols="30"
                                  rows="5"><?= post('comment_content') ? post('comment_content') : $row['comment_content'] ?></textarea>
                    </div>
                </li>
                <li>
                    <label>Status</label>
                    <div class="form-content">
                        <select name="comment_status">
                            <option value="1"<?=$row['comment_status'] == 1 ? ' selected' : null?>>Approved</option>
                            <option value="0"<?=$row['comment_status'] == 0 ? ' selected' : null?>>Pending</option>
                        </select>
                    </div>
                </li>
                <li class="submit">
                    <input type="hidden" name="submit" value="1">
                    <button type="submit">Send</button>
                </li>
            </ul>
        </form>
    </div>

<?php require admin_view('static/footer') ?>