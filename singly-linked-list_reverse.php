<?php

//单向链表节点类
class node {
    public $data;
    public $next;
    //节点构造函数
    public function __construct($data=''){
        $this->data = $data;
    }
}

//单向链表类
class link {
    private $head;
    private $end;
    public $count;
    //链表构造函数
    public function __construct(){
        $this->count = 0;
        $this->head = null;
        $this->end = null;
    }   
    //添加节点到链表尾部
    public function addToEnd($data){
        $newNode = new node($data);
        if($this->end == null){
            $this->head = $newNode;
            $this->end = $newNode;
        }else{
            $this->end->next = $newNode;
            $this->end = $newNode;
        }         
        $this->count += 1;
    }
    //添加节点到链表头部
    public function addToHead($data){
        $newNode = new node($data);
        if($this->head == null){
            $this->head = $newNode;
            $this->end = $newNode;
        }else{
            $newNode->next = $this->head;
            $this->head = $newNode;
        }         
        $this->count += 1;
    }
    //链表遍历并输出
    public function traversal(){
        $node = $this->head;
        while($node != null){
            echo $node->data."\n";
            $node = $node->next;
        }
    }
    //反转链表
    public function reverse(){
        if(!$this->isEmpty()){
            $node = $this->head;  
            $tmp = $node->next;           
            while($tmp != null){  
                $i ++;       
                $node->next = $tmp->next;
                $tmp->next = $this->head;
                $this->head = $tmp; 
                $tmp = $node->next;  
            }
        }
    }
    //判断链表是否为空
    public function isEmpty(){
        return $this->count == 0;
    }

    //TODO:其它待完成的功能...
}


//main()
$list = new link();
$list->addToEnd(13);        //插入链表尾部
$list->addToEnd(14);        
$list->addToEnd(15);
$list->addToEnd(16);
$list->addToHead(12);       //插入链表头部
$list->addToHead(11);
$list->addToHead(10);

echo "Before reverse:\n";
$list->traversal();         //遍历输出
$list->reverse();           //反转链表
echo "After reverse:\n";
$list->traversal();         //遍历输出

echo "List is ".($list->isEmpty()?"":"not")." null.\n";
echo $list->count." node(s) in the list.\n";




