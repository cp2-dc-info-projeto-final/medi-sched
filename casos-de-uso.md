# Documento de Casos de Uso

## Lista dos Casos de Uso

 - [CDU 01](#CDU-01): Cadastrar funcionário;
 - [CDU 02](#CDU-02): Cadastrar cliente;
 - [CDU 03](#CDU-03): Login;
 - [CDU 04](#CDU-04): Cadastro de Serviço;
 - [CDU 05](#CDU-05): Listar clientes cadastrados;
 - [CDU 06](#CDU-06): Editar cadastro;
 - [CDU 07](#CDU-07): Disponibilização de horários
 - [CDU 08](#CDU-08): Agendamento;
 - [CDU 09](#CDU-09): Visualizar agendamento;
 - [CDU 10](#CDU-10): Cancelar agendamento;
 - [CDU 11](#CDU-11): Excluir cliente;
 - [CDU 12](#CDU-12): Excluir funcionário;
 - [CDU 13](#CDU-13): Logout;

 

 

 
## Lista dos Atores

 - Cliente;
 - Funcionários; 
 - Administrador;

## Diagrama de Casos de Uso



### CDU 01

**Fluxo Principal**

1. O funcionário terá que ter permissão do administrador para acessar a página de cadastro de funcionário.
2. O sistema exibirá a página inicial.
3. O funcionário clica em "Cadastro de funcionário".
4. O sistema exibirá uma pagina de cadastro com um formulário.
5. O funcionário irá inserir os dados no formulário (nome, e-mail, senha e cargo).
6. O funcionário irá enviar os dados para o sistema clicando no botão "Enviar".
7. O administrador terá que permitir o cadastro do funcionário
8. O sistema informará ao funcionário que o cadastro foi efetuado  


**Fluxo Alternativo**

1. O funcionário terá que ter permissão do administrador para acessar a página de cadastro de funcionário.
2. O sistema exibirá a página inicial.
3. O funcionário clica em "Cadastro de funcionário".
4. O sistema exibirá uma pagina de cadastro com um formulário.
5. O funcionário irá inserir os dados no formulário (nome, e-mail, senha e cargo).
6. O funcionário irá enviar os dados para o sistema clicando no botão "Enviar".
7. O sistema informará ao funcionário que o email ou senha estão inválidos.
8. O funcionário digitará corretamente email ou senha.
9. O funcionário clica em "Enviar".
10. O administrador terá que permitir o cadastro do funcionário
11. O sistema informará ao funcionário que o cadastro foi efetuado 

**Fluxo Alternativo**

1. O funcionário terá que ter permissão do administrador para acessar a página de cadastro de funcionário.
2. O sistema exibirá a página inicial.
3. O funcionário clica em "Cadastro de funcionário".
4. O sistema exibirá uma pagina de cadastro com um formulário.
5. O funcionário irá inserir os dados no formulário (nome, e-mail, senha e cargo).
6. O funcionário irá enviar os dados para o sistema clicando no botão "Enviar".
7. O administrador terá que permitir o cadastro do funcionário
8. O administrador não permitirá o cadastro do funcionário
9. O sistema informará ao funcionário que o cadastro não foi permitido


### CDU 02 

**Fluxo Principal**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome, e-mail, senha, cpf, data de nascimento).
5. O cliente irá enviar os dados para o sistema clicando no botão "Enviar".
6. O sistema informará ao cliente que o cadastro foi efetuado. 

**Fluxo Alternativo**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome,e-mail ,senha, cpf, data de nascimento).
5. O cliente irá enviar os dados para o sistema clicando no botão "Enviar".
6. O sistema informará ao cliente que o email ou senha estão inválidos.
7. O cliente digitará corretamente email ou senha.
8. O cliente clica em "Enviar".
9. O sistema informará ao cliente que
o cadastro foi efetuado.(Fluxo-alternativo-cliente.png)


 ### CDU 03

**Fluxo Principal**

1. O sistema exibirá a página inicial
2. O cliente clica em "Login".
3. O cliente será redirecionado para a página de login.
4. Os sistema exibirá os campos de email e senha.
5. Cliente entra com email e senha.
6. O cliente clica em "enviar".
7. O sistema verifica as informações fornecidas pelo usuário.
8. O cliente está logado ao sistema.

 **Fluxo Alternativo**

1. O sistema exibirá a página inicial do programa.
2. O cliente clica em "Login".
3. O cliente será redirecionado para a página de login.
4. Será exibido os campos de email e senha.
5. Cliente entra com email e senha.
6. O cliente clica em "enviar".
7. O sistema informará ao cliente que o email ou senha estão incorretos.
8. O usuário corrige os dados incorretos, clica em enviar.
9. O programa reconhece novamente os dados, e então o direciona para a página principal caso estejam corretos, se não, repete o processo.

### CDU 04

 **Fluxo Principal**

1. O sistema exibirá os horários,especialização dos funcionários e os funcionários disponíveis na região do cliente.
2. O cliente irá escolher o horário,especialização do funcionário e os funcionarios disponíveis na região do cliente. 
3. O cliente irá clicar em "Agendar".
4. O cliente será redirecionado para outra página com o aviso "Agendamento efetuado!". 

**Fluxo Alternativo**

1.  sistema exibirá os horários,especialização dos funcionários e os funcionários disponíveis na região do cliente.
2. O cliente irá escolher o horário,especialização do funcionário e os funcionários disponíveis na região do cliente. 
3. O cliente irá clicar em "Agendar".
4. O sistema informará que o funcionário ou o horário não está disponivel.
5. O cliente escolherá outro funcionário ou outro horário.
6. O cliente irá clicar em "Agendar".
7. O cliente será redirecionado para outra página com o aviso "Agendamento efetuado!". 

### CDU 05 

**Fluxo Principal**

1. O administrador possuirá uma interface própria para administradores.
2. Nessa interface possuirá um botão "Listar usuarios".
3. O administrador clica nesse botão e será redirecionado para outra página.
4. Essa página possuirá todos os usuarios cadastrados.
5. O administrador poderá editar cadastros.

### CDU 06
**Fluxo Principal**

1. O administrador irá acessar sua interface própria
2. Nessa interface possuirá um botão "Listar usuarios".
3. O administrador clica nesse botão e será redirecionado para outra página.
4. Essa página possuirá todos os usuarios cadastrados.
5. O administrador poderá editar cadastros.
6. O administrador selecionará um cliente.
7. O administrador tentará editar o cadastro.
8. Será exibido a mensagem de que o cadastro foi editado.

### CDU 07

**Fluxo Principal**  
1. O funcionário selecionará "serviços" na página principal
2. O sistema exibirá ao funcionário a lista de serviços.
3. O funcionário selecionará determinado serviço.
3. O funcionário criará datas e horários disponíveis 
4. O sistema confirmará datas e horários



**Fluxo Alternativo** 
1. O funcionário selecionará "serviços" na página principal
2. O sistema exibirá ao funcionário a lista de serviços.
3. O funcionário selecionará determinado serviço.
3. O funcionário criará datas e horários disponíveis
5. O sistema informará que determinadas datas e horários disponíveis já foram criados anteriormente

### CDU 08 
 
**Fluxo Principal**
1. O cliente selecionará um serviço 
2. O sistema exibirá uma lista de funcionários disponíveis para o agendamento
3. O cliente irá selecionar funcionário desejado.
4. O sistema exibirá uma lista de horários disponíveis de determinado funcionário.
5. O cliente seleciona horário
6. O sistema confirmará o agendamento
7. O sistema exibirá "agendamento cadastrado"
8. O sistema recarrega para a página inicial.


### CDU 09 

**Fluxo Principal**
1. A pagina principal possuirá um botão "Visualizar agendamentos". 
2. O sistema incaminhará o administrador, funcionário e cliente à pagina de visualização de agendamentos.
3. Os administradores e funcionários poderão ver os agendamentos feitos pelos clientes.
4. O cliente poderá ver os seus próprios agendamentos.

### CDU 10 

**Fluxo Principal**
1. Na interface do funcionário terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou administrador clicará no botão "cancelar" e uma mensagem "Gostaria de cancelar esse agendamendo?" será exibida.
4. O funcionário ou administrador clicará em "sim" e a mensagem "cancelamento feito com sucesso!".

**Fluxo alternativo**
1. Na interface do funcionário terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou administrador clicará no botão "cancelar" e uma mensagem "Gostaria de cancelar esse agendamendo?" será exibida.
4. O funcionário ou administrador clicará em "não" e a mensagem "cancelamento negado!".

### CDU 11 
 
**Fluxo Principal**

1. O administrador irá acessar sua interface própria.
2. Na interface do administrador terá a página "Clientes".
3. O sistema exibirá a página "Clientes". Na página "Clientes" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada cliente. 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse cliente?" será exibida.
5. O administrador clicará em "sim" e excluirá o cliente. 

**Fluxo Alternativo**

1. O administrador irá acessar sua interface própria
2. Na interface do administrador terá a página "Clientes".
3. O sistema exibirá a página "Clientes". Na página "Clientes" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada cliente 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse cliente?" será exibida.
5. O administrador clicará em "não" e não excluirá o cliente.

### CDU 12 

**Fluxo Principal**

1. O administrador irá acessar sua interface própria.
2. Na interface do administrador terá a página "Funcionários".
3. O sistema exibirá a página "Funcionários". Na página "Funcionários" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada funcionário. 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse funcionário?" será exibida.
5. O administrador clicará em "sim" e excluirá o funcionário. 

**Fluxo Alternativo**

1. O administrador irá acessar sua interface própria
2. Na interface do administrador terá a página "Funcionário".
3. O sistema exibirá a página "Funcionário". Na página "Funcionário" haverá uma lista com cada funcionário. Haverá um botão "excluir"ao lado de cada funcionário 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse funcionário?" será exibida.
5. O administrador clicará em "não" e não excluirá o funcionário. 


### CDU 13 

**Fluxo Principal**
1. O cliente selecionará "Sair"
2. O sistema incerra sessão
3. O sistema recarrega para página inicial

