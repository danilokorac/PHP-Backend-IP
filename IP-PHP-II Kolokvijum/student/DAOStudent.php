<?php
require_once '../config/db.php';

class DAOStudent {
	private $db;

	private $INSERTSTUDENT = "INSERT INTO student (ime, prezime, brIndexa) VALUES (?, ?, ?)";
	private $DELETESTUDENT = "DELETE  FROM student WHERE id = ?";
	private $SELECTBYID = "SELECT * FROM student WHERE id = ?";	
	private $GETLASTNSTUDENATA = "SELECT * FROM student ORDER BY idosoba DESC LIMIT ?";
	private $UPDATESTUDENT = "UPDATE student SET ime = ?, prezime = ?, brIndexa = ? WHERE id = ?";
	private $SELECTALLSTUDENTS = "SELECT * from student";
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getLastNStudenata($n)
	{
	
		$statement = $this->db->prepare($this->GETLASTNSTUDENATA);
		$statement->bindValue(1, $n, PDO::PARAM_INT);
		
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}

	public function insertStudent($ime, $prezime, $brIndexa)
	{
		$statement = $this->db->prepare($this->INSERTSTUDENT);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $brIndexa);
		
		$statement->execute();
	}

	public function deleteStudent($id)
	{

		$statement = $this->db->prepare($this->DELETESTUDENT);
		$statement->bindValue(1, $id);
		
		$statement->execute();
	}

	public function getStudentById($id)
	{
		
		$statement = $this->db->prepare($this->SELECTBYID);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}

	public function checkIfStudentExist($id)
	{
		
		$statement = $this->db->prepare($this->SELECTBYID);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		if($statement->fetch()) {
			return true;
		} else {
			return false;
		}
	}

	public function updateStudent($id, $ime, $prezime, $brIndexa) {
		$statement = $this->db->prepare($this->UPDATESTUDENT);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $brIndexa);
		$statement->bindValue(4, $id);
		
		$statement->execute();
	}

	public function selectAllStudents()
	{
		$statement = $this->db->prepare($this->SELECTALLSTUDENTS);
		$statement->execute();
		
		$result = $statement->fetchAll();
		return $result;
	}
}
?>
