<?php

// 空白が入っていた場合にtrueに
function validate_empty($target) {
    if(empty($target)) {
        $is_empty = true;
    } else {
        $is_empty = false;
    };

    return $is_empty;
};

// 数値以外が入っていた場合にtrueに
function validate_int($target) {
    if(preg_match("/[^0-9]/", $target)) {
        $is_int = true;
    } else {
        $is_int = false;
    };
    
    return $is_int;
};

?>