<?php
//ultima hora mexida 18:35
class Handling{
    private $db;
	private $parser;
	public function __construct(){
		$this->db = new Database();
		$this->parser = new Parser();
	}
	private function __clone(){}
	public function closeBD(){
		$this->bd->unsetter();
	}
	private function insertDB($table,$params){
			$sql = "INSERT INTO $table (?) VALUES (?)";
			$query = $this->db->pdo->prepare($sql);
			$query->bindParam('ss',$params,$params);
			$result = $query->execute();
			return $result;
			}
		public function userRegistration($data){
		$name	  = $data['name'];
		$name =  filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
		$username = $data['username'];
		$username = filter_var($username, FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_STRIP_HIGH);
		$email	  =	$data['email'];
		$password = $data['password'];
		$password = md5($data['password']);
		$confirm = $data['confirmpassword'];
		$confirm = md5($data['confirmpassword']);
		$checkpass = $password === $confirm;
		if($checkpass){
			$sql = "INSERT INTO usuarios (username,email,password) VALUES (? ,? ,? )";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(1,$username);
			$query->bindValue(2,$email);
			$query->bindValue(3,$password);
			$result = $query->execute();
			if ($result) {
				$this->tablePessoalFill($username,$name);
				$this->tableProfesionalFill($username);
				$this->tableScholarFill($username);
				$msg = "<div class='alert alert-success'><strong>Cadastrado com sucesso!</strong></div>";
				return $msg;
				header('Location:index.php?page=login');
			}else{
				$msg = "<div class='alert alert-danger'><strong>Ops, algo deu errado...</strong></div>";
				return $msg;
			}
		}else{
			$msg = "<div class='alert alert-danger'><strong>As senhas não conferem!</strong></div>";
			return $msg;
			}
	}
	private function tablePessoalFill ($username,$name){
		// Recuperar ID de usuário
		unset($sql); unset($query);		
		$sql = "SELECT id FROM usuarios WHERE username = :USERNAME";
		$query = $this->db->pdo->prepare($sql);
		$query->bindParam(':USERNAME',$username);
		$query->execute();
		$user_id=$query->fetchAll(PDO::FETCH_ASSOC);
		var_dump($user_id);
		$id = $user_id[0]['id'];
		// Lançar demais Informações
		unset($sql); unset($query);		
		$sql = "INSERT INTO pessoal_info (username,'name',sobrenome,contato1,contato2,birthday,pais,estado,cidade,profilepic,bio) VALUES (:username,:name,:sobrenome,:contato1,:contato2,:birthday,:pais,:estado,:cidade,:profilepic,:bio)";
		$query = $this->db->pdo->prepare($sql);
		$profilepic_path = "/assets/img/default_profile.png";
		$emp = " ";
		$query->bindParam(':usuario_id',$id);
		$query->bindParam(':name',$name);
		$query->bindValue(':sobrenome',$emp);
		$query->bindValue(':contato1',$emp);
		$query->bindValue(':tpcontato1',$emp);
		$query->bindValue(':contato2',$emp);				
		$query->bindValue(':pais',$emp);
		$query->bindValue(':estado',$emp);
		$query->bindValue(':cidade',$emp);
		$query->bindValue(':profilepic',$profilepic_path);
		$query->bindValue(':bio',$emp);
		$query->execute();
	}		
	private function tableProfesionalFill ($username){
		// Recuperar ID de usuário
		unset($sql); unset($query);		
		$sql = "SELECT id FROM usuarios WHERE username = :USERNAME";
		$query = $this->db->pdo->prepare($sql);
		$query->bindParam(':USERNAME',$username);
		$query->execute();
		$user_id=$query->fetchAll(PDO::FETCH_ASSOC);
		$id = $user_id[0]['id'];
		// Lançar demais Informações Profissionais
		$sql = "INSERT INTO profissional_info (usuario_id,servico1,servico2,nome_do_cargo,work_bio,desde,ate) VALUES (:usuario_id,:servico1,:servico2,:nome_do_cargo,:work_bio,:desde,:ate)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':usuario_id',$id);
		$query->bindValue(':servico1','');
		$query->bindValue(':servico2','');
		$query->bindValue(':nome_do_cargo','');
		$query->bindValue(':work_bio','');
		$query->bindValue(':desde','');
		$query->bindValue(':ate','');
		$query->execute();
	}
	private function tableScholarFill ($username){
		// Recuperar ID de usuário
		unset($sql); unset($query);		
		$sql = "SELECT id FROM usuarios WHERE username = :USERNAME";
		$query = $this->db->pdo->prepare($sql);
		$query->bindParam(':USERNAME',$username);
		$query->execute();
		$user_id=$query->fetchAll(PDO::FETCH_ASSOC);
		$id = $user_id[0]['id'];
		// Lançar demais Informações Escolares
		$sql = "INSERT INTO escolaridade_info (usuario_id,escolaridade,area_de_estudo,instituicao,matriculado,desde,ate,habilidades) VALUES (:usuario_id,:escolaridade,:area_de_estudo,:instituicao,:matriculado,:desde,:ate,:habilidades)";
		$query = $this->db->pdo->prepare($sql);
		$emp = " ";
		$query->bindValue(':usuario_id',$id);
		$query->bindValue(':escolaridade',$emp);
		$query->bindValue(':area_de_estudo',$emp);
		$query->bindValue(':instituicao',$emp);
		$query->bindValue(':matriculado',$emp);
		$query->bindValue(':desde',$emp);
		$query->bindValue(':ate',$emp);
		$query->bindValue(':habilidades',$emp);
		$query->execute();
	}
	public function userLogin($data){
		$this->parser = new Parser;
		$email = $data['email'];
		$password = md5($data['password']);
		$result = $this->parser->getLoginUser($email,$password);
		if ($result) {
			Session::init();
			Session::set('login',true);
			Session::set('id',$result->id);
			Session::set('name',$result->name);
			Session::set('username',$result->username);
			Session::set('email',$result->email);
			$loginmsg = "<div class='alert alert-success'><strong>Seja bem vindo <?php echo Session::get('name);?></strong></div>";
			Session::set('loginmsg',$loginmsg);
			header('Location:index.php?page=perfil');
		}else{
			$msg = "<div class='alert alert-danger'><strong>Usuário ou senha incorretos</strong></div>";
			return $msg;
		}
	}
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
			$sql = "SELECT * FROM pesonal_info WHERE id=?";
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
		}
	}
	private function getUpdateEmail($id,$email){
		$sql = "UPDATE usuarios SET email=:email WHERE id=:id";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':id',$id);
		$result = $query->execute();
		return $result;
	}
	public function updateInfoPessoal($sobrenome,$cidade,$contato1,$tpcontato1,$contato2,$birthday,$pais,$estado,$bio,$profilepic,$id){
		$sql = "UPDATE pessoal_info SET sobrenome=:SOBRENOME, cidade=:CIDADE,contato1=:CONTATO1,tpcontato1=:TPCONTATO1,contato2=:CONTATO2,birthday=:BIRTHDAY, pais=:PAIS, estado=:ESTADO, bio=:BIO, profilepic=:PROFILEPIC WHERE id=:ID";
		$query = $this->db->pdo->prepare($sql);		
		$query->bindValue(':SOBRENOME',$sobrenome);
		$query->bindValue(':CIDADE',$cidade);
		$query->bindValue(':CONTATO1',$contato1);
		$query->bindValue(':TPCONTATO1',$tpcontato1);
		$query->bindValue(':CONTATO2',$contato2);
		$query->bindValue(':BIRTHDAY',$birthday);
		$query->bindValue(':PAIS',$pais);
		$query->bindValue(':ESTADO',$estado);
		$query->bindValue(':BIO',$bio);
		$query->bindValue(':PROFILEPIC',$profilepic);
		$query->bindValue(':ID',$id);
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
		}
	}
	private function getUpdatePassword($id,$old_password,$password){
		$checked = $this->checkOldPassword($id,$old_password);
		if ($checked){
			$sql = "UPDATE usuarios SET password=:password WHERE id=:id";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$id);
			$query->bindValue(':password',$password);
			$result = $query->execute();
			return $result;
		} 
		else {
		}
	}
	private function checkOldPassword($id,$old_password){
		$sql = "SELECT * FROM usuarios WHERE id=:id AND password=:old_password";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->bindValue(':old_password',$old_password);
		$checked = $query->execute();
		if($checked){
			return true;
		}else{
			return false;
		}
	}
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
		}
	}		
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
		$bio 		= $data['bio'];
		if ($this->checkCad($id)){
			unset($sql);unset($query);
			$table = "pessoal_info";
			if(isset($name)){
				$params = $name;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if(isset($sobrenome)){
				$params = $sobrenome;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if(isset($contato)){
				$params = $contato;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if(isset($pais)){
				$params = $pais;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if(isset($estado)){
				$params = $estado;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if(isset($cidade)){
				$params = $cidade;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if(isset($bio)){
				$params = $bio;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if(isset($email)){
				$table = "usuarios";
				$params = $email;
				$result = $this->parser->updateDB($table,$params,$id);
			}else{}
			if($result){
				$msg = "<div class='alert alert-success'><strong>Dados atualizados com sucesso!</strong></div>";
				return $msg;
				header('Location:index.php?page=perfil');
			}
		}
	}
	private function checkCad($id){
		$sql 	= "SELECT username FROM usuarios WHERE id=:id";
		$query 	= $this->db->pdo->prepare($sql);
		$query->bindValue(':id',$id);
		$query->execute();
		if ($query->rowCount() > 1) {
			return true;
		}else{
			return false;
		}
	}
	}//falta atualizar a página do perfil profissional e do perfil escolar
class pictureHandling{
	private $db;
	public function __construct(){$this->db = new Database();}
	private function __clone(){}
	//ainda vou mexer aqui
}
?>