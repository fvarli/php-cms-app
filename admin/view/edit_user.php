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
            
            <li>
                <label for="">Role</label>
                <div class="form-content">
                    <select name="user_rank" id="user_rank">
                        <?php foreach (user_ranks() as $id =>$rank):?>
                            <option <?=(post('user_rank') ? post('user_rank') : $row['user_rank']) == $id ? ' selected' : null;?> value="<?=$id?>"><?=$rank?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </li>

            <li>
                <label for="permissions">Permissions</label>
                <div class="form-content">
                    <div class="permissions">
                        <?php foreach ($menu_list as $url => $menu):?>
                            <div>
                                <h3><b><?=$menu['title'];?> </b></h3>
                                <div class="list">
                                    <?php foreach ($menu['permissions'] as $key => $val): ?>
                                        <label>
                                            <input <?=(isset($permissions[$url][$key]) && $permissions[$url][$key] == 1 ? ' checked' : null)?> name="user_permissions[<?=$url?>][<?=$key?>]" value="1" type="checkbox">
                                            <?=$val?>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <style>
                    .permissions{
                        border: 1px solid #ccc;
                        background: #fff;
                        max-width: 400px;
                        padding: 10px;
                    }
                    .permissions h3{
                        padding-bottom: 10px;
                    }
                    .permissions div:last-child .list{
                        padding-bottom: 0px;
                    }
                    .permissions .list{
                        padding-bottom: 15px;
                    }
                    .permissions .list label{
                        float: none !important;
                        display: inline-block;
                        width: auto !important;
                        font-weight: normal !important;
                        margin-right: 10px;
                    }
                </style>
            </li>

            <li class="submit">
                <button name="submit" value="1" type="submit">Save Changes</button>
            </li>
        </ul>
    </form>
</div>

<?php require admin_view('static/footer')?>

