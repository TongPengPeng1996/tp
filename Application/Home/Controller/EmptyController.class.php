<?php
namespace Home\Controller;

use Think\Controller;

class EmptyController extends Controller
{
    public function index(){        
      //当访问不存在的控制器时，自动执行
      $this->redirect('Index/index');
    } 
}