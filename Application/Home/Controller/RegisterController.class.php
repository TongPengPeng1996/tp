<?php
namespace Home\Controller;

use Think\Controller;

class RegisterController extends Controller
{
    public function index()
    {
       // 默认
    }
    // 判断name是否存在
    public function name()
    {
        $name = I('post.name');
        $list = M('login')->where('name = "'.$name.'"')->find();
        if($list){
           $a = true;
           $this->ajaxReturn($a);
        }else{
            $a = false;
           $this->ajaxReturn($a);
        }
    }
    // 判断email是否存在
    public function email()
    {
      $email = I('post.email');
      $list = M('login')->where('email = "'.$email.'"')->find();
      if($list){
          $a = true;
          $this->ajaxReturn($a);
      }else{
          $a = false;
          $this->ajaxReturn($a);
      }
    }

    public function ok()
    {
      // 接收数据
      $data = I('post.');
      $list = M('login')->where('name = "'.$data['name'].'" or email = "'.$data['email'].'"')->select();
      if($list){
          $this->redirect('/home/login/register');
      }else{
          M('login')->create();
          $num = M('login')->add($data);
          if($num){
            $this->redirect('/home/login/index');
          }else{
            $this->redirect('/home/login/register');
          }
      }
    }
   
}