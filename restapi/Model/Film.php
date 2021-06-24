<?php

class Film
{
    private $id;
    private $cim;
    private $szabadhely;
    private $jegyar;
    private $conn;


    public function __construct($db){
        $this->conn = $db;
	}
	

	public function getId(){
		return $this->id;
	}

    public function read(){
        
		$sql = "SELECT * FROM filmek1";
    
        $stmnt = $this->conn->prepare($sql);
        $stmnt->execute();

        return $stmnt;
    }


    public function count_row(){
        //lekérdezés
        $sql = "SELECT * FROM filmek1";

        $stmnt = $this->conn->query($sql);
        $number = $stmnt->fetchColumn();
        
        return $number;
	}
	
	public function create(){

	$sql="INSERT INTO filmek1 SET cim=:cim,szabadhely=:szabadhely,jegyar=:jegyar";
		
	$stmnt= $this->conn->prepare($sql);
		
	$this->cim=htmlspecialchars(strip_tags($this->cim));
	$this->szabadhely=htmlspecialchars(strip_tags($this->szabadhely));
	$this->jegyar=htmlspecialchars(strip_tags($this->jegyar));
		
	$stmnt->bindParam(":cim",$this->cim);	
	$stmnt->bindParam(":szabadhely",$this->szabadhely);	
	$stmnt->bindParam(":jegyar",$this->jegyar);	
		
	$stmnt->execute();
	
	}
	public function update()
	
	{
	$sql="UPDATE filmek1 SET cim=:cim, szabadhely=:szabadhely,jegyar=:jegyar WHERE id = :id";
	$stmnt = $this->conn->prepare($sql);
	$this->cim=htmlspecialchars(strip_tags($this->cim));
	$this->szabadhely=htmlspecialchars(strip_tags($this->szabadhely));
	$this->jegyar=htmlspecialchars(strip_tags($this->jegyar));
	$this->id=htmlspecialchars(strip_tags($this->id));
		
	$stmnt->bindParam(":cim",$this->cim);	
	$stmnt->bindParam(":szabadhely",$this->szabadhely);	
	$stmnt->bindParam(":jegyar",$this->jegyar);
	$stmnt->bindParam(":id",$this->id);
		
	$stmnt->execute();
	}
	
public function delete()
{
	$sql = "DELETE FROM filmek1 WHERE id =?";
	$stmnt = $this->conn->prepare($sql);
	$this->id=htmlspecialchars(	strip_tags($this->id));
	$stmnt->bindParam(1,$this->id);
	if($stmnt->execute())
	{
		return true;
	}
	return false;
}
}


