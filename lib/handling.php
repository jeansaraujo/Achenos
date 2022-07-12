<?php

class Handling{
    private $db;
		public function __construct(){$this->db = new Database();}
		private function __clone(){}
		public function userRegistration($data){
			$name	  = $data['name'];
			$name =  filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
			$username = $data['username'];
			$username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
			$email	  =	$data['email'];
			$password = $data['password'];
			$password = md5($data['password']);
			if ($this->checkEmail($email)){
				unset($sql);unset($query);
				$sql = "INSERT INTO usuarios (name,username,email,password) VALUES (:name,:username,:email,:password)";
				$query = $this->db->pdo->prepare($sql);
				$query->bindParam(':name',$name);
				$query->bindValue(':username',$username);
				$query->bindValue(':email',$email);
				$query->bindValue(':password',$password);
				$result = $query->execute();
				if ($result) {
					$msg = "<div class='alert alert-success'><strong>Cadastrado com sucesso!</strong></div>";
					return $msg;
				}else{
					$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
					return $msg;
				}
			}else{
				$msg = "<div class='alert alert-danger'><strong>Este e-mail já está cadastrado!</strong></div>";
				return $msg;
			}}

		private function checkEmail($email){
				  $sql 	= "SELECT email FROM usuarios WHERE email= :email";
				  $query = $this->db->pdo->prepare($sql);
				  $query->bindValue(':email',$email);
				  $query->execute();
				  if ($query->rowCount() > 0) {
					  return true;
				  }else{
					  return false;
				  }}

		private function getLoginUser($email,$password){
			$sql = "SELECT * FROM usuarios WHERE email=:email AND password=:password ";
			$query =  $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->bindValue(':password',$password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		public function userLogin($data){
			$email = $data['email'];
			$password = md5($data['password']);
			$result = $this->getLoginUser($email,$password);
			if ($result) {
				Session::init();
				Session::set('login',true);
				Session::set('id',$result->id);
				Session::set('name',$result->name);
				Session::set('username',$result->username);
				Session::set('email',$result->email);
				Session::set('loginmsg',"<div class='alert alert-success'><strong>Seja bem vindo <?php echo Session::get('name'); ?></strong></div>");
			}else{
				$msg = "<div class='alert alert-danger'><strong>Usuário ou senha incorretos</strong></div>";
				return $msg;
			}}

	private function getUpdateName($name,$id){
		$sql = "UPDATE usuarios SET name=:name WHERE id=:id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindParam(':name',$name);
		$query->bindValue(':id',$id);
		$result = $query->execute();	
		return $result;
	}	

	public function updateName($data){
		$name = $data['name'];
		$name = filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
		$id = $data['id'];
		$result = $this->getUpdateName($name,$id);
		if ($result){
			$sql = "SELECT * FROM usuarios WHERE id=?";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(1,$id);
			$query->execute();
			$sname1= $query->fetch(PDO::FETCH_OBJ);
			Session::set('name',$sname1->name);
			$msg = "<div class='alert alert-sucess'><strong>Nome alterado com sucesso!</strong></div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
			return $msg;
		}}

	private function getUpdateEmail($id,$email){
		$sql = "UPDATE usuarios SET email=:email WHERE id=:id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':id',$id);
		$result = $query->execute();
		return $result;
	}

	public function updateEmail($data){
		$id = $data['username'];
		$email	  =	$data['email'];
		$result = $this->getUpdateEmail($id,$email);
		if ($result){
			$sql = "SELECT * FROM usuarios WHERE id=?";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(1,$id);
			$query->execute();
			$sname1= $query->fetch(PDO::FETCH_OBJ);
			Session::set('email',$sname1->email);
			$msg = "<div class='alert alert-sucess'><strong>Endereço de e-mail alterado com sucesso!</strong></div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
			return $msg;
		}}

	private function getUpdatePassword($id,$old_password,$password){
		$check = "SELECT * FROM usuarios WHERE id=:id AND password=:old_password";
		$checking = $this->db->pdo->prepare($check);
		$checking->bindValue(':id',$id);
		$checking->bindValue(':old_password',$old_password);
		$checked = $checking->execute();
		if ($checked){
		$sql = "UPDATE usuarios SET password=:password WHERE id=:id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->bindValue(':password',$password);
		$result = $query->execute();
		return $result;
		} else {
		}}

	public function updatePassword($data){
		$id = $data['id'];
		$old_password = $data['old_password'];
		$old_password = md5($old_password);
		$password = $data['password'];
		$password = md5($password);
		$result = $this->getUpdatePassword($id,$old_password,$password);
		if ($result){
			$msg = "<div class='alert alert-sucess'><strong>Senha alterada com sucesso!</strong></div>";
			return $msg;
		} else {
			$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
			return $msg;
		}}
		
	public function userPersonalRegistration($data){
		$name	  = $data['name'];
		$name =  filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
		$sobrenome = $data['sobrenome'];
		$sobrenome = filter_var($sobrenome, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
		$email	  =	$data['email'];
		$contato = $data['contato'];
		$pais = $data['pais'];
		$estado = $data['estado'];
		$cidade = $data['cidade'];
		$profilepic = $data['profilepic'];
		$bio = $data['bio'];
		if ($this->checkEmail($email)){
			unset($sql);unset($query);
			$sql = "INSERT INTO pessoal_info (sobrenome,contato,pais,estado,cidade,bio) VALUES (:sobrenome,:contato,:pais,:estado,:cidade,:bio)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam(':sobrenome',$sobrenome);
			$query->bindValue(':contato',$contato);
			$query->bindValue(':pais',$pais);
			$query->bindValue(':estado',$estado);
			$query->bindValue(':cidade',$cidade);
			$query->bindValue(':bio',$bio);
			$result = $query->execute();
			if ($result) {
				$msg = "<div class='alert alert-success'><strong>Cadastrado com sucesso!</strong></div>";
				return $msg;
			}else{
				$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
				return $msg;
			}
		}else{
			$msg = "<div class='alert alert-danger'><strong>Este e-mail já está cadastrado!</strong></div>";
			return $msg;
		}}

		private function checkCad1($name,$email){
			$check = 
		}
	}
		

?>