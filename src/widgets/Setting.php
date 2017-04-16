<?php
namespace yiip\lte\widgets;

use yii\base\Widget;

class Setting extends Widget
{
    public function run()
    {
        return $this->render('setting');
    }
}