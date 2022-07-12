<?php $user = new Handling();
      
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		$userReg	= $user->userProfesionalRegistration($_POST);
	}
?>