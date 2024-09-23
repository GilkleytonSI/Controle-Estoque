<?php
class Produto {
    private $conn;
    private $table = 'produtos';

    public $id;
    public $nome;
    public $quantidade;
    public $preco;
    public $estoque_min;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar produto
    public function create() {
        $query = "INSERT INTO " . $this->table . " (nome, quantidade, preco, estoque_min) VALUES (:nome, :quantidade, :preco, :estoque_min)";
        $stmt = $this->conn->prepare($query);

        // Limpar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->quantidade = htmlspecialchars(strip_tags($this->quantidade));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->estoque_min = htmlspecialchars(strip_tags($this->estoque_min));

        // Bind dos dados
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':estoque_min', $this->estoque_min);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Listar produtos
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Atualizar produto
    public function update() {
        $query = "UPDATE " . $this->table . " SET nome = :nome, quantidade = :quantidade, preco = :preco, estoque_min = :estoque_min WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Limpar dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->quantidade = htmlspecialchars(strip_tags($this->quantidade));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->estoque_min = htmlspecialchars(strip_tags($this->estoque_min));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind dos dados
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':quantidade', $this->quantidade);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':estoque_min', $this->estoque_min);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Deletar produto
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Limpar dados
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind do ID
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
