<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Edit Subject
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
                            <label>Subject Title</label>
                            <div class="form-content">
                                <input type="text" name="post_title" value="<?= post('post_title') ? post('post_title') : $row['post_title'];?>">
                            </div>
                        </li>
                        <li>
                            <label>Subject Short Content</label>
                            <div class="form-content">
                                <textarea name="post_short_content" class="short-editor" id="" cols="30"
                                          rows="10"><?= post('post_short_content') ? post('post_short_content') : $row['post_short_content']; ?></textarea>
                            </div>
                        </li>
                        <li>
                            <label>Subject Content</label>
                            <div class="form-content">
                                <textarea name="post_content" class="editor" id="" cols="30"
                                          rows="10"><?= post('post_content') ? post('post_content') : $row['post_content']; ?></textarea>
                            </div>
                        </li>

                        <li>
                            <label>Subject Tag</label>
                            <div class="form-content">
                                <input type="text" name="post_tags" value="<?=post('post_tags') ? post('post_tags') : implode(',', $postTags)?>" class="tagsinput">

                                <p>Please enter between each tag.</p>
                            </div>
                        </li>
                        <li>
                            <label>Subject Category</label>
                            <div class="form-content">
                                <select name="post_categories[]" id="" multiple>
                                    <?php foreach ($categories as $category): ?>
                                        <option <?=in_array($category['category_id'], explode(',', $row['post_categories'])) ? 'selected':null;?> value="<?= $category['category_id']; ?>"><?= $category['category_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>Subject Status</label>
                            <div class="form-content">
                                <select name="post_status" id="">
                                    <option value="1" <?=(post('post_status') ? post('post_status') : $row['post_status']) == 1 ? 'selected' : null;?>>Published</option>
                                    <option value="2" <?=(post('post_status') ? post('post_status') : $row['post_status']) == 2 ? 'selected' : null;?>>Draft</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div tab-content>
                    <ul>
                        <li>
                            <label>SEO Url</label>
                            <div class="form-content">
                                <input type="text" name="post_url" value="<?= post('post_url') ? post('post_url') : $row['post_url']; ?>">
                                <p>If you don't enter, it takes page name.</p>
                            </div>
                        </li>
                        <li>
                            <label>SEO Title</label>
                            <div class="form-content">
                                <input type="text" name="post_seo[title]" value="<?=$seo['title']?>">
                            </div>
                        </li>
                        <li>
                            <label>SEO Description</label>
                            <div class="form-content">
                                <textarea name="post_seo[description]" class="editor" cols="30" rows="5"><?=$seo['description'];?></textarea>
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

    <script>
        let tags = ['<?=implode("','",$tagsArr)?>'];
    </script>

<?php require admin_view('static/footer') ?>