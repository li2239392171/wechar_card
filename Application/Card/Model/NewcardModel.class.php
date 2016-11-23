<?php
namespace Card\Model;
use Think\Model;

class NewcardModel extends Model{

    /**
     * @return mixed
     * 获取贺卡列表
     */
    public function getcards(){
        $obj = M('newcard');
        $cards = $obj
                 ->join('users on users.userid = newcard.userid')
                 //->join('record on newcard.rid = record.rid')
                 ->select();
        return $cards;
    }

    /**
     * @param $cardno
     * @return mixed
     * 获取贺卡信息
     */
    public function getcard_infos($cardno)
    {
        $obj = M('newcard');
        $condition['cardid'] = $cardno;
        $infos = $obj->where($condition)->select();
        return $infos;
    }


    /**
     * @param $cardno
     * @param $message
     * 生成贺卡，不带录音
     */
    public function finish($cardno,$message,$userid){
        $obj = M('newcard');
        $data['userid'] =$userid;
        $data['cardno'] = $cardno;
        $data['message'] = $message;
        $res = $obj->data($data)->filter('strip_tags')->add();
        //return $res;
        var_dump($res);
    }

}