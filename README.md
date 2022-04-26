# Sistema Básico de Chamados em PHP + Bootstrap

> Desenvolvido durante a graduação em 2016.

## Como executar o projeto
### Inicar o XAMPP ou WAMPP e importar o arquivo "chamados.sql" no banco de dados MySQL.

### Verificar se os dados de conexão estão de acordo com o usuário configurado na sua base de dados (arquivo "conexao.php"):
``` bash
$pdo=new PDO ("mysql:host=127.0.0.1;dbname=chamados","root","");
```