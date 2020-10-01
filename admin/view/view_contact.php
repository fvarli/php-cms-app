<?php require admin_view('static/header') ?>

<div class="box-">
    <h1>
        View Contact Messages
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-container container-50">

    <?php if ($row['contact_read'] == 1): ?>
        <div class="message success box-">
            Received <?= timeConvert($row['contact_date']); ?>. -
            Date: <?= date('d/m/Y', strtotime($row['contact_date'])); ?>
            <br>
            <br>
            This message was read <?= timeConvert($row['contact_read_date']); ?> by
            <strong><?= $row['user_name']; ?></strong>.
        </div>
    <?php endif; ?>

    <div class="box-">

        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label for="contact_id">Contact ID</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_id']; ?>
                    </div>
                </li>

                <li>
                    <label for="contact_name">Contact Name</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_name']; ?>
                    </div>
                </li>

                <li>
                    <label for="contact_email">Contact Email</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_email']; ?>
                    </div>
                </li>

                <? if ($row['contact_phone']): ?>
                    <li>
                        <label for="contact_phone">Contact Phone</label>
                        <div class="form-content" style="padding-top: 12px;">
                            <?= $row['contact_phone']; ?>
                        </div>
                    </li>
                <? endif; ?>

                <li>
                    <label for="contact_subject">Contact Subject</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= $row['contact_subject']; ?>
                    </div>
                </li>

                <li>
                    <label for="contact_message">Contact Message</label>
                    <div class="form-content" style="padding-top: 12px;">
                        <?= nl2br($row['contact_message']); ?>
                    </div>
                </li>

            </ul>
        </form>
    </div>
</div>

<div class="box-container container-50">
    <div class="box" id="div-1">
        <h3>
            Reply to
        </h3>
        <div class="box-content">
            <div class="message success box-" style="display: none" id="success"></div>
            <div class="message error box-" style="display: none;" id="error"></div>
            <form action="" id="email_form" onsubmit="return false;" class="form">
                <input type="hidden" name="name" value="<?=$row['contact_name']?>">
                <ul>
                    <li>
                        <input type="text" id="input" name="subject" placeholder="Subject" value="RE: <?=$row['contact_subject']?>">
                    </li>
                    <li>
                        <input type="text" id="input" name="email" placeholder="Email Address" value="<?=$row['contact_email']?>">
                    </li>
                    <li>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Message Content"></textarea>
                    </li>
                    <li>
                        <button onclick="send_email('#email_form')" type="submit">Submit</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

<?php require admin_view('static/footer') ?>

