<?php

class TableRows extends RecursiveIteratorIterator {
    private $db;
    private $hand;
    
    public function __construct($it) {
    $this->db = new Database();
    $this->hand = new Handling();
    parent::__construct($it, self::LEAVES_ONLY);
  }

  public function current() {
    return "<td class='text-left'>" . parent::current(). "</td>";
  }

  public function beginChildren() {
    echo "<tr style='border:1px inset;'>";
  }

  public function endChildren() {
    echo "</tr>" . "\n";
  }


public function queryWorkers(){
  
  $sql = "SELECT pessoal_info.name,usuarios.username,usuarios.email FROM usuarios INNER JOIN pessoal_info ON usuarios.id = pessoal_info.id";
  $query = $this->db->pdo->prepare($sql);
  $query->execute();
  $result = $query->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($query->fetchAll())) as $key=>$val) {
    echo $val;
  }

}

public function search($data){
  $search = "";
  $search = $data['search'];
  $search = '%' . $search . '%';
  $sql = "SELECT * FROM usuarios LIKE :search";
  $query = $this->db->PDO->prepare($sql);
  $query->bindParam(':search',$search);
  $query->execute();
  $result = $query->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($query->fetchAll())) as $key => $val){
    echo $val;
  }
}
}

?>