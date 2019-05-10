<?php

namespace frontend\components;

use yii\base\Component;

class MyComponent extends Component {

    public function hello() {
        return "Hello, World!";
    }

    //Cắt chuỗi theo số ký tự
    public function _substr($str, $length, $minword = 3) {
        $sub = '';
        $len = 0;
        foreach (explode(' ', $str) as $word) {
            $part = (($sub != '') ? ' ' : '') . $word;
            $sub .= $part;
            $len += strlen($part);
            if (strlen($word) > $minword && strlen($sub) >= $length) {
                break;
            }
        }
        return $sub . (($len < strlen($str)) ? ' ...' : '');
    }
}
