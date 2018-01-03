<?php
class StudentDataAction extends Action {
    public function studentdata(){
		if(!isset($_SESSION['studentname'])|| $_SESSION['studentname']==null){
				$this->error("您尚未登录,请登录后使用。",U('StudentLog/studentlog'));
		}
		$where=session('studentname');
		//$where['studentid']=session('studentid');
		//var_dump($where);
		//$m=M('Student');
		//$data=M('14student')->where("studentname='$where'")->getField('studentid');
		//var_dump($data);
		$demo=M('14student')->where($where)->select();
		var_dump($demo);
		//$this->assign('demo','zjt');
		$this->assign('studentdata',$demo);
		$this->display();
	}
}