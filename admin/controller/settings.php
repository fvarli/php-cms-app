<?php

if(!permission('settings', 'show')){
    permission_page();
}


$themes = [];
foreach (glob(PATH . '/app/view/*/') as $folder){
    $folder = explode('/', rtrim($folder, '/'));
    $themes[] = end($folder);
}
if(post('submit')){
    if(!permission('settings', 'edit')){
        $error = "You don't have permission to edit.";
    }else{
    $html = '<?php'.PHP_EOL.PHP_EOL;
    foreach (post('settings') as $key=>$val){
        $html .= '$settings["' . $key .'"] = "' . $val. '";'.PHP_EOL;
    }
    file_put_contents(PATH.'/app/settings.php', $html);
    header('Location:' . admin_url('settings'));
    }
}
require admin_view('settings');