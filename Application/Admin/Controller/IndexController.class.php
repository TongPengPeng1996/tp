<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
       // echo T('/admin/index/index');
        $this->display();

    }
    public function _empty()
    {
       $this->redirect('/admin/index/index');
    }
    

}