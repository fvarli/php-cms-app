<div class="container">
    <div class="row">
        <div class="col-md-12">
            <footer class="pt-4 my-md-5 pt-md-5 border-top">
                <div class="row">
                    <div class="col-12 col-md">
                        <img class="mb-2" src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" alt=""
                             width="24" height="24">
                        <small class="d-block mb-3 text-muted">
								&copy;<?=date("Y")?> <a href="<?=site_url()?>"><?=settings('logo_title')?></a>
                        </small>
                    </div>
                    <div class="col-12 col-md">
                        <h5>Features</h5>
                        <ul class="list-unstyled text-small">
                            <li><a class="text-muted" href="#">Cool stuff</a></li>
                            <li><a class="text-muted" href="#">Random feature</a></li>
                            <li><a class="text-muted" href="#">Team feature</a></li>
                            <li><a class="text-muted" href="#">Stuff for developers</a></li>
                            <li><a class="text-muted" href="#">Another one</a></li>
                            <li><a class="text-muted" href="#">Last time</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md pr-5">
                        <h5>About Me</h5>
                        <p class="small">
                            <?=settings('about_me')?>
                        </p>
                    </div>
                    <div class="col-12 col-md">
                        <h5>Social Media</h5>
                        <ul class="list-unstyled text-small">
                            <?php if($facebook = settings('facebook')): ?>
                            <li><a class="text-muted" href="https://facebook.com/<?=$facebook?>" target="_blank"><i class="fab fa-facebook-square"></i> <?=$facebook?></a>
                            </li>
                            <?php endif;?>
                            <?php if($twitter = settings('twitter')): ?>
                                <li><a class="text-muted" href="https://twitter.com/<?=$twitter?>" target="_blank"><i class="fab fa-twitter-square"></i> <?=$twitter?></a>
                                </li>
                            <?php endif;?>
                            <?php if($instagram = settings('instagram')): ?>
                                <li><a class="text-muted" href="https://instagram.com/<?=$instagram?>" target="_blank"><i class="fab fa-instagram"></i> <?=$instagram?></a>
                                </li>
                            <?php endif;?>
                            <?php if($linkedin = settings('linkedin')): ?>
                                <li><a class="text-muted" href="https://linkedin.com/in/<?=$linkedin?>" target="_blank"><i class="fab fa-linkedin"></i> <?=$linkedin?></a>
                                </li>
                            <?php endif;?>

                        </ul>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>

</body>
</html>