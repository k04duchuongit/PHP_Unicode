Cấu hình cURL hay dùng:

1. CURLOPT_URL: Đường dẫn tới URL cần xử lý.
2. CURLOPT_RETURNTRANSFER: Trả về kết quả khi thực thi cURL hay không (true/false).
3. CURLOPT_USERAGENT: Giả lập trình duyệt.
4. CURLOPT_TIMEOUT: Thiết lập timeout cho request (thời gian chờ).
5. CURLOPT_FILE: Lưu kết quả vào file (phải mở file trước, dùng fopen).
6. CURLOPT_POST: Thiết lập gửi dữ liệu theo phương thức POST (true/false).
7. CURLOPT_POSTFIELDS: Mảng dữ liệu gửi theo phương thức POST.
8. CURLOPT_HEADER: trả về header của linh cần request hay khôngkhông
9. CURLOPT_HTTPHEADER: Thông tin mảng Header.
10. CURLOPT_INFILESIZE: Thiết lập kích thước file upload (dùng với $_FILE).
11. CURLOPT_FOLLOWLOCATION: Có cho phép chuyển hướng request (true/false).
12. CURLOPT_SSL_VERIFYPEER & CURLOPT_SSL_VERIFYHOST: 
    - Kiểm tra chứng chỉ SSL (false để bỏ qua khi dùng HTTPS).
13. CURLOPT_COOKIE: Gửi chuỗi cookie trong request.
14. CURLOPT_CUSTOMREQUEST: Chỉ định phương thức HTTP tùy chỉnh (vd: PUT, DELETE).

