<?php
namespace yiip\ace\libs\tree;

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