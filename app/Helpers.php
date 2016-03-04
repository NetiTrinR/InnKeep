<?php

if(!function_exists('title_case')){
    function title_case($str){
        ucwords(str_replace("_", " ", snake_case(strtolower($str))));
    }
}