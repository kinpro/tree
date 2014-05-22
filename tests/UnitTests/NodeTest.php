<?php

namespace Tebru\Test\Tree;

use Tebru\Tree\Node;
use Tebru\Tree\Tree;

class NodeTest extends \PHPUnit_Framework_TestCase
{
    public function testIsRootNode()
    {
        $node = new Node(Tree::ROOT_NODE_ID);

        $this->assertTrue($node->isRoot());
    }

    public function testChildHasParent()
    {
        $node = new Node(Tree::ROOT_NODE_ID);
        $child = new Node('node', $node);

        $this->assertTrue(null !== $child->getParent());
    }

    public function testParentHasChild()
    {
        $node = new Node(Tree::ROOT_NODE_ID);
        $child = new Node('node', $node);
        $node->addChild($child);

        $this->assertTrue($child === $node->getChildren()[0]);
    }

    public function testCanRemoveChild()
    {
        $node = new Node(Tree::ROOT_NODE_ID);
        $child = new Node('node', $node);
        $node->addChild($child);
        $node->removeChild($child);

        $this->assertTrue(0 === $node->getChildren()->count());
    }

    public function testSetPositionInt()
    {
        $node = new Node(Tree::ROOT_NODE_ID);
        $node->setPosition(1);

        $this->assertTrue(1 === $node->getPosition());
    }

    public function testSetPositionNull()
    {
        $node = new Node(Tree::ROOT_NODE_ID);
        $node->setPosition(null);

        $this->assertTrue(null === $node->getPosition());
    }

    /**
     * @expectedException \UnexpectedValueException
     */
    public function testSetPositionWillThrowException()
    {
        $node = new Node(Tree::ROOT_NODE_ID);
        $node->setPosition('1');
    }
}