<?php require admin_view('static/header') ?>


    <!--login screen-->
    <div class="login-screen">

        <!--login logo-->
        <div class="login-logo">
            <a href="#">
                <img src="<?=admin_public_url('')?>" alt="">
            </a>
        </div>

        <?php if (isset($error)): ?>
            <div class="message error box-">
                <?= $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Username</label>
                    <input type="text" id="user_name" name="user_name">
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" id="user_password" name="user_password">
                </li>
                <li>
                    <button type="submit" value="1" name="submit">Login</button>

                </li>
            </ul>
        </form>

    </div>

<?php require admin_view('static/footer') ?>