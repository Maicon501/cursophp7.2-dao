<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
    	 return $this->idusuario;
    }

    public function setIdusuario($value){
         $this->idusuario = $value;
    }
    
    public function getDeslogin(){
    	 return $this->deslogin;
    }

    public function setDeslogin($value){
         $this->deslogin = $value;
    }

    public function getDessenha(){
    	 return $this->dessenha;
    }

    public function setDessenha($value){
         $this->dessenha = $value;
    }

    public function getDtcadastro(){
    	 return $this->dtcadastro;
    }

    public function setDtcadastro($value){
         $this->dtcadastro = $value;
    }

    public function loadById($id){

    	 $sql = new sql();

    	 $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusario = :ID", array( 
            ":ID"=>$id
    	 ));
    
         if (count($results) > 0){

            $this->setData($results[0]);
         //	$row = $results[0];

        // 	$this->setIdusuarios($row['idusuario']);
         //	$this->setDeslogin($row['deslogin']);
         //	$this->setDessenha($row['dessenha']);
         //	$this->setDtcadastro(($row['dtcadastro']));
         }

     }


     public static function getList(){

            $sql = new sql();

              return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
     }

     public function search($login){

              $sql = new sql();

              return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
                         ":SEARCH"=>"%".$login."%"
              ));

      }

      public function login($login, $password){

             $sql = new sql();

             $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array( 
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
           ));
      
           if (count($results) > 0){

           //$row = $results[0];

           $this->setIdusuario($row['idusuario']);
           $this->setDeslogin($row['deslogin']);
           $this->setDessenha($row['dessenha']);
           $this->setDtcadastro(($row['dtcadastro']));
          
          $this->setData($results[0]);

          } else {

               throw new Exception("Login e/ou senha Invalidos.");
          }             

       }
       
       public function setData($data){

          $this->setIdusuario($data['idusuario']);
           $this->setDeslogin($data['deslogin']);
           $this->setDessenha($data['dessenha']);
           $this->setDtcadastro(($data['dtcadastro']));


       }

       public function insert(){

          $sql = new sql();

          $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
              ':LOGIN'=>$this->getDeslogin(),
              ':PASSWORD'=>$this->getDessenha()

          ));

          if (count($results) > 0 ){
               $this->setData($results[0]);
          }


       }
        
    public function update($login, $password){

        $this->setDeslogin($login);
        $this->setDessenha($password);

        $sql = new sql();

        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
              ':LOGIN'=>$this->getDeslogin(),
              ':PASSWORD'=>$this->getDessenha(),
              ':ID'=>$this->getIdusuario()
        ));
    }

     public function __toString(){

     	   return json_encode(array(
              "idusuario"=>$this->getIdusuario(),
              "deslogin"=>$this->getDeslogin(),
              "dessenha"=>$this->getDessenha(),
              "dtcadastro"=>$this->getDtcadastro()
     	   ));
     }

}

?>