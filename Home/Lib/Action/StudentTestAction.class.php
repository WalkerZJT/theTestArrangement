<?php
class StudentTestAction extends Action {
    public function studenttest(){
		if(!isset($_SESSION['studentname'])|| $_SESSION['studentname']==null){
				$this->error("您尚未登录,请登录后使用。",U('StudentLog/studentlog'));
		}
		$this->display();
	}
}