<?php
require 'conexaobd.php';

class Cliente
{
    private $id_cliente;
    private $nome;
    private $email;
    private $telefone;
    private $cpf;
    private $dataNascimento;


    public function getId()
    {
        return $this->id_cliente;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getTelefone()
    {
        return $this->telefone;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function setId($id_cliente)
    {
        $this->id_cliente = $id_cliente; 
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function setDataNascimento($data)
    {
        $this->dataNascimento = $data;
    }


    public function inserirCliente()
{
    try {
        $con = ConexaoBD::getConexao(); 
        $sql = "INSERT INTO cliente (NOME, EMAIL, TELEFONE, CPF, DATA_NASCIMENTO)
                VALUES (:nome, :email, :telefone, :cpf, :data)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':data', $this->dataNascimento);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $this->id_cliente = $con->lastInsertId(); 
            return true;
        } else {
            return false;
        }

        } catch (PDOException $e) {
            die("Erro ao inserir cliente: " . $e->getMessage());
        }
    }


    public function consultar($id_cliente)
    {
        $con = ConexaoBD::getConexao();
        $sql = "SELECT * FROM cliente WHERE IDCLIENTE = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id', $id_cliente);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($dados) {
            $this->id_cliente = $dados['IDCLIENTE'];
            $this->nome = $dados['NOME'];
            $this->email = $dados['EMAIL'];
            $this->telefone = $dados['TELEFONE'];
            $this->cpf = $dados['CPF'];
            $this->dataNascimento = $dados['DATA_NASCIMENTO'];
            return true;
        }
        return false;
    }


    public static function listar()
    {
        $con = ConexaoBD::getConexao();
        $sql = "SELECT * FROM cliente ORDER BY NOME";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function alterar()
    {
        $con = ConexaoBD::getConexao();
        $sql = "UPDATE cliente
                SET NOME = :nome, EMAIL = :email, TELEFONE = :telefone, CPF = :cpf, DATA_NASCIMENTO = :data
                WHERE IDCLIENTE = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':data', $this->dataNascimento);
        $stmt->bindParam(':id', $this->id_cliente);
        return $stmt->execute();
    }


    public function excluir($id)
    {
        try {
            $con = ConexaoBD::getConexao();
            $sql = "DELETE FROM cliente WHERE IDCLIENTE = :id";
            $stmt = $con->prepare($sql);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>