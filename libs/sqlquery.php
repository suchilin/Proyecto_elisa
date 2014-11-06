<?php
abstract class sqlQuery{
    protected $hostname = 'localhost'; 
    protected $username = 'root';
    protected $db_pass = ''; //sin contrase�a
    protected $dbName = 'sagarpa'; //base de datos
    protected $rows = array();
    protected $query;
    private $conn; // variable usada en la conexion
    public $mensaje = 'Hecho';

    abstract protected function get(); //leer
    abstract protected function set(); //crear
    abstract protected function edit(); //editar
    abstract protected function delete(); //eliminar
    
    private function open_connection(){ //para abrir la conexion
        //try {
            $this->conn = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->db_pass);
            /* se crea la conexion en la variable dbh*/
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //}
        //catch(PDOException $e)
        //{
            //echo $e->getMessage();
        //};
    }

    private function disconnect(){ //desconectar 
        try{
            $this->conn = null;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    protected function exec_query(){
			$this->open_connection();
			try{
				$c = $this->conn->exec($this->query);
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			$this->disconnect();
		
	}


    protected function get_results_from_query() {
        $this->open_connection();
        $result = $this->conn->query($this->query); #la conexion la almacena en la variable $result
        if($result->rowCount() != 0)
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $this->rows[] = $row;
			}
        $this->disconnect();
    }
}
?>
