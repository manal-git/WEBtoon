<?php
class Controller {
    protected function redirect($url, $params = []) {
        $query = http_build_query($params);
        $redirectUrl = $url . ($query ? "?$query" : "");
        header("Location: $redirectUrl");
        exit();
    }

    protected function renderView($view, $data = []) {
        extract($data);
        include dirname(__DIR__) . "/views/$view.php";
    }

    protected function getPostData($key, $default = null) {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    protected function validateRequired($data, $fields) {
        foreach ($fields as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }
}
?>