<?php
class App
{
    private $__controller, $__action, $__params, $__routes;
    static public $app;
    function __construct()
    {
        global $routes, $config;
        self::$app = $this;

        $this->__routes = new Route();

        if (!empty($routes['default_controller'])) {
            $this->__controller = $routes['default_controller'];
        }

        $this->__action = 'index';
        $this->__params = [];

        $url = $this->handleUrl();
    }

    function getUrl()
    {
        if (!empty($_SERVER['PATH_INFO'])) {
            $url = $_SERVER['PATH_INFO'];
        } else {
            $url = '/';
        }
        return $url;
    }

    public function handleUrl()
    {
        $url = $this->getUrl();

        $url =  $this->__routes->handleRoute($url);

        $urlArr = array_filter(explode('/', $url));    //tách chuỗi thành mảng và loại bỏ các phần tử rỗng
        $urlArr = array_values($urlArr);    //đánh lại key của mảng

        $urlCheck = ''; // Khởi tạo chuỗi rỗng để xây dựng đường dẫn


        if (!empty($urlArr)) {
            foreach ($urlArr as $key => $item) {
                $urlCheck .= $item . '/';               // Nối các phần tử với ký tự '/' để tạo đường dẫn
                $fileCheck = rtrim($urlCheck, '/');     // Loại bỏ ký tự '/' ở cuối chuỗi
                $fileArr = explode('/', $fileCheck);   // Tách chuỗi thành mảng các phần tử dựa trên dấu '/'
                $fileArr[count($fileArr) - 1] = ucfirst($fileArr[count($fileArr) - 1]);        // Viết hoa chữ cái đầu của phần tử cuối cùng trong mảng

                $fileCheck = implode('/', $fileArr); // Ghép lại các phần tử mảng thành chuỗi với dấu '/'
                if (!empty(($urlArr[$key - 1]))) {
                    unset($urlArr[$key - 1]);
                }

                if (file_exists('app/controllers/' . ($fileCheck) . '.php')) {
                    // Kiểm tra file có tồn tại trong thư mục app/controllers/admin không
                    $urlCheck = $fileCheck; // Lưu giá trị file hợp lệ vào $urlCheck
                    break; // Thoát khỏi vòng lặp khi tìm thấy file
                }
            }
            $urlArr = array_values($urlArr); // Đánh lại key của mảng
        }



        // xử lý controller
        if (!empty($urlArr[0])) {

            $this->__controller = ucfirst($urlArr[0]); //ucfirst: chuyển ký tự đầu tiên của chuỗi thành chữ hoa
        } else {
            $this->__controller = ucfirst($this->__controller);   // nếu không có controller thì mặc định là home
        }

        if (empty($urlCheck)) {   // xử lý khi không có đường dẫn (thì vào trang chủ)
            $urlCheck = $this->__controller;
        }
        if (file_exists('app/controllers/' . $urlCheck . '.php')) {
            require_once 'controllers/' . $urlCheck  . '.php';

            $this->__controller = new $this->__controller; //tạo đối tượng mới từ class (tên lớp ở đây là giá trị động)
            unset($urlArr[0]);
        } else {
            $this->loadError('404');
        }


        //xử lý action
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        //Xử lý params
        $this->__params = array_values($urlArr);

        //Kiểm tra method tồn tại
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params); // gọi hàm , hoặc phương thức của đối tượng khi không biết số lượng tham số truyền vào
        } else {
            $this->loadError();
        }
    }

    public function loadError($name = '404', $data = [])
    {
        extract($data);
        require_once 'errors/' . $name . '.php';
    }
}
