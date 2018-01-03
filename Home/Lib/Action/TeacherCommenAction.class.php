<?php
	class TeacherCommenAction extends Action{
		public function teachercommen(){
			if(!isset($_SESSION['adminname'])|| $_SESSION['adminname']==null){
				$this->error("ฤ๚ษะฮดตวยผ,ตวยผบ๓สนำร!",U('Index/index'));
			}
		}
	}
?>