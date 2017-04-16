<?php
namespace yiip\lte\widgets;

use yii\base\Widget;

class SiderBar extends Widget
{
    public $tree = [];

    public function run()
    {
        $obj = new \yiip\ace\libs\tree\ArrayToTree($this->tree);

        $sideBarTree = new SiderBarSplTree(new \yiip\ace\libs\tree\MenuIterator($obj->tree), \RecursiveIteratorIterator::SELF_FIRST);
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
        $li = $node['active']?'<li class="active">':'<li>';
        if ($isChildren) {
            return "<li class='treeview'><a href=\"{$node['href']}\"><i class=\"fa {$node['icon']}\"></i> <span> {$node['title']} </span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span></a>";
        } else {
            return "<li><a href=\"{$node['href']}\"><i class=\"fa {$node['icon']}\"></i> <span>{$node['title']}</span><span class=\"pull-right-container\"></span></a></li>";
        }
    }

}