<?php
namespace Card\Controller;
use Think\Controller;

class IndexController extends Controller{

    protected $user;    //当前用户

    public function index(){
        $obj = D('Newcard');
        $this->user = $_SESSION['user'];
        if(empty($this->user)){
            $this->redirect('wechat/index');
        }
        else{
            $cards = $obj->getcards();
            //var_dump($card_infos);
            $this->assign('cards',$cards);
            $this->display();
        }
    }

    /**
     * 贺卡信息
     */
    public function cardinfo(){
        $cardno = intval($_REQUEST['nid']);
        $obj = D('Newcard');
        $infos = $obj->getcard_infos($cardno);
        $this->assign('infos',$infos);
        $this->display();
    }

    /**
     * 贺卡模板列表
     */
    public function cardlist(){
        //$obj = new NewcardModel();    //$obj = D('Newcard');
        //$cardlist = $obj->cardlist();
        $this->assign();
        $this->display();
    }

    /**
     * @param $cardno
     * 查看选中的贺卡
     */
    public function check($cardno){
        $this->assign('cardno',$cardno);
        $this->display();
    }

    /**
     * @param $cardno
     * 编辑贺卡内容
     */
    public function edit($cardno){
        $this->assign('cardno',$cardno);
        $this->display();
    }

    /**
     * @param $cardno
     * 生成贺卡
     */
    public function finish($cardno,$message){
        $users = D('users');
        $userid = $users->getuserid();

        $obj = D('newcard');
        $result = $obj -> finish($cardno,$message,$userid);
        //$this->assign('cardno',$result);
        //$this->display();
    }

    public function record(){

    }



}