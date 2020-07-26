<?php require admin_view('static/header')?>

    <div class="box-">
        <h1>
            Settings
        </h1>
    </div>

    <div class="box-">
        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Site Title</label>
                    <div class="form-content">
                        <input type="text" name="settings[title]" value="<?=settings('title')?>">
                    </div>
                </li>
                <li>
                    <label>Site Description</label>
                    <div class="form-content">
                        <input type="text" name="settings[description]" value="<?=settings('description')?>">
                    </div>
                </li>
                <li>
                    <label>Site Keywords</label>
                    <div class="form-content">
                        <input type="text" name="settings[keywords]" value="<?=settings('keywords')?>">
                    </div>
                </li>
            </ul>
            <h1>Profile Settings</h1>
            <ul>
                <li>
                    <label>About Me</label>
                    <div class="form-content">
                        <textarea name="settings[about_me]" cols="30" rows="5"><?=settings('about_me')?></textarea>
                    </div>
                </li>
                <li>
                    <label>Facebook</label>
                    <div class="form-content">
                        <input type="text" name="settings[facebook]" value="<?=settings('facebook')?>">
                    </div>
                </li>
                <li>
                    <label>Twitter</label>
                    <div class="form-content">
                        <input type="text" name="settings[twitter]" value="<?=settings('twitter')?>">
                    </div>
                </li>
                <li>
                    <label>Instagram</label>
                    <div class="form-content">
                        <input type="text" name="settings[instagram]" value="<?=settings('instagram')?>">
                    </div>
                </li>
                <li>
                    <label>LinkedIn</label>
                    <div class="form-content">
                        <input type="text" name="settings[linkedin]" value="<?=settings('linkedin')?>">
                    </div>
                </li>
            </ul>
            <h1>Theme Settings</h1>
            <ul>
                <li>
                    <label>Logo Title</label>
                    <div class="form-content">
                        <input type="text" name="settings[logo_title]" value="<?=settings('logo_title')?>">
                    </div>
                </li>
                <li>
                    <label>Welcome Title</label>
                    <div class="form-content">
                        <input type="text" name="settings[welcome_title]" value="<?=settings('welcome_title')?>">
                    </div>
                </li>
                <li>
                    <label>Welcome Content</label>
                    <div class="form-content">
                        <textarea name="settings[welcome_content]" cols="30" rows="5"><?=settings('welcome_content')?></textarea>
                    </div>
                </li>
                <li>
                    <label>Search Placeholder</label>
                    <div class="form-content">
                        <input type="text" name="settings[search_placeholder]" value="<?=settings('search_placeholder')?>">
                    </div>
                </li>
                <li>
                    <label>Site Themes</label>
                    <div class="form-content">
                        <select name="settings[theme]">
                            <option value="">Select A Theme</option>
                            <?php foreach ($themes as $theme): ?>
                                <option <?=settings('theme') == $theme ? 'selected' : null?> value="<?=$theme?>"><?=$theme?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </li>
            </ul>
            <h1>Maintenance Mode Settings</h1>
            <ul>
                <li>
                    <label>Maintenance Mode</label>
                    <div class="form-content">
                        <select name="settings[maintenance_mode]">
                            <option <?=settings('maintenance_mode') == 1 ? 'selected' : null?> value="1">Yes</option>
                            <option <?=settings('maintenance_mode') == 2 ? 'selected' : null?> value="2">No</option>
                        </select>
                    </div>
                </li>
                <li>
                    <label>Title</label>
                    <div class="form-content">
                        <input type="text" name="settings[maintenance_mode_title]" value="<?=settings('maintenance_mode_title')?>">
                    </div>
                </li>
                <li>
                    <label>Description</label>
                    <div class="form-content">
                        <textarea name="settings[maintenance_mode_description]" cols="30" rows="5"><?=settings('maintenance_mode_description')?></textarea>
                    </div>
                </li>
            </ul>
            <ul>
                <li class="submit">
                    <input type="hidden" name="submit" value="1">
                    <button type="submit">Save Changes</button>
                </li>
            </ul>


        </form>
    </div>

<?php require admin_view('static/footer')?>