# ENGENHARIA SOFTWARE

## Requisitos
* xxx
* Software Git para controle de versão e gerenciamento de código-fonte

## Como trabalhar com o repositório forkado do GitHub no VS Code

### Passos para clonar e configurar o projeto (itens 1, 2 e 3)

### 1. Fazer Fork do Repositório
1. Acesse o repositório original no GitHub.
2. Clique no botão **Fork** no canto superior direito da página. Isso criará uma cópia do repositório original na sua conta do GitHub.

### 2. Clonar o Repositório forkado localmente
1. Na sua conta, vá até o repositório forkado no GitHub e clique no botão **Code**.
2. Copie a URL do repositório forkado (exemplo `https://github.com/SEU-USUARIO/engenharia_software.git`).
3. Abra o Visual Studio Code e o terminal integrado (pressione `Ctrl + '`).
4. Navegue até o diretório onde deseja clonar o repositório:
   ```bash
   cd /caminho/para/diretorio
   ```
5. Clone o repositório:
   ```bash
   git clone https://github.com/SEU-USUARIO/engenharia_software.git
   ```
6. Entre no diretório clonado:
   ```bash
   cd nome-do-repositorio
   ```

### 3. Configurar o Repositório Remoto "Upstream"
1. Adicione o repositório original como um repositório remoto chamado `upstream`:
   ```bash
   git remote add upstream https://github.com/rafaosss/engenharia_software.git
   ```
2. Verifique se o remote foi configurado corretamente:
   ```bash
   git remote -v
   ```
   O comando deve retornar algo como:
   ```
   origin    https://github.com/SEU-USUARIO/engenharia_software.git (fetch)
   origin    https://github.com/SEU-USUARIO/engenharia_software.git (push)
   upstream  https://github.com/rafaosss/engenharia_software.git  (fetch)
   upstream  https://github.com/rafaosss/engenharia_software.git  (push)
   ```

## Modificações e atualizações do código no GitHub via VS Code
1. Para realizar as alterações no código, abra o VS Code e acesse o diretório do projeto, posteriormente abra o proejo utilizando a linha de comando:
   ```bash
   code .
   ```
2. Após realizar e salvar as alterações, verifique o status das modificações:
   ```bash
   git status
   ```
3. Adicione os arquivos modificados ao commit:
   ```bash
   git add .
   ```
4. Faça o commit das alterações:
   ```bash
   git commit -m "Descrição das alterações"
   ```
5. Envie alterações para o GitHub:
  ```bash
  git push origin main
  ```
6. Buscar atualizações do repositório original:
  ```bash
  git fetch upstream
  ```
7. Mesclar atualizações do repositório original:
  ```bash
  git merge upstream/main
  ```

8. **IMPORTANTE** - Se não houver conflitos, o merge será realizado com sucesso. No entanto, se houver conflitos, o Git irá informar quais arquivos estão em conflito, e o colaborador precisará resolver esses conflitos manualmente. Se houver conflitos, o colaborador deve:
- Abrir os arquivos em conflito no VS Code.
- Localizar as seções marcadas com `<<<<<<<, =======, e >>>>>>>`.
- Editar o arquivo para resolver o conflito, escolhendo as alterações que deseja manter.
- Após resolver todos os conflitos, salvar os arquivos.
- Adicionar e fazer Commit das alterações conforme itens 3 a 7.

9. **ATENÇÃO** - Necessário realizar o `Create Pull Request`via Navegador Web no GitHub
- Acesse o GitHub e vá para o seu repositório forkeado;
- Verifique se alterações que você fez e enviou via git push para sua branch no repositório forkeado estão corretas.
- Na página inicial do seu repositório forkeado, se houver diferenças entre a sua branch e a branch principal do repositório original, o GitHub exibirá o botão `Contribute` logo no topo da página.
- Verifique a comparação das branches. O GitHub automaticamente irá comparar a branch base (normalmente main ou master do repositório original) com a sua branch de comparação (a branch onde você fez as mudanças no repositório forkeado). Se as branches corretas não forem selecionadas automaticamente, você pode ajustá-las manualmente na página.
- Preencha o título e a descrição referente as alterações realizadas.
- Revise as mudanças.
- Crie o Pull Request clicando no botão verde `Create pull request` e o Pull Request será enviado ao repositório original, e os mantenedores do  projeto poderão revisar suas alterações, solicitar mudanças ou aceita-lá.
- O acompanhamento do Pull Request (comentários, aprovações e status) pode ser realizado através da aba "Pull requests" tanto do repositório original quanto do seu repositório forkeado.

## Dicas Extras:
- Sempre mantenha o repositório forkado atualizado com o repositório original para evitar conflitos.
- Utilize as mensagens de commit para detalhar as modificações feitas.