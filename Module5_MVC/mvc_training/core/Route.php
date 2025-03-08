<?php
class Route {
    private $__keyRoute = null; // Lưu route key đã khớp

    /**
     * Xử lý route dựa trên danh sách định nghĩa
     * Ví dụ:
     *   - $url = "san-pham/123" → Trả về "product/detail/123" (nếu có route khớp)
     *   - $url = "" → Trả về "/"
     */
    function handleRoute($url) {
        global $routes;
        unset($routes['default_controller']); // Xóa route mặc định

        $url = trim((string)$url, '/'); // Đảm bảo không có lỗi null
        $url = empty($url) ? '/' : $url; // Nếu rỗng, gán "/"

        $handleUrl = $url;
        if (!empty($routes)) { 
            foreach ($routes as $key => $value) {
                if (preg_match('~' . $key . '~is', $url)) {    // nếu khớp route sẽ thay mục tương ứng ở dưới
                    $handleUrl = preg_replace('~' . $key . '~is', $value, $url); 
                    $this->__keyRoute = $key;
                }
            }
        }
        return $handleUrl; // Trả về URL đã xử lý
    }

    /** Lấy key route đã khớp */
    public function getUri() {
        return $this->__keyRoute;
    }

    /** Lấy URL đầy đủ */
    static public function getFullUrl() {
        return _WEB_ROOT . App::$app->getUrl();
    }
}
