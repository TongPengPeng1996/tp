<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
       
        /************用户的增删改查 start**************/
        if(!session('?name')){
          return $this->display('Login:index');
        }


        
        /*****************用户的增删改查  end**************/



        /**测试*/

        $user = M('users');  
            $p = empty($_GET['p'])?0:$_GET['p'];
            // 进行分页数据查询 注意page方法的参数的前面部分是当前的页数使用 $_GET[p]获取
            $articles = $user->order('id')->join('score ON score.uid = users.id')->page($_GET['p'],5)->select();
            $this->assign('list',$articles);        // 赋值数据集
            //数据分页
            $count = $user->count();// 查询满足要求的总记录数
            $Page  = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数
            $Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录&nbsp;第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
            $Page->setConfig('prev', '上一页');
            $Page->setConfig('next', '下一页');
            $Page->setConfig('last', '末页');
            $Page->setConfig('first', '首页');
            $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');
            $Page->lastSuffix = false;//最后一页不显示为总页数

            $show = $Page->show();// 分页显示输出
            $this->assign('page',$show);// 赋值分页输出
            $this->display();
        /**测试*/

    }
    // 空操作
    public function _empty()
    {
      // $this->success('失败了','index/index',5);  //成功跳转
      $this->error('失败了','index/index',5);  //失败跳转
       // $this->redirect('/home/index/index');
    }
    public function out()
    {
      session('name',null);
      $this->redirect('/home/login/index');
        
    }


    public function dodel()
    {
     /**get方式**/
        $id = I('get.id');
        // dump($id);
        $m = M('users')->where('id = '.$id)->delete();
        if($m){
            $this->redirect('/home/index/index');
        }else{
            $this->redirect('/home/index/index');
        }
     /*****ajax方式****/
        // $id = I('post.id');

        // $a = M('users')->where('id = '.$id)->delete();
        // $b = M('users')->where('uid = '.$id)->delete();
        
          
        //    $this->redirect('/home/index/index');
          
       
    }
    public function update()
    {
       $id = I('get.id');
       $list = M('users')
                ->where('users.id = '.$id)
               ->join('score ON users.id = score.uid')
               ->find();
       $this->assign('list',$list);
       $this->display();
       // dump($list);
    }
    public function load()
    {
      $data = I('post.');
         // $list = M('users')
         //    ->where('users.id = '.$data['id'])
         //    ->join('score ON users.id = score.uid')
         //    ->find();
         // $list['name'] = $data['name'];
         // $list['sex'] = $data['sex'];
         // $list['class'] = $data['class'];
         // $list['score'] = $data['score'];
      // 用户的
      $users = ['name'=>$data['name'],'sex'=>$data['sex']];
      // 成绩表
      $score = ['score'=>$data['score'],'class'=>$data['class']];
      // dump($users);
       $a =  M('users')->where('id = '.$data['id'])->save($users);
       $b =  M('score')->where('uid = '.$data['id'])->save($score);
       if($a){
          if($b){
              $this->redirect('/home/index/index');
          }else{
              $this->redirect('/home/index/upload');
          }
       }else{
          $this->redirect('/home/index/upload');
       }
    } 
    public function menu()
    {
        $this->display();
    }
    public function create()
    {
        $this->display();
    }
    public function add()
    {
       $data = I('post.');

       $users = ['name'=>$data['name'],'sex'=>$data['sex']];
       $score = ['score'=>$data['score'],'class'=>$data['class']];
       M('users')->create();
       M('score')->create();
       $a = M('users')->add($users);
       $u = M('users')->where('name = "'.$data['name'].'"')->select();
       
       $arr = [];
       foreach($u as $uid){
          $uu = $uid['id'];
       } 
       $score['uid'] = $uu;
       // dump($score);
       $b = M('score')->add($score);
       if($a){
          if($b){
              $this->redirect('/home/index/index');
          }else{
            $this->redirect('/home/index/create');
          }
       }else{
          $this->redirect('/home/index/create');
       }
    }

}