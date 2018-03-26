<?php 
	class AdminModel extends Model{
		public function test(){
			$sql = "SLELCT *FROM {$this->table}";
			return $this ->db->getAll($sql);
		}
	}
 ?>