<?php require admin_view('static/header')?>

<div class="box-">
    <h1>
        Edit Member
    </h1>
</div>

<div class="clear" style="height: 10px;"></div>

<div class="box-">
    <form action="" method="post" class="form label">
        <ul>
            <li>
                <label for="user_name">User Name</label>
                <div class="form-content">
                    <input type="text" id="user_name" name="user_name" value="<?=post('user_name') ? post('user_name') : $row['user_name'];?>">
                </div>
            </li>

            <li>
                <label for="email">Email</label>
                <div class="form-content">
                    <input type="text" id="user_email" name="user_email" value="<?=post('user_email') ? post('user_email') : $row['user_email'];?>">
                </div>
            </li>

            <li class="submit">
                <button name="submit" value="1" type="submit">Save Changes</button>
            </li>
        </ul>
    </form>
</div>

<?php require admin_view('static/footer')?>

