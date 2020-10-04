<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Add Page
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-" tab>

        <div class="admin-tab">
            <ul tab-list>
                <li>
                    <a href="#">General</a>
                </li>
                <li>
                    <a href="#">SEO</a>
                </li>
            </ul>
        </div>

        <form action="" method="post" class="form label">
            <div class="tab-container">
                <div tab-content>
                    <ul>
                        <li>
                            <label>Page Title</label>
                            <div class="form-content">
                                <input type="text" name="page_title" value="<?= post('page_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Page Content</label>
                            <div class="form-content">
                                <textarea name="page_content" id="" cols="30" rows="10"><?=post('page_content')?></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <div tab-content>
                    <ul>
                        <li>
                            <label>SEO Url</label>
                            <div class="form-content">
                                <input type="text" name="page_url" value="<?=post('page_url')?>">
                                <p>If you don't enter, it takes page name.</p>
                            </div>
                        </li>
                        <li>
                            <label>SEO Title</label>
                            <div class="form-content">
                                <input type="text" name="page_seo[title]">
                            </div>
                        </li>
                        <li>
                            <label>SEO Description</label>
                            <div class="form-content">
                                <textarea name="page_seo[description]" class="editor" cols="30" rows="5"></textarea>
                            </div>
                        </li>
                    </ul>
                </div>
                <ul>
                    <li class="submit">
                        <input type="hidden" name="submit" value="1">
                        <button type="submit">Save</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>

<?php require admin_view('static/footer') ?>