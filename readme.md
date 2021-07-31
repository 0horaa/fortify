<h1 align="center">
	<img alt="Logo da Fortify" title="Logo da Fortify" src="./img/logo-fortify.png">
</h1>

<h1 align="center">Fortify</h1>
<p align="center">Um sistema construído como uma espécie de Beta de um produto que interliga usuários e academias cadastradas, possibilitando o agendamento de dias de treino na academia. Construído com PHP com o módulo PDO e o Banco de dados MySQL. Esse projeto não visa nenhum tipo de utilização prática no mercado e
foi construído apenas com fins de estudo.</p>
<h4>Projeto base finalizado 🚀</h4>
<hr>
<h3>Funcionalidades gerais</h3>

- [x] Landing page simples
- [x] Responsividade mobile completa, carrossel, modal e botão de voltar ao topo como recursos visuais
- [x] Cadastro e login de usuário
- [x] Cadastro e login de academia
- [x] Sistema de confirmação de cadastro por envio de email (somente no cadastro de usuário)
- [x] Validação no client-side com JavaScript
- [x] Sistema para alteração e exclusão do perfil do usuário e da academia
- [x] Cálculo de preço baseado em operações de divisão e porcentagem ()

<h3>Funcionalidades do painel do usuário</h3>

- [x] Sistema de listagem das academias disponíveis para o usuário
- [x] Sistema de agendamento de dias que envia o agendamento pra academia requisitada
- [x] Sistema de avaliação da academia por estrelas (ainda incompleto)
- [x] Sistema de vizualização das informações da academia
- [x] Sistema de vizualização e exclusão dos agendamentos já feitos
- [x] Sistema de filtragem de academias com parâmetros como: menores preços e melhor avaliados por estrelas
- [x] Sistema de pesquisa por nome das academias ou pela cidade de atuação da mesma

<h3>Funcionalidades do painel da academia</h3>

- [x] Sistema de listagem dos agendamentos feitos pelos usuários
- [x] Sistema de vizualização das informações dos usuários que fizeram o agendamento
- [x] Sistema de exclusão dos agendamentos feitos pelos usuários 
- [x] Sistema de pesquisa por nome, cpf ou data marcada do agendamento feito pelo usuário
<hr>
<h2 align="center">Teste a aplicação instalando-a na sua máquina</h2>
<p>Primeiramente, você vai precisar de um servidor web instalado na sua máquina, além de ter o banco de dados MySQL e o interpretador PHP. Não se assuste, é extremamente fácil hoje em dia baixar os 3 de uma vez com uma única instalação, independente do seu sistema operacional.</p>

Além disso, é ideal ter um software pra facilitar o manuseio do seu banco de dados MySQL. Eu recomendo o MySQL Workbench ou o PHPMyAdmin nesse sentido.

<h3>Configurando o banco de dados</h3>

##### Ligue o seu servidor local juntamente ao MySQL e ao Interpretador PHP
##### No software de banco de dados de sua preferência, importe o arquivo fortify.sql para usá-lo da forma adequada
##### Depois acesse o seu site e veja tudo funcionando
<hr>
<h2 align="center">Teste a aplicação hospedada na web</h2>
<p>
	A aplicação está hospedada nesse link 
	<a href="http://fortify.atwebpages.com/">fortify.atwebpages.com</a>.
	Vale ler algumas ressalvas antes de testar.
</p>

⚠️ ATENÇÃO. Caso queira criar um cadastro de academia no site pra testar, não utilize uma senha
que você use em quaisquer outros serviços. Use senhas genéricas como 000000, já que o login e o 
cadastro são realmente só pra testar as funcionalidades da aplicação. E como a hospedagem
não conta com protocolo HTTPS, é ideal não inserir informações e/ou senhas das quais você
utiliza em serviços reais.

O sistema de envio de emails com a lib PHPMailer não está funcionando na hospedagem, tendo em vista que a maioria dos serviços de hospedagem exigem que você utilize um email próprio criado por eles na hora de utilizar essa lib. Contudo, funcionará tranquilamente no seu servidor local ou na sua hospedagem com email próprio, contanto que:

- No arquivo "register_main.php" na linha 120 você insira no atributo "Username" o email de sua preferência que funcionará como o remetente dos emails;
	 	
- No mesmo arquivo na linha 121 você insira no atributo "Password" a senha do email de sua preferência que funcionará como o remetente dos emails;
	 	
- Você tenha os arquivos e os links corretos para as classes da lib. Todas as classes estão dentro de config/mailer. Além disso, no arquivo "register.php" nas primeiras 10 linhas é mostrado o processo pra importação e uso dessas classes, além da criação do objeto "$mail" que é utilizado no arquivo "register_main.php" pra acessar todas as propriedades da classe "PHPMailer()" e executar todas as funcionalidades necessárias;
	 	
- ⚠️ Obs: Caso esteja utilizando um gmail da google como remetente, você precisa ir nas configurações desse email da sua preferência e permitir o uso para servições externos. Para isso, vá até a página de gerenciamento de conta Google, depois em: "Segurança" > "Acesso a app menos seguro" e então clique em "Ativar acesso" e por fim ative o controle de "Permitir aplicativos menos seguros".

Caso não queira criar nenhuma conta, mas queira acessar o serviço para testar as funcionalidades, você pode usar as credenciais padrões que já existem para essa finalidade.

- No caso do login de usuário, você pode usar as seguintes credenciais:

email: sergio@gmail.com
senha: 123456

- E no caso de login da academia:

email: serginhojr21@gmail.com
senha: 123456
<hr>
<h2>🛠 Tecnologias</h2>

As ferramentas utilizadas para o desenvolvimento da aplicação foram:

- HTML, CSS e JavaScript
- PHP
- MySQL

### Autor
---

<a href="https://github.com/0horaa">
 <img style="border-radius: 50%;" src="https://github.com/0horaa.png" width="100px;" alt=""/>
 <br />
 <sub><b>Sérgio Gabriel</b></sub></a> 🚀


<a href="https://twitter.com/0hora_"><h4>Twitter</h4></a>
<a href="https://www.instagram.com/sergio_gbrl/">Instagram</a>

<hr> 
MIT License

Copyright (c) 2021 - Sérgio Gabriel

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE. 