<?php
namespace Card\Model;
use Think\Model;

class UsersModel extends Model{

    /**
     * @param $openid
     * @return mixed
     * 查询用户是否存在
     */
    public function finduser($openid){
        $obj = M('users');
        $data['openid']=$openid;
        $result = $obj->where($data)->getField('userid');
        //if($result){
            var_dump($result);
        //}
        return $result;
    }

    /**
     * 添加用户
     */
    public function adduser(){
        $obj = M('users');
        //$data = $_SESSION['user'];
        $data['nickname'] = $_SESSION['user']['nickname'];
        $data['headimg'] = $_SESSION['user']['headimg'];
        $data['openid'] = $_SESSION['user']['openid'];
        $result = $obj -> data($data) -> add();
        if($result == false){
            var_dump($result);
        }
        else{
            echo "添加用户成功！";
        }
    }

    /**
     * @return mixed
     * 获取用户userid
     */
    public function getuserid(){
        $obj = M('users');
        $user['nickname'] = $_SESSION['user']['nickname'];
        $userid = $obj->where($user)->getField('userid');
        return $userid;
    }
}