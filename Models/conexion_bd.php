<?PHP

class BD_PDO
{


	public $num_registros = 0;
	
	function Ejecutar_Instruccion($instruccion_sql)
	{
		$host = "localhost";
		$usr  = "root";
		$pwd  = "";
		$db   = "agestor1";

		try {
				$conexion = new PDO("mysql:host=$host;dbname=$db;",$usr,$pwd);
		       //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		catch(PDOException $e)
			{
		      echo "Failed to get DB handle: " . $e->getMessage();
		      exit;    
		    }
		 $query=$conexion->prepare($instruccion_sql);
		if(!$query)
		{
			return "Error al mostrar";
		}
		else
		{
			$query->execute();
			$this->num_registros = $query->rowCount();
			while ($result = $query->fetch())
			    {
			        $rows[] = $result;
			    }	
		}
		return $rows;
	}



	function Num_registros()
		{
			       
			
			return $this->$num_registros;

		}
}
?>