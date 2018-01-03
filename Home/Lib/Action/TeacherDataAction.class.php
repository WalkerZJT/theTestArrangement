<?php
class TeacherDataAction extends Action{
    public function teacherdata(){
		if(!isset($_SESSION['adminname'])|| $_SESSION['adminname']==null){
				$this->error("您尚未登录,登录后使用!",U('Index/index'));
			}
		$this->display();
	}
}