<?php
class TeacherLoginAction extends Action {
    public function teacherlogin(){
		if(isset($_SESSION['studentname'])|| $_SESSION['studentname']!=null || isset($_SESSION['adminname'])|| $_SESSION['adminname']!=null){
				$this->error("您已登陆，请注销之后再使用本功能",U('Index/index'),3);
			}
		$this->display();
	}
	public function teachertdologin(){
		if(isset($_SESSION['adminname'])|| $_SESSION['adminname']!=null){
				$this->error("您已登陆，请注销之后再使用本功能",U('Index/index'),3);
			}
		$data['adminname']=$_POST['adminname'];
		$data['password']=$_POST['password'];
		//var_dump($data);
		$m=M('Administrators');
		//var_dump($m->select());
		//var_dump($m->where($data)->find());
		$test=$m->where($data)->select();
		if($test){
			$_SESSION['adminname']=$data['adminname'];
			$_SESSION['password']=$data['password'];
			$this->success('congratulation！',U('TeacherData/teacherdata'));
		}else{
			$this->error('faile',U('TeacherLogin/teacherlogin'));
		}
		//$this->display();
	}
	public function teacherreg(){
		$this->error('此功能尚不能使用!',U('TeacherLogin/teacherlogin'));
	}
	public function teacherlogout(){
			if(!isset($_SESSION['adminname'])|| $_SESSION['adminname']==null){
				$this->error("您尚未登录!",U('Index/index'),3);
			}else{
				$name=$_SESSION['adminname'];
				$_SESSION=array();
					if(isset($_COOKIE[session_name()])){
						setcookie(session_name(),'',time()-1,'/');
					}
				$test=session_destroy();
				if($test){
					$this->success('Welcome once again to use us!'.$name,U('Index/index'));//U是生成一个完整的路径
				}else{
					$this->error("注销失败");
				}
			}
		}
}