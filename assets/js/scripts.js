// Seleciona o botão de alternância de tema e o corpo do documento
const toggleThemeButton = document.getElementById('toggle-theme');
const body = document.body;

// Verifica se já existe um tema salvo no localStorage
const savedTheme = localStorage.getItem('theme');
if (savedTheme) {
    body.classList.add(savedTheme);
    toggleThemeButton.textContent = savedTheme === 'dark-mode' ? '☀️' : '🌙';
}

// Função para alternar o tema
toggleThemeButton.addEventListener('click', function() {
    body.classList.toggle('dark-mode');

    // Altera o ícone do botão com base no tema ativo
    if (body.classList.contains('dark-mode')) {
        toggleThemeButton.textContent = '☀️';
        localStorage.setItem('theme', 'dark-mode');
    } else {
        toggleThemeButton.textContent = '🌙';
        localStorage.setItem('theme', 'light-mode');
    }
});
