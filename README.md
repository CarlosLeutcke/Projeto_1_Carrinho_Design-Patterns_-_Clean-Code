# Projeto_1_Carrinho_Design-Patterns_-_Clean-Code

# Simulador de Carrinho de Compras 

**Disciplina**: Design Patterns & Clean Code 
**Projeto**: PRD — Carrinho de Compras 

## Integrante
Nome do Aluno: Carlos Henrique LEgutcke Filho — RA 1988772


##  Objetivo 

- Desenvolver um sistema simples em **PHP puro** aplicando PSR-12, KISS e DRY, para simular a operação de um carrinho de compras em um e-commerce. 


##  Como executar 1. 

Clone o repositório para a pasta htdocs do XAMPP. 
2. Inicie o Apache no XAMPP. 
3. Acesse no navegador: (http://localhost/Projeto_1_Carrinho_Design-Patterns_-_Clean-Code-main/Projeto_1/index.php)


##  Funcionalidades 

- Listagem de produtos (fixos em array).
- Adicionar itens ao carrinho.
- Validar quantidade e estoque.
- Remover itens do carrinho.
- Calcular total do carrinho.
- Aplicar cupom de desconto DESCONTO10 (-10%).


##  Casos de Uso

1. **Adicionar produto válido** - Entrada: produto id=1, quantidade=2 - Saída: Produto adicionado, estoque atualizado.
2. **Adicionar além do estoque** - Entrada: produto id=3, quantidade=10 - Saída: Erro → "Estoque insuficiente".
3. **Remover produto** - Entrada: produto id=1 - Saída: Produto removido, estoque restaurado.
4. **Aplicar cupom de desconto** - Entrada: cupom DESCONTO10 - Saída: Total final reduzido em 10%.


##  Limitações

- Não há persistência em banco de dados (apenas arrays/objetos).
- Não há login de usuário. - Dados de entrada são fixos no código.
- Não utiliza frameworks externos (somente PHP puro).

##  Estrutura de pastas
 Projeto_1/ 
 ├── classes/ 
 │ ├── Cart.php 
 │ ├── CartItem.php 
 │ ├── LoggeError.php 
 │ └── Product.php 
 ├── index.php 
 └── README.md
