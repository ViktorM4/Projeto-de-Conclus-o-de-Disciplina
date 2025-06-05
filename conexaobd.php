<?php
class ConexaoBD {
    private static $host = 'localhost';
    private static $dbname = 'pcd_2025_1';
    private static $usuario = 'root';
    private static $senha = '';
    private static $conexao;

    public static function getConexao() {
        if (!isset(self::$conexao)) {
            try {
                self::$conexao = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$usuario, self::$senha);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$conexao;
    }
}
?>
