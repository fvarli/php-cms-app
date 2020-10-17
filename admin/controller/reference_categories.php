<?php

if(!permission('reference_categories', 'show')){
    permission_page();
}

$query = $db->from('reference_categories')->orderBy('category_order', 'ASC')->all();



require admin_view('reference_categories');