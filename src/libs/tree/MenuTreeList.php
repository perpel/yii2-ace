<?php
namespace yiip\lte\libs\tree;

use yii\helpers\ArrayHelper;

class MenuTreeList
{
    public function treeList($tree)
    {
        $menu = [];
        $obj = new \yiip\lte\libs\tree\ArrayToTree($tree);
        $treeObj = new \RecursiveIteratorIterator(new \yiip\lte\libs\tree\MenuIterator($obj->tree), \RecursiveIteratorIterator::SELF_FIRST);
        foreach ($treeObj as $item) {
            $dept = $treeObj->getDepth();
            $menu[$item['id']] = '| ' . str_repeat('—', $dept) . $item['title'] . "({$dept})";
        }
        return ArrayHelper::merge(array(0=>'| 无(0)'), $menu);
    }
}