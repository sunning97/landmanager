<?php
require 'str.php';
class Heap
{
    private $heap_Array;
    private $_current_Size;
    private $_type;

    public function __construct($type)
    {
        $this->heap_Array = array();
        $this->_current_Size = 0;
        $this->_type = $type;
    }

    public function remove()
    {
        $root = $this->heap_Array[0];
        $this->heap_Array[0] = $this->heap_Array[--$this->_current_Size];
        $this->bubbleDown(0);
        return $root;
    }

    public function bubbleDown($index)
    {
        $larger_Child = null;
        $top = $this->heap_Array[$index];
        while ($index < (int)($this->_current_Size/2)) {
            $leftChild = 2 * $index;
            $rightChild = $leftChild + 1;
            if($this->_type == 'address') {
                if ($rightChild < $this->_current_Size && (int) getNum($this->heap_Array[$leftChild]->getKey()['address']) < (int)getNum($this->heap_Array[$rightChild]->getKey()['address'])) // right child exists?
                {
                    $larger_Child = $rightChild;
                } else {
                    $larger_Child = $leftChild;
                }

                if ((int)getNum($top->getKey()['address']) >= (int)getNum($this->heap_Array[$larger_Child]->getKey()['address'])) {
                    break;
                }
            } else if($this->_type == 'price'){
                if ($rightChild < $this->_current_Size && $this->heap_Array[$leftChild]->getKey()['land_price'] < $this->heap_Array[$rightChild]->getKey()['land_price'])
                {
                    $larger_Child = $rightChild;
                } else {
                    $larger_Child = $leftChild;
                }

                if ($top->getKey()['land_price'] >= $this->heap_Array[$larger_Child]->getKey()['land_price']) {
                    break;
                }
            } else if($this->_type == 'acreage'){
                if ($rightChild < $this->_current_Size && $this->heap_Array[$leftChild]->getKey()['land_acreage'] < $this->heap_Array[$rightChild]->getKey()['land_acreage'])
                {
                    $larger_Child = $rightChild;
                } else {
                    $larger_Child = $leftChild;
                }

                if ($top->getKey()['land_acreage'] >= $this->heap_Array[$larger_Child]->getKey()['land_acreage']) {
                    break;
                }
            }

            $this->heap_Array[$index] = $this->heap_Array[$larger_Child];
            $index = $larger_Child;
        }

        $this->heap_Array[$index] = $top;
    }

    public function insertAt($index, Node $newNode)
    {
        $this->heap_Array[$index] = $newNode;
    }

    public function incrementSize()
    {
        $this->_current_Size++;
    }

    public function getSize()
    {
        return $this->_current_Size;
    }

    public function asArray()
    {
        $arr = array();
        for ($j = 0; $j < sizeof($this->heap_Array); $j++) {
            $arr[] = $this->heap_Array[$j]->getKey();
        }

        return $arr;
    }
}

function heapsort(Heap $Heap)
{
    $size = $Heap->getSize();
    for ($j = (int)($size/2) - 1; $j >= 0; $j--)
    {
        $Heap->bubbleDown($j);
    }
    for ($j = $size-1; $j >= 0; $j--) {
        $BiggestNode = $Heap->remove();

        $Heap->insertAt($j, $BiggestNode);
    }

    return $Heap->asArray();
}