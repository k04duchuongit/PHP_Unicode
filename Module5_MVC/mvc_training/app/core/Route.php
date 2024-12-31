<?php
class Route
{
    function handleRoute($url)
    {
        global $routes;
        unset($routes['default_controller']);  //loại bỏ phần tử default_controller trong mảng routes
        $url = trim($url, '/');  //cắt bỏ ký tự / ở đầu và cuối chuỗi
        
        if (empty($url)) {  
            $url = '/'; 
        }

        $handleUrl = $url;
        if (!empty($routes)) {
            foreach ($routes as $key => $value) {
                if (preg_match('~' . $key . '~is', $url)) {   //kiểm tra xem url có khớp với route không
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url);  //nếu khớp thì thay thế url bằng đường dẫn thật có trong route
                }
            }
        }
        return $handleUrl;
    }
}
