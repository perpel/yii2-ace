<?php
namespace yiip\lte\widgets;

use yii\base\Widget;
use yii\bootstrap\Html;

class SiderBar extends Widget
{
    public $tree = [];

    public function run()
    {
        $obj = new \yiip\lte\libs\tree\ArrayToTree($this->tree);

        $sideBarTree = new SiderBarSplTree(new \yiip\lte\libs\tree\MenuIterator($obj->tree), \RecursiveIteratorIterator::SELF_FIRST);
        foreach ($sideBarTree as $item) {
            $sideBarTree->sideBarHtml .= $sideBarTree->createNode($item, $sideBarTree->callHasChildren());
        }
        return $this->render('sider-bar', ['menu'=>$sideBarTree->sideBarHtml]);
    }

}


class SiderBarSplTree extends \RecursiveIteratorIterator
{
    public $sideBarHtml = '';

    public function beginIteration()
    {
        $this->sideBarHtml .= "<ul class='sidebar-menu'>\n";
    }

    public function beginChildren()
    {
        $this->sideBarHtml .= "<ul class='treeview-menu'>\n";
    }

    public function endChildren()
    {
        $this->sideBarHtml .= "</ul></li>\n";
    }

    public function endIteration()
    {
        $this->sideBarHtml .= "</ul>\n";
    }

    public function createNode($node = [], $isChildren = false)
    {
        $href = ($node['href'] == '#')?'#':['/' . $node['href']];
        $node['active']?($act='active'):($act='');
        if ($isChildren) {
            $cls = ($act=='active')?'treeview active':'treeview';
            $a = Html::a("<i class=\"fa {$node['icon']}\"></i> <span>{$node['title']}</span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span>", $href, ['data-item'=>$node['href']]);
            return "<li class='{$cls}'>{$a}";
        } else {
            $cls = ($act=='active')?' class="active"':'';
            $a = Html::a("<i class=\"fa {$node['icon']}\"></i> <span>{$node['title']}</span>", $href, ['data-item'=>$node['href']]);
            return "<li{$cls}>{$a}</li>";
        }
    }

}