<?php
namespace yiip\ace\libs\tree;

use yii\helpers\ArrayHelper;

class MenuTreeList
{
    public function treeList($tree)
    {
        $menu = [];
        $obj = new \yiip\ace\libs\tree\ArrayToTree($tree);
        $treeObj = new \RecursiveIteratorIterator(new \yiip\ace\libs\tree\MenuIterator($obj->tree), \RecursiveIteratorIterator::SELF_FIRST);
        foreach ($treeObj as $item) {
            $dept = $treeObj->getDepth();
            $menu[$item['id']] = str_repeat('—', $dept) . $item['title'];
        }
        return ArrayHelper::merge(array(0=>'|无'), $menu);
    }
}