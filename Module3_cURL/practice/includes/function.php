<?php
function httpGet($url, $file = null)
{
    $ch = curl_init();     // có thể đưa url muốn request
    $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.79 Safari/537.36';


    //Cấu hình CURL 
    curl_setopt($ch, CURLOPT_URL, $url);              //URL CẦN REQUEST
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $url);   //Bỏ qua kiểm tra SSL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   //Trả về kết quả sau khi thực thi
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);   // Giả lập trình duyệt
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Thiết lập timeout (30 giây)

    if (!empty($file)) {
        curl_setopt($ch, CURLOPT_FILE, $file);  // Ghi dữ liệu vào file
    }

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function downloadImage($url, $folder)
{
    $fileName = basename($url); // Lấy tên file
    $image = fopen($folder . '/' . $fileName, 'a+'); // Mở file để ghi dữ liệu
    return httpGet($url, $image); // Gọi hàm httpGet để download file

}
