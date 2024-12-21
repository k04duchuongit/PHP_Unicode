<?php 
require_once '../Classes/Number.php';

//thuộc tính tĩnh của một class không liên quan đến các instance (đối tượng) khác nhau
// mà thuộc về chính class đó. Điều này có nghĩa là bất kỳ sự thay đổi nào đối với một thuộc tính tĩnh đều sẽ ảnh hưởng đến tất cả các đối tượng của class đó.

$number = new Number();  // gia tri la : 1
$number2 = new Number();   // gia tri la : 2


// với thuộc tính tĩnh thì giá trị không được làm mới như thuộc tính bình thường mà vẫn lấy giá trị cũ để thực hiện
?>