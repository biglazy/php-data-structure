<?php

//��������ڵ���
class node {
    public $data;
    public $next;
    //�ڵ㹹�캯��
    public function __construct($data=''){
        $this->data = $data;
    }
}

//����������
class link {
    private $head;
    private $end;
    public $count;
    //�����캯��
    public function __construct(){
        $this->count = 0;
        $this->head = null;
        $this->end = null;
    }   
    //��ӽڵ㵽����β��
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
    //��ӽڵ㵽����ͷ��
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
    //������������
    public function traversal(){
        $node = $this->head;
        while($node != null){
            echo $node->data."\n";
            $node = $node->next;
        }
    }
    //��ת����
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
    //�ж������Ƿ�Ϊ��
    public function isEmpty(){
        return $this->count == 0;
    }

    //TODO:��������ɵĹ���...
}


//main()
$list = new link();
$list->addToEnd(13);        //��������β��
$list->addToEnd(14);        
$list->addToEnd(15);
$list->addToEnd(16);
$list->addToHead(12);       //��������ͷ��
$list->addToHead(11);
$list->addToHead(10);

echo "Before reverse:\n";
$list->traversal();         //�������
$list->reverse();           //��ת����
echo "After reverse:\n";
$list->traversal();         //�������

echo "List is ".($list->isEmpty()?"":"not")." null.\n";
echo $list->count." node(s) in the list.\n";




