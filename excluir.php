<?php 
require 'classecliente.php';

class excluir {
    public function excluir($id)
    {
        $con = ConexaoBD::getConexao(); 
        $sql = "DELETE FROM cliente WHERE IDCLIENTE = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id); 
        return $stmt->execute();
    }
}
?>