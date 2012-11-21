# Como preparar os arquivos

Importar o `users.csv` usando o plugin Import users from csv. Isso vai importar todos os munícipios como nome de usuário atribuindo como senha o código do IBGE.

Conectar o ibge_educ.csv com o posts.csv:

    `csvjoin -c ibge,ibge posts.csv ibge_educ.csv > whole.csv`

Importar o `whole.csv` usando o plugin `CSV Importer`. Campos sem `csv_` são importados como custom fields.

As perguntas do IBGE foram todas importadas usando o formato A001 - onde 001 é o número da pergunta.
