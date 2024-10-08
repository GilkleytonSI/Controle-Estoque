<?php
include_once '../config/config.php';

$database = new Database();
$db = $database->connect();

$produto = new Produto($db);

$resultado = $produto->read();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Estoque</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script>
        // Mostrar o botão quando a página é rolada
        window.onscroll = function() {
            var backToMenuButton = document.getElementById("back-to-menu");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                backToMenuButton.style.display = "block";
            } else {
                backToMenuButton.style.display = "none";
            }
        };
    
        // Função para rolar a página de volta para o menu (header)
        function scrollToMenu() {
            document.documentElement.scrollTop = 0; // Para navegadores mais recentes
            document.body.scrollTop = 0; // Para navegadores mais antigos
        }
    </script>
    
</head>
<body>
    <!-- Botão de voltar para o menu -->
    <button id="back-to-menu" onclick="scrollToMenu()">↑</button>

    <header>
        <div class="header-container">
            <h1>Sistema de Estoque</h1>
            <nav>
                <ul>
                    <li><a href="#dashboard">Dashboard</a></li>
                    <li><a href="#produtos">Produtos</a></li>
                    <li><a href="#repor-estoque">Repor Estoque</a></li>
                    <li><a href="#configuracoes">Configurações</a></li>
                </ul>
            </nav>
            <!-- Botão de alternância entre modo escuro e claro -->
            <button id="toggle-theme">🌙</button>
        </div>
    </header>

    <main>
        <section id="dashboard">
            <h2>Dashboard</h2>
            <div class="cards">
                <div class="card">
                    <h3>Total de Produtos</h3>
                    <p>120</p>
                </div>
                <div class="card">
                    <h3>Itens Abaixo do Estoque Mínimo</h3>
                    <p>15</p>
                </div>
                <div class="card">
                    <h3>Reposições Pendentes</h3>
                    <p>5</p>
                </div>
            </div>
        </section>

        <section id="produtos">
            <h2>Produtos em Estoque</h2>
            <table>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome do Produto</th>
                        <th>Quantidade</th>
                        <th>Preço</th>
                        <th>Estoque Mínimo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['nome'] ?></td>
                            <td><?= $row['quantidade'] ?></td>
                            <td>R$ <?= $row['preco'] ?></td>
                            <td><?= $row['estoque_min'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <section id="repor-estoque">
            <h2>Reposição de Estoque</h2>
            <form>
                <label for="codigo-produto">Código do Produto:</label>
                <input type="text" id="codigo-produto" name="codigo-produto" required>

                <label for="quantidade-repor">Quantidade a Repor:</label>
                <input type="number" id="quantidade-repor" name="quantidade-repor" required>

                <label for="fornecedor">Fornecedor:</label>
                <select id="fornecedor" name="fornecedor" required>
                    <option value="fornecedor-a">Fornecedor A</option>
                    <option value="fornecedor-b">Fornecedor B</option>
                </select>

                <button type="submit" class="btn-repor">Repor Estoque</button>
            </form>
        </section>

        <section id="configuracoes">
            <h2>Configurações do Sistema</h2>
            <form>
                <div class="form-group">
                    <label for="limite-minimo">Limite Mínimo de Estoque:</label>
                    <input type="number" id="limite-minimo" name="limite-minimo" required>
                </div>

                <div class="form-group">
                    <label for="fornecedor-padrao">Fornecedor Padrão:</label>
                    <select id="fornecedor-padrao" name="fornecedor-padrao" required>
                        <option value="fornecedor-a">Fornecedor A</option>
                        <option value="fornecedor-b">Fornecedor B</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tempo-reposicao">Tempo Médio de Reposição (dias):</label>
                    <input type="number" id="tempo-reposicao" name="tempo-reposicao" required>
                </div>

                <div class="form-group">
                    <label for="email-notificacoes">Email para Notificações:</label>
                    <input type="email" id="email-notificacoes" name="email-notificacoes" required>
                </div>

                <div class="form-group">
                    <label for="alertas-ativos">Ativar Alertas Automáticos:</label>
                    <input type="checkbox" id="alertas-ativos" name="alertas-ativos" checked>
                </div>

                <button type="submit" class="btn-salvar">Salvar Configurações</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Sistema de Estoque. Todos os direitos reservados.</p>
    </footer>
    <script src="../assets/js/scripts.js"></script>
</body>
</html>
