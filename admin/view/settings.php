<?php require admin_view('static/header') ?>

    <div class="box-">
        <h1>
            Settings
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-" tab>
        <div class="admin-tab">
            <ul tab-list>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li>
                    <a href="#">Profile Settings</a>
                </li>
                <li>
                    <a href="#">Theme Settings</a>
                </li>
                <li>
                    <a href="#">Maintenance Mode Settings</a>
                </li>
                <li>
                    <a href="#">SMTP Settings</a>
                </li>

            </ul>
        </div>


        <form action="" method="post" class="form label">
            <div class="tab-container">
                <div tab-content>
                    <ul>
                        <li>
                            <label>Site Title</label>
                            <div class="form-content">
                                <input type="text" name="settings[title]" value="<?= settings('title') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Site Description</label>
                            <div class="form-content">
                                <input type="text" name="settings[description]" value="<?= settings('description') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Site Keywords</label>
                            <div class="form-content">
                                <input type="text" name="settings[keywords]" value="<?= settings('keywords') ?>">
                            </div>
                        </li>
                    </ul>
                </div>

                <div tab-content>
                    <ul>
                        <li>
                            <label>About Me</label>
                            <div class="form-content">
                                <textarea name="settings[about_me]" cols="30"
                                          rows="5"><?= settings('about_me') ?></textarea>
                            </div>
                        </li>
                        <li>
                            <label>Facebook</label>
                            <div class="form-content">
                                <input type="text" name="settings[facebook]" value="<?= settings('facebook') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Twitter</label>
                            <div class="form-content">
                                <input type="text" name="settings[twitter]" value="<?= settings('twitter') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Instagram</label>
                            <div class="form-content">
                                <input type="text" name="settings[instagram]" value="<?= settings('instagram') ?>">
                            </div>
                        </li>
                        <li>
                            <label>LinkedIn</label>
                            <div class="form-content">
                                <input type="text" name="settings[linkedin]" value="<?= settings('linkedin') ?>">
                            </div>
                        </li>
                    </ul>
                </div>

                <div tab-content>
                    <ul>
                        <li>
                            <label>Logo Title</label>
                            <div class="form-content">
                                <input type="text" name="settings[logo_title]" value="<?= settings('logo_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Welcome Title</label>
                            <div class="form-content">
                                <input type="text" name="settings[welcome_title]"
                                       value="<?= settings('welcome_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Welcome Content</label>
                            <div class="form-content">
                        <textarea name="settings[welcome_content]" cols="30"
                                  rows="5"><?= settings('welcome_content') ?></textarea>
                            </div>
                        </li>
                        <li>
                            <label>Search Placeholder</label>
                            <div class="form-content">
                                <input type="text" name="settings[search_placeholder]"
                                       value="<?= settings('search_placeholder') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Site Themes</label>
                            <div class="form-content">
                                <select name="settings[theme]">
                                    <option value="">Select A Theme</option>
                                    <?php foreach ($themes as $theme): ?>
                                        <option <?= settings('theme') == $theme ? 'selected' : null ?>
                                                value="<?= $theme ?>"><?= $theme ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>

                <div tab-content>
                    <ul>
                        <li>
                            <label>Maintenance Mode</label>
                            <div class="form-content">
                                <select name="settings[maintenance_mode]">
                                    <option <?= settings('maintenance_mode') == 1 ? 'selected' : null ?> value="1">Yes
                                    </option>
                                    <option <?= settings('maintenance_mode') == 2 ? 'selected' : null ?> value="2">No
                                    </option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>Title</label>
                            <div class="form-content">
                                <input type="text" name="settings[maintenance_mode_title]"
                                       value="<?= settings('maintenance_mode_title') ?>">
                            </div>
                        </li>
                        <li>
                            <label>Description</label>
                            <div class="form-content">
                        <textarea name="settings[maintenance_mode_description]" cols="30"
                                  rows="5"><?= settings('maintenance_mode_description') ?></textarea>
                            </div>
                        </li>
                    </ul>
                </div>

                <div tab-content>
                    <ul>
                        <li>
                            <label>SMTP Host</label>
                            <div class="form-content">
                                <input type="text" name="settings[smtp_host]" value="<?= settings('smtp_host') ?>">
                            </div>
                        </li>
                        <li>
                            <label>SMTP Email</label>
                            <div class="form-content">
                                <input type="text" name="settings[smtp_email]" value="<?= settings('smtp_email') ?>">
                            </div>
                        </li>
                        <li>
                            <label>SMTP Password</label>
                            <div class="form-content">
                                <input type="password" name="settings[smtp_password]"
                                       value="<?= settings('smtp_password') ?>">
                            </div>
                        </li>
                        <li>
                            <label>SMTP Secure</label>
                            <div class="form-content">
                                <select name="settings[smtp_secure]" id="">
                                    <option <?= settings('smtp_secure') == 'ssl' ? 'selected' : null; ?> value="ssl">SSL
                                    </option>
                                    <option <?= settings('smtp_secure') == 'tls' ? 'selected' : null; ?> value="tls">TLS
                                    </option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>SMTP Port</label>
                            <div class="form-content">
                                <input type="text" name="settings[smtp_port]" value="<?= settings('smtp_port') ?>">
                            </div>
                        </li>
                        <li>
                            <label>SMTP Email Sender</label>
                            <div class="form-content">
                                <input type="text" name="settings[smtp_email_sender]"
                                       value="<?= settings('smtp_email_sender') ?>">
                            </div>
                        </li>
                        <li>
                            <label>SMTP Email Sender Name</label>
                            <div class="form-content">
                                <input type="text" name="settings[smtp_email_sender_name]"
                                       value="<?= settings('smtp_email_sender_name') ?>">
                            </div>
                        </li>
                    </ul>
                </div>

                <ul>
                    <li class="submit">
                        <input type="hidden" name="submit" value="1">
                        <button type="submit">Save Changes</button>
                    </li>
                </ul>

            </div>
        </form>
    </div>

<?php require admin_view('static/footer') ?>