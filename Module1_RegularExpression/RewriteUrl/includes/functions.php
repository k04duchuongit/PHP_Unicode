<?php
function handleUrl(&$module = null, &$action = null)
{
    global $routes;
    // echo '<pre>';
    // print_r($routes);
    // echo '</pre>';

    $url = trim($_GET['url'], '/');
    // xu ly thay the router

    if (!empty($routes)) {
        foreach ($routes as $key => $value) {
            $pattern = '~^' . $key . '$~i';                          // bieu thuc chinh quy
            if (preg_match($pattern, $url)) {                        // kiểm tra url(đường dẫn ảo) với list các router đã cho xem có trùng khôngkhông
                $url = preg_replace($pattern, $value, $url);         // nếu có thì thay đường dẫn thật vào url
                break;
            }
        }
    }

    $urlArr = array_filter(explode('/', $url));   // array_filter lọc mảng và trả về mảng có giá trị true

    if (!empty($urlArr[0])) {
        $module = $urlArr[0];
        unset($urlArr[0]);
    }

    if (!empty($urlArr[1])) {
        $action = $urlArr[1];
        unset($urlArr[1]);
    }
    $urlArr = array_values($urlArr);     // đưa index về 0 sau khi xóa

    return $urlArr;
}

function getPram($index = 0)
{
    $urlArr = handleUrl();
    if (isset($urlArr[$index])) {
        return $urlArr[$index];
    }
}

function getContentView($view, $data = [], $extType = 'html')
{
    global $module;
    $pathView = _DIR_ROOT . '/modules/' . $module . '/views/' . $view . '.' . $extType;

    if (file_exists($pathView)) {
        $contentView = file_get_contents($pathView);
        return $contentView;
    }

    return false;
}

function render($view, $data = [], $extType = 'html')
{
    if (!empty($data)) {
        extract($data);
    }
    $contentView = getContentView($view, $data, $extType);
    preg_match_all('~{{\s*(.+?)\s*}}~s', $contentView, $matches);

    if (!empty($matches[1])) {
        foreach ($matches[1] as $key => $value) {
            //  echo $matches[0][$key];
            $contentView = str_replace($matches[0][$key], '<?php echo' . $value . '; ?>', $contentView);
        }
    }
    eval("?> $contentView <?php");
    echo $contentView;
}
