<?php
class Usuario {
    private $conn;
    private $table = 'usuarios';

    public $id;
    public $nome;
    public $email;
    public $senha;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Registrar usuário
    public function register() {
        $query = "INSERT INTO " . $this->table . " (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conn->prepare($query);

        // Limpar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Hash da senha
        $this->senha = password_hash($this->senha, PASSWORD_BCRYPT);

        // Bind dos dados
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Login de usuário
    public function login($email, $senha) {
        $query = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($senha, $row['senha'])) {
            $this->id = $row['id'];
            $this->nome = $row['nome'];
            return true;
        }
        return false;
    }
}
?>
