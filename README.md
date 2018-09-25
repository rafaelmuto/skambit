# Projeto_int
Projeto Integrador Digital House -T05

### Descrição:
Este é repositorio do projeto integrador do curso de Fullstack da Digital House - Villa Olimpia. Os integrantes do grupo são:

- Aline Silva
- Rafael Muto
- Thiago Pereira
- ~~Tonico Dias~~
- ~Tulio Almeida~

Esse README sera atualizado...

### Instruções:
Trabalharemos no projeto em branches separadas que serão testadas antes de commitarmos ao git. Quando a tarefa estiver concluida e aprovada daremos o merge da branch para o master. Lembrando que para que o trabalho flua sem problemas é necessario mantermos as nossa braches atualizadas!

#### Para clonar o repositorio:

No GitHub:

1. Clicar em Clone or download e copiar a URL do repositório.
2. No Bash/Command line: `git clone [URL do repositorio]`.

#### Iniciar a sua Branch:
Para deixar tudo organizado vamos utilizar a seguinte nomeclatura para os nomes das branches; *branch_nome*.
Uma vez que o repositorio esteja clonado na sua maquina o comando para iniciar a sua branch sera:

1. `git checkout -b [branch_nome]` para criar a nova branch e mudar a branch ativa para ela.
2. `git push origin [branch_nome]` para pushar a branch para o repositorio.

### GitHub Help:

#### Trabalhar com a sua Branch:

A ordem para modificar/subir os seus arquivos é:
1. `git pull origin master` para puxarmos as atualizações do repositorio remoto.
2. `git status` para vermos o status do branch (arquivos que foram ou a serem modificados/deletados/adicionados). E **confirmar qual a branch onde esta trabalhando**.
3. `git add [nome do arquivo]` para adicionar os arquivos a serem commitados.
  * Alternativamente podemos usar o `git add .` para addicionarmos todos os arquivos da lista ao commit **(cuidado!)**.
4. `git commit -m "[mensagem]"` para commitar e adicionar a mensagem referente ao commit.
  * Caso vc esqueça de colocar `-m` o git vai abrir o Vim e vai virar uma bagunça, aperte `esc` e digite `:q!`, o programa sera encerrado e vc pode repetir o passo 4 (mas nao custa nada dar um `git status` só pra confirmar onde o processo parou).
5. `git push origin [branch_nome]` para enviar os arquivos adicionados e commitados à sua branch remota!

#### Para enviar seus commits para Branch Master: 

**Niguém deve commitar na branch Master**

Realizar esse processo só quando a funcionalidade estiver completa:
1. `git checkout master` para mudar para branch master.
2. `git pull origin master` para atualizar sua branch master local com os commits da remota.
3. `git checkout [branch_nome]` para mudar para sua branch.
4. `git merge master` para trazer os commits novos da master para sua branch local. Pode ocorrer conflitos nesse momento, caso aconteça será necessário analisar um a um.
5. `git push origin [branch_nome]` para atualizar sua branch remota.
6. No GitHub, criar um pull request da sua branch para a branch master.
7. Outro membro do grupo deve aceitar o pull request.
