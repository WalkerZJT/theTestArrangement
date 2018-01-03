<?php
class StudentLogAction extends Action {
    public function studentlog(){
		if(isset($_SESSION['studentname'])|| $_SESSION['studentname']!=null || isset($_SESSION['adminname'])|| $_SESSION['adminname']!=null){
				$this->error("您已登陆，请注销之后再使用本功能",U('Index/index'),3);
			}
		$this->display();
	}
	public function studentdolog(){
		$m=M('14student');
		$data['studentid']=$_POST['studentid'];
		$data['studentpassword']=$_POST['studentpassword'];
		//var_dump($data);
		$test=$m->where($data)->select();
		//var_dump($test);
		if($test){
			$arr['studentname']=$m->field('studentname')->where($data)->find();
			//$arr['studentname']=$m->field('studentname')->where($data)->find();
			$_SESSION['studentname']=$arr['studentname'];
			$_SESSION['studentid']=$data['studentid'];
			//var_dump($_SESSION);
			$this->success('恭喜你登录成功',U('StudentTest/studenttest'));
		}else{
			$this->error('登录失败！请重新登录',U('StudentLog/studentlog'));
		}
		//$this->display();
	}
	public function studentlogout(){
		if(!isset($_SESSION['studentname'])|| $_SESSION['studentname']==null){
				$this->error("您尚未登录,请登录后使用。",U('StudentLog/studentlog'));
			}else{
				$name=$_SESSION['studentname'];
				$_SESSION=array();
					if(isset($_COOKIE[session_name()])){
						setcookie(session_name(),'',time()-1,'/');
					}
				$test=session_destroy();
				if($test){
					$this->success('Welcome once again to use us!',U('Index/index'));//U是生成一个完整的路径
				}else{
					$this->error("注销失败");
				}
			}
	}
	
}