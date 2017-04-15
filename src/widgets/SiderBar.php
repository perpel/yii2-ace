<?php
namespace yiip\ace\widgets;

use yii\base\Widget;

class SiderBarSplTree extends \RecursiveIteratorIterator
{
    public $sideBarHtml = '';

    public function beginIteration()
    {
        $this->sideBarHtml .= "<ul class='nav nav-list'>\n";
    }

    public function beginChildren()
    {
        $this->sideBarHtml .= "<ul class='submenu'>\n";
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
            return "{$li}<a href=\"{$node['href']}\" class=\"dropdown-toggle\"><i class=\"menu-icon fa {$node['icon']}\"></i><span class=\"menu-text\"> {$node['title']} </span><b class=\"arrow fa fa-angle-down\"></b></a>";
        } else {
            return "{$li}<a href=\"{$node['href']}\"><i class=\"menu-icon fa {$node['icon']}\"></i><span class=\"menu-text\"> {$node['title']} </span></a></li>";
        }
    }

}

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