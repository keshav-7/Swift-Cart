<?php

function pre()
{
    $fn_args = func_get_args();
    if(!empty($fn_args)){
        echo '<pre>';
        foreach ($fn_args as $fb) {
            print_r($fb);
            echo '<br>';
        }
        echo '</pre>';
        echo PHP_EOL;
    }    
}