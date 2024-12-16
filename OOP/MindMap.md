# OOP PHP - Các nội dung cơ bản cần học

## Class và Object

- **Class**: Khuôn mẫu để tạo đối tượng.
- **Object**: Thể hiện cụ thể của class.

## Access Range (Phạm vi truy cập)

- **Public**: Có thể truy cập từ mọi nơi.
- **Protected**: Chỉ truy cập được trong class đó và các class con.
- **Private**: Chỉ truy cập được trong class hiện tại.

## Extends (Kế thừa)

- Class con kế thừa thuộc tính và phương thức của class cha.

## Property Static, Method Static

- Thuộc tính và phương thức được khai báo với `static`.
- Gọi bằng `self` hoặc `static` trong nội bộ class.

## Trait

- Cho phép chia sẻ phương thức giữa nhiều class (giống kế thừa nhưng linh hoạt hơn).

## Namespace

- Tổ chức code thành các không gian tên để tránh xung đột tên class.

## Magic Method (Phương thức ma thuật)

- `__construct`: Hàm khởi tạo.
- `__destruct`: Hàm hủy.
- `__get`: Lấy giá trị thuộc tính không tồn tại.
- `__set`: Gán giá trị cho thuộc tính không tồn tại.
- `__call`: Gọi phương thức không tồn tại.
- `__callStatic`: Gọi phương thức tĩnh không tồn tại.

## Interface

- Định nghĩa các phương thức mà class phải triển khai.

## Abstract Class

- Class không thể tạo đối tượng trực tiếp, bắt buộc phải kế thừa.

## Call Multiple Methods

- Triển khai và gọi nhiều phương thức trong một class hoặc class kế thừa.