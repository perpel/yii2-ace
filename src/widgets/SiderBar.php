<?php
namespace yiip\ace\widgets;

use common\models\ace\Sidebar;
use yii\base\Exception;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class MenuIterator extends \ArrayIterator implements \RecursiveIterator
{
    public function hasChildren()
    {
        $current = $this->current();
        return !empty($current['children']);
        // TODO: Implement hasChildren() method.
    }

    public function getChildren()
    {
        $current = $this->current();
        return new self($current['children']);
        // TODO: Implement getChildren() method.
    }
}

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

        $sideBarTree = new SiderBarSplTree(new MenuIterator($obj->tree), \RecursiveIteratorIterator::SELF_FIRST);
        foreach ($sideBarTree as $item) {
            $sideBarTree->sideBarHtml .= $sideBarTree->createNode($item, $sideBarTree->callHasChildren());
        }
        return $this->render('sider-bar', ['menu'=>$sideBarTree->sideBarHtml]);
    }

}