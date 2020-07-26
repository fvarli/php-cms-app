<?php require view('static/header')?>
<div class="container">
    <div class="row justify-content-md-center mt-4">

        <div class="col-md-4">
            <form action="" method="post">
                <h3 class="mb-3">Sign Up</h3>
                <?php if($error = error()):?>
                    <div class="alert alert-danger" role="alert">
                        <?=$error?>
                    </div>
                <?php endif;?>
                <?php if($success = success()):?>
                    <div class="alert alert-success" role="alert">
                        <?=$success?>
                    </div>
                <?php endif;?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="<?=post('username')?>" class="form-control" name="username" id="username"placeholder="Type username...">
                </div>
                <div class="form-group">
                    <label for="email">E-mail Address</label>
                    <input type="text"value="<?=post('email')?>" class="form-control" name="email" id="email"placeholder="Type e-mail address...">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" value="<?=post('password')?>" class="form-control" name="password" id="password" placeholder="*******">
                </div>
                <div class="form-group">
                    <label for="password-again">Again Password</label>
                    <input type="password" value="<?=post('re_password')?>" class="form-control" name="re_password" id="re_password" placeholder="*******">
                </div>
                <input type="hidden" name="submit" value="1">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>

    </div>
</div>

<?php require view('static/footer')?>