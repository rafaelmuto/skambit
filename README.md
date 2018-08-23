# Projeto_int
Projeto Integrador Digital House -T05

### Descrição:
Este é repositorio do projeto integrador do curso de Fullstack
da Digital House - Villa Olimpia. Os integrantes do grupo são:

- Aline Silva
- Rafael Muto
- Thiago Pereira
- Tonico Dias
- Tulio Almeida

Esse README sera atualizado...

### Instruções:
Para organizarmos o trabalho trabalharemos no projeto em branches
separadas que serão testadas antes de commitarmos ao git. Quando 
a tarefa estiver concluida e aprovada daremos o merge da branch
para o master. Lembrando que para que o trabalho flua sem problemas
é necessario mantermos as nossa braches atualizadas!

#### Iniciar a sua Branch:
Para deixar tudo organizado vamos utilizar a seguinte nomeclatura para os nomes das branches; *branch_nome*.
Uma vez que o repositorio esteja clonado na sua maquina o comando para iniciar a sua branch sera:

1. `git checkout -b [branch_nome]` para criar a nova branch e mudar a branch ativa para ela.
2. `git push origin [branch_nome]` para pushar a branch para o repositorio.

### GitHub Help:

A ordem para modificar/subir os arquivos é:
1. `git pull` para puxarmos as atualizações do repositorio.
2. `git status` para vermos o status do branch (arquivos que foram ou a serem modificados/deletados/adicionados). E **confirmar qual a branch onde estamos trabalhando**.
3. `git add [nome do arquivo]` para adicionar os arquivos a serem commitados.
  * Alternativamente podemos usar o `git add .` para addicionarmos todos os arquivos da lista ao commit **(cuidado!)**.
4. `git commit -m "[mensagem]"` para commitar e adicionar a mensagem referente ao commit.
  * Caso vc esqueça de colocar `-m` o git vai abrir o Vim e vai virar uma bagunça, aperte `esc` e digite `:q!`, o programa sera encerrado e vc pode repetir o passo 4 (mas nao custa nada dar um `git status` só pra confirmar onde o processo parou).
5. `git push` para enviar os arquivos addicionados e commitados à sua branch!
