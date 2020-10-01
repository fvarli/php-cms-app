<?php

if(!permission('menu', 'add')){
    permission_page();
}

if(post('submit')){

    $menu = [];
    $menu_title = post('menu_title');
    if(!$menu_title){
        $error = "You should enter menu title.";
    }elseif(count(array_filter(post('title'))) == 0){
        $error = "You should enter at least one menu content.";
    } else{

        $urls = post('url');
        foreach (post('title') as $key => $title){
            $arr = [
                'title' => $title,
                'url' => $urls[$key]
            ];
            if(post('sub_title_' . $key)){
                $submenu = [];
                $sub_urls = post('sub_url_' . $key);
                foreach (post('sub_title_'. $key) as $k => $subtitle){
                    $submenu[] = [
                        'title'=> $subtitle,
                        'url' => $sub_urls[$k]
                    ];
                }
                $arr['submenu'] = $submenu;
            }
            $menu[] = $arr;
        }

        // add menu to database
        $query = $db->prepare('INSERT INTO menu SET menu_title = :menu_title, menu_content = :menu_content');
        $result = $query->execute([
            'menu_title' => $menu_title,
            'menu_content' => json_encode($menu)
        ]);

        if($result){
            header('Location:'.admin_url('menu'));
        }else{
            $error = "Something went wrong.";
        }

    }
}

require admin_view('add_menu');