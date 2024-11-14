# Projeto Feira de Ciências - ETEC 2024

Este projeto é um sistema de cadastro de visitantes para a **Feira de Ciências da ETEC 2024**. O sistema permite que os visitantes se cadastrem para obter informações sobre o vestibulinho de 2025 via WhatsApp, e também classifiquem-se como **Aluno**, **Familiar** ou **Visitante**.

## Funcionalidades

- **Cadastro de Visitantes**: Permite aos visitantes se cadastrarem informando nome, telefone, tipo de visitante (Aluno, Familiar ou Visitante) e se desejam receber informações sobre o vestibulinho 2025 via WhatsApp.
- **Validação de Formulário**: Valida se todos os campos obrigatórios foram preenchidos corretamente.
- **Armazenamento de Dados**: Os dados dos visitantes são armazenados em um banco de dados MySQL.
- **Interface Responsiva**: A interface foi construída utilizando HTML, CSS (com a biblioteca Bootstrap) e JavaScript.

## Tecnologias Utilizadas

- **PHP**: Para a lógica de backend e processamento de formulários.
- **MySQL**: Para o armazenamento dos dados dos visitantes.
- **HTML & CSS**: Para a construção da interface de usuário.
- **Bootstrap**: Para facilitar a criação de uma interface responsiva e estilizada.
- **JavaScript**: Para validação de telefone e interação com a interface.

## Estrutura do Projeto

FeiraEtec/ │ ├── images/ # Imagens usadas na interface ├── styles/ # Arquivos 
de estilo CSS │ └── style.css # Estilo principal da página ├── conexao/ # Arquivo de conexão com
o banco de dados │ └── conexao.php # Configuração do banco de dados MySQL ├── visitantes.php # Página 
principal de cadastro de visitantes


## Como Usar

### Pré-requisitos

- Ter um servidor web como o **XAMPP** ou **WAMP** instalado.
- Ter o **PHP** e o **MySQL** configurados corretamente no seu servidor local.
- Banco de dados **feiraetec** criado no MySQL
