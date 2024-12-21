<?php
/*
 * Anonymouse function
 * IIFE
 * Closure
 * Callback
 */

// Anonymous function
//Định nghĩa hàm ẩn danh

// Định nghĩa hàm ẩn danh và gọi hàm
$param1 = 'Học PHP';
call_user_func(function ($param1) {
    echo 'Hello Unicode: ' . $param1;
}, $param1);

echo '<br>';

/* 2. IIFE: Gọi hàm luôn ngay sau khi khởi tạo */
$param1 = 'Học Javascript';
(function ($param1) {
    echo 'Hello Unicode: ' . $param1;
})($param1);


// 3. Closure

$functionName = function ($param1, $param2) {
    return $param1 + $param2;
};

echo $functionName(1, 2);


/* 4.  CallBack */
function setTimeOut ($callback) {
    call_user_func($callback);
}

setTimeOut(function () {
    echo 'Hello Unicode';
});
