<?php

// print_r($_SESSION);

if(!permission('index', 'show')){
    permission_page();
}

require admin_view('index');