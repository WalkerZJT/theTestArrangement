<?php
	class TeacherCommenAction extends Action{
		public function teachercommen(){
			if(!isset($_SESSION['adminname'])|| $_SESSION['adminname']==null){
				$this->error("����δ��¼,��¼��ʹ��!",U('Index/index'));
			}
		}
	}
?>