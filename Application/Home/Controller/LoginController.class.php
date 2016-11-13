<?php
namespace Home\Controller;

use Think\Controller;

class LoginController extends Controller
{
    public function index()
    {
      
        
       // echo $code;

       // die();
        // 验证码
      // $this->assign($code);
      /****/
       $this->display();
    }
    // 登录
    public function dologin()
    {
      // ajax
      // name的

       $data = I('post.name');
       $name = M('login')->where('name = "'.$data.'"')->select();
       if($name){
          $msg = true;
          $this->ajaxReturn($msg); 
       }else{
          $msg = false;
          $this->ajaxReturn($msg);
       }
      
        //ajax  
       
       // $name = $data['name'];
       // $email = $data['email'];
       // $name = M('login')->where('name = "'.$name.'"')->select();

       // $email = M('login')->where('email = "'.$email.'"')->select();

       // if($name){
       //    if($email){
       //      session('name',$name);
       //      return $this->redirect('/home/Index/index');

       //    }
       // }
       
       // $v = session('msg','用户名或邮箱不存在');
       // $this->assign('v',$v);
       // $this->redirect('Login/index');
    }
    public function email()
    {
       // email 的
       $emails = I('post.email');
       $name = I('post.name');
       $email = M('login')->where('email = "'.$emails.'" and name = "'.$name.'"')->select();
       if($email){
          $emailss = true;
          $this->ajaxReturn($emailss);
       }else{
          $emails = false;

          $this->ajaxReturn($emailss);
       }
    }
    public function hehe()
    {
        $data = I('post.');
        $list = M('login')->where("name = '".$data['name']."' and email = '".$data['email']."' and pwd = ".$data['pwd'])->select();
        if($list){
            session('name',$data['name']);
            $this->redirect('home/Index/index');
        }else{
            $this->redirect('/home/Index/index');
        }

    }

    public function register()
    {
       $this->display();
    }
   public function code()
   {
      // 验证码
      $Verify = new \Think\Verify();  
      $Verify->fontSize = 18;  
      $Verify->length   = 4;  
      $Verify->useNoise = false;  
      $Verify->codeSet = '0123456789';  
      $Verify->imageW = 130;  
      $Verify->imageH = 50;  
      //$Verify->expire = 600;  
      $Verify->entry(1); 

   }
// 测试
   // Public function verify(){
   //      import('ORG.Util.Image');
   //      Image::buildImageVerify();
   //  }
    // 测试

   // 校验验证码   未完成
   public function yzm()
   {
      $code= I('post.code');
       $verify = new \Think\Verify();
      $verify =  session('verify_code');
      $this->ajaxReturn($verify);
     // if($verify->check($code)){
     //    $msg = true;
     //    $this->ajaxReturn($msg);
     //  }else{
     //      $msg = false;
     //    $this->ajaxReturn($msg);
     //  }
      /***/
      // $verify = I('post.yzm');  
    
      // if(session('verify') != md5($code)) {
      //       $this->error('验证码错误！');
      //   }
      /****/

        // $verify = new \Think\Verify();
        // if($verify->check($yzm)){
        //     $msg = true;
        //    $this->ajaxReturn($msg);    
        // }else{
        //     $msg = false;
        //    $this->ajaxReturn($msg);
        // }
         
    }
   
}