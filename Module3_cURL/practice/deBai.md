# Thực hành cURL

## **Bài 1**: Sử dụng cURL viết chương trình lấy nội dung từ website khác
- **Gợi ý**:
  - Dùng `cURL GET` để gửi yêu cầu lấy nội dung.
  - Kết hợp với **Regular Expression** để phân tích và trích xuất dữ liệu từ nội dung HTML.

---

## **Bài 2**: Sử dụng cURL download ảnh từ website khác về server
- **Gợi ý**:
  - Dùng `cURL GET` để tải ảnh từ URL.
  - Xử lý và lưu ảnh dưới dạng file trên server (sử dụng hàm `fopen` hoặc `file_put_contents`).

---

## **Bài 3**: Sử dụng cURL đăng nhập vào website khác
- **Gợi ý**:
  - Kết hợp `cURL POST` để gửi thông tin đăng nhập (username, password).
  - Sau đó, sử dụng `cURL GET` để lấy nội dung các trang cần thiết sau khi đăng nhập.
  - Có thể cần dùng **Regular Expression** để xử lý cookies và các thông tin phản hồi.

---

## **Bài 4**: Dùng cURL upload file lên website khác
- **Gợi ý**:
  - Dùng `cURL POST` để gửi file (sử dụng tùy chọn `CURLOPT_POSTFIELDS` để truyền file dưới dạng multipart/form-data).
