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
			if ($this->checkUsername($username)){
				if ($this->checkEmail($email)){
					if ($this->tablePessoalFill($username,$name)){
						if ($this->tableProfesionalFill($username)){
							if ($this->tableScholarFill($username)){
								unset($sql);unset($query);
								$sql = "INSERT INTO usuarios (username,email,password) VALUES (:username,:email,:password)";
								$query = $this->db->pdo->prepare($sql);
								$query->bindValue(':username',$username);
								$query->bindValue(':email',$email);
								$query->bindValue(':password',$password);
								$result = $query->execute();
								if ($result) {
									$msg = "<div class='alert alert-success'><strong>Cadastrado com sucesso!</strong></div>";
									return $msg;
								}}else{
								$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";;
								return $msg;
								}
							}else{
								$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";;
								return $msg;
							}
						}else{
							$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";;
							return $msg;
							}
					}else{
						$msg = "<div class='alert alert-danger'><strong>Este e-mail já está cadastrado!</strong></div>";
						return $msg;
						}
				}else{
					$msg = "<div class='alert alert-danger'><strong>Este usuário já está cadastrado!</strong></div>";
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
		private function checkUsername($username){
			$sql 	= "SELECT email FROM usuarios WHERE username=:username";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':username',$username);
			$query->execute();
			if ($query->rowCount() > 0) {
				return true;
			}else{
				return false;
			}}
		private function tablePessoalFill ($username,$name){
				$sql = "INSERT INTO pessoal_info (name,sobrenome,contato1,contato2,birthday,pais,estado,cidade,profilepic,bio) VALUES (:name,:sobrenome,:contato1,:contato2,:birthday,:pais,:estado,:cidade,:profilepic,:bio)";
				$query = $this->db->pdo->prepare($sql);
				$query->bindValue(':username',$username);
				$query->bindParam(':name',$name);
				$query->bindValue(':sobrenome','');
				$query->bindValue(':contato1','');
				$query->bindValue(':contato2','');
				$query->bindValue(':birthday','');
				$query->bindValue(':pais','');
				$query->bindValue(':estado','');
				$query->bindValue(':cidade','');
				$query->bindValue(':profilepic','');
				$query->bindValue(':bio','');
				$query->execute();
				$sql = "SELECT username FROM pessoal_info WHERE username=:username";
				$query->bindValue(':username',$username);
				$query->execute();
				$sql2 = "SELECT username FROM usuarios WHERE username=:username2";
				$query2 = $this->db->pdo->prepare($sql2);
				$query2->bindValue(':username2',$username);
				$query2->execute();
				if($query->rowCount() > 1 && $query === $query2){
					return true;
				}else{
					return false;
				}}
		
		private function tableProfesionalFill ($username){
			$sql = "INSERT INTO profissional_info (servico1,servico2,nome_do_cargo,work_bio,desde,ate) VALUES (:servico1,:servico2,:nome_do_cargo,:work_bio,:desde,:ate)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':servico1','');
			$query->bindValue(':servico2','');
			$query->bindValue(':nome_do_cargo','');
			$query->bindValue(':work_bio','');
			$query->bindValue(':desde','');
			$query->bindValue(':ate','');
			$query->execute();
			$sql = "SELECT username FROM profissional_info WHERE username=:username";
			$query->bindValue(':username',$username);
			$query->execute();
			$sql2 = "SELECT username FROM usuarios WHERE username=:username2";
			$query2 = $this->db->pdo->prepare($sql2);
			$query2->bindValue(':username2',$username);
			$query2->execute();
			if($query->rowCount() > 1 && $query === $query2){
				return true;
			}else{
				return false;
			}}

		private function tableScholarFill ($username){
			$sql = "INSERT INTO escolaridade_info (username) VALUES (:username)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':username',$username);
			$query->execute();
			$sql = "SELECT username FROM profissional_info WHERE username=:username";
			$query->bindValue(':username',$username);
			$query->execute();
			$sql2 = "SELECT username FROM usuarios WHERE username=:username2";
			$query2 = $this->db->pdo->prepare($sql2);
			$query2->bindValue(':username2',$username);
			$query2->execute();
			if($query->rowCount() > 1 && $query === $query2){
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
			$id 		= $data['id'];
			$name	  	= $data['name'];
			$name 		= filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
			$sobrenome 	= $data['sobrenome'];
			$sobrenome 	= filter_var($sobrenome, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
			$email	  	= $data['email'];
			$contato 	= $data['contato'];
			$pais 		= $data['pais'];
			$estado 	= $data['estado'];
			$cidade 	= $data['cidade'];
			$profilepic = $data['profilepic'];
			$bio 		= $data['bio'];
			if ($this->checkCad2($id)){
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
					$msg = "<div class='alert alert-success'><strong>Cadastrado atualizado sucesso!</strong></div>";
					return $msg;
				}else{
					$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
					return $msg;
				}
			}else{
				$msg = "<div class='alert alert-danger'><strong>Este e-mail já está cadastrado!</strong></div>";
				return $msg;
			}}

		private function checkCad2($id){
			$sql 	= "SELECT name,email FROM usuarios WHERE id=:id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$id);
			$query->execute();
			if ($query->rowCount() > 1) {
				return true;
			}else{
				return false;
			}}

		





	}	

?>