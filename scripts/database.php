<?php
    class Database{
        private $PDOLocal;
        private $user = "root";
        private $password = "";
        private $server = "mysql:host=127.0.0.1;dbname=base_itsl_curso;charset=utf8";
        
        public function conectarDB(){
            try{
                $this->PDOLocal = new PDO($this->server,$this->user,$this->password);
            }catch(PDOException $e){
                echo "Error de conexion";
                echo $e->getMessage();
            }
        }
        
        public function ejecutarSQL($query){
            try{
                $this->PDOLocal->query($query);
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        
        public function desconectarDB(){
            try{
                $this->PDOLocal = null;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        
        public function seleccionar($query){
            try{
                $resultado = $this->PDOLocal->query($query);
                $renglon = $resultado->rowCount();
                
                if($renglon > 0){
                    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                        $Datos[]=$row;
                    }
                }else{
                    $Datos[] = null;
                }
                return $Datos;
                
            }catch(PDOException $e){
                $e->getMessage();
            }
        }
        
    }

/*    $db = new Database();
    $db->conectarDB();
    $resp = $db->seleccionar("select * from peliculas");
    print_r($resp);*/
?>