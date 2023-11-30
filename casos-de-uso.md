# Documento de Casos de Uso

## Lista dos Casos de Uso

 - [CDU 01](#CDU-01): Cadastrar funcionário;
 - [CDU 02](#CDU-02): Cadastrar cliente;
 - [CDU 03](#CDU-03): Login;
 - [CDU 04](#CDU-04): Recuperar senha;
 - [CDU 05](#CDU-05): Agendamento;
 - [CDU 06](#CDU-06): Listar clientes cadastrados;
 - [CDU 07](#CDU-07): Disponibilização de horários
 - [CDU 08](#CDU-09): Visualizar agendamento;
 - [CDU 09](#CDU-10): Cancelar agendamento;
 - [CDU 10](#CDU-11): Excluir cliente;
 - [CDU 11](#CDU-12): Excluir funcionário;
 - [CDU 12](#CDU-13): Logout;
 
 
## Lista dos Atores
 - 
 - Cliente;
 - Funcionários; 
 - Administrador;

## Diagrama de Casos de Uso
![Diagrama CDU (3)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/136659414/687b06e2-3950-4ad8-8808-2e867532abc1)

### CDU 01

**Fluxo Principal**

1. O administrador fará 
2. O sistema exibirá a página inicial do administrador.
3. O administrador irá clicar em sua navbar.
4. O sistema exibirá as opções disponíveis na navbar.
5. O administrador irá clicar na opção "Cadastrar Funcionário".
6. O sistema exibirá a pagina de cadastro de funcionário.
7. O administrador irá cadastrar o funcionário.
8. O sistema voltará à sua pagina inicial de administrador.
   
![Fluxo Principal Funcionario](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/2c7a6f68-afab-4c5e-847e-901bca54e655)


**Fluxo Alternativo  A**

1. O administrador fará 
2. O sistema exibirá a página inicial do administrador.
3. O administrador irá clicar em sua navbar.
4. O sistema exibirá as opções disponíveis na navbar.
5. O administrador irá clicar na opção "Cadastrar Funcionário".
6. O sistema exibirá a pagina de cadastro de funcionário.
7. O administrador irá cadastrar o funcionário.
8. O sistema informará ao administrador que os campos de cadastro não estão preenchidos corretamento.
9. O administrador irá preencher os campos corretamente.
10. O sistema voltará à sua pagina inicial de administrador.
    
![Fluxo alternativo funcionario](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/c55d1bf3-9449-4635-9e65-a85cdf4b7fd6)


### CDU 02 

**Fluxo Principal**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome, e-mail, senha, cpf, data de nascimento).
5. O cliente irá enviar os dados para o sistema clicando no botão "Enviar".
6. O sistema informará ao cliente que o cadastro foi efetuado.

![Fluxo Principal Cliente](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/4fad766e-8244-4b10-a9d8-df1d23b84efd)

**Fluxo Alternativo  A**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome,e-mail ,senha, cpf, data de nascimento).
5. O cliente irá enviar os dados para o sistema clicando no botão "Enviar".
6. O sistema informará ao cliente que o email ou senha estão inválidos.
7. O cliente digitará corretamente email ou senha.
8. O cliente clica em "Enviar".
9. O sistema informará ao cliente que o cadastro foi efetuado.

![Fluxo alternativo Cliente](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/5457bc2c-7931-48f4-a31d-f2f8068a0894)

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

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/0ed60fb1-f390-4985-990e-029f0b403a1f)


 **Fluxo Alternativo  A**

1. O sistema exibirá a página inicial do programa.
2. O cliente clica em "Login".
3. O cliente será redirecionado para a página de login.
4. Será exibido os campos de email e senha.
5. Cliente entra com email e senha.
6. O cliente clica em "enviar".
7. O sistema informará ao cliente que o email ou senha estão incorretos.
8. O usuário corrige os dados incorretos, clica em enviar.
9. O programa reconhece novamente os dados, e então o direciona para a página principal caso estejam corretos, se não, repete o processo.

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/bea21e76-6d3a-47f5-b5f2-d03295669540)



### CDU 04 

**Fluxo Principal**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita o email de recuperação e seleciona "Recuperar".
4. O sistema envia para o email inserido uma senha provisória que deve ser usada para login".
5. O sistema retorna uma mensagem de cconfirmação de email enviado.

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/0edc3ee5-87a2-48a7-a0bd-50dec11b17ab)


**Fluxo Alternativo  A**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita um email que não consta no banco de dados para a recuperação e seleciona "Recuperar".
4. O sistema indentifica que não consta aquele email e imprime na tela "Email Inválido".

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/d14c1dad-4419-4b24-8cbe-a60ea066413a)


### CDU 05

 **Fluxo Principal**

1. O sistema exibirá os horários,especialização dos funcionários e os funcionários disponíveis na região do cliente.
2. O cliente irá escolher o horário,especialização do funcionário e os funcionarios disponíveis na região do cliente. 
3. O cliente irá clicar em "Agendar".
4. O cliente será redirecionado para outra página com o aviso "Agendamento efetuado!".

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/3f08a5bf-ffa4-4a80-aca0-e60136ca0357)


**Fluxo Alternativo  A**

1.  sistema exibirá os horários,especialização dos funcionários e os funcionários disponíveis na região do cliente.
2. O cliente irá escolher o horário,especialização do funcionário e os funcionários disponíveis na região do cliente. 
3. O cliente irá clicar em "Agendar".
4. O sistema informará que o funcionário ou o horário não está disponivel.
5. O cliente escolherá outro funcionário ou outro horário.
6. O cliente irá clicar em "Agendar".
7. O cliente será redirecionado para outra página com o aviso "Agendamento efetuado!".

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/80680e25-fcbf-434d-b5c1-3420a22fd544)


### CDU 06 

**Fluxo Principal**

1. O administrador possuirá uma interface própria para administradores.
2. Nessa interface possuirá um botão "Listar usuarios".
3. O administrador clica nesse botão e será redirecionado para outra página.
4. Essa página possuirá todos os usuarios cadastrados.

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/1ed019c9-d8c6-49ab-8210-2ac32c4ee6f9)

### CDU 07

**Fluxo Principal**  
1. O funcionário selecionará "serviços" na página principal
2. O sistema exibirá ao funcionário a lista de serviços.
3. O funcionário selecionará determinado serviço.
4. O funcionário criará datas e horários disponíveis 
5. O sistema confirmará datas e horários

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/2739aefc-c881-4883-82d1-f61ce713dfaf)

**Fluxo Alternativo  A** 
1. O funcionário selecionará "serviços" na página principal
2. O sistema exibirá ao funcionário a lista de serviços.
3. O funcionário selecionará determinado serviço.
4. O funcionário criará datas e horários disponíveis
5. O sistema informará que determinadas datas e horários disponíveis já foram criados anteriormente

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/58b444e5-7f53-4663-ba15-8d97de8b84d2)


### CDU 08

**Fluxo Principal**
1. A pagina principal possuirá um botão "Visualizar agendamentos". 
2. O sistema incaminhará o administrador, funcionário e cliente à pagina de visualização de agendamentos.
3. Os administradores e funcionários poderão ver os agendamentos feitos pelos clientes.
4. O cliente poderá ver os seus próprios agendamentos.
   
![Fluxo Principal](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/28a29710-9075-437f-83b9-d856d3800597)

### CDU 09 

**Fluxo Principal**
1. Na interface do funcionário terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou administrador clicará no botão "cancelar" e uma mensagem "Gostaria de cancelar esse agendamendo?" será exibida.
4. O funcionário ou administrador clicará em "sim" e a mensagem "cancelamento feito com sucesso!".

![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (15)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/9273ff33-6e92-40dc-a0b6-a0c0024a2e72)

**Fluxo alternativo A**
1. Na interface do funcionário terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou administrador clicará no botão "cancelar" e uma mensagem "Gostaria de cancelar esse agendamento?" será exibida.
4. O funcionário ou administrador clicará em "não" e o  sistema enviara ele de volta para a pagina "agendamentos".
   
![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (14)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/1e8b0d39-4385-4b09-89b6-ce6920f4b54d)

### CDU 10 
 
**Fluxo Principal**

1. O administrador irá acessar sua interface própria.
2. Na interface do administrador terá a página "Clientes".
3. O sistema exibirá a página "Clientes". Na página "Clientes" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada cliente. 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse cliente?" será exibida.
5. O administrador clicará em "sim" e excluirá o cliente.
   
![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (9)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/3a1236e1-0da3-40ac-a37c-661e7c5ab7d6)

**Fluxo Alternativo  A**

1. O administrador irá acessar sua interface própria
2. Na interface do administrador terá a página "Clientes".
3. O sistema exibirá a página "Clientes". Na página "Clientes" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada cliente 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse cliente?" será exibida.
5. O administrador clicará em "não" e não excluirá o cliente.
   
![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (10)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/b9c7b97b-94f5-4a7b-9c96-09547467f54e)

### CDU 11 

**Fluxo Principal**

1. O administrador irá acessar sua interface própria.
2. Na interface do administrador terá a página "Funcionários".
3. O sistema exibirá a página "Funcionários". Na página "Funcionários" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada funcionário. 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse funcionário?" será exibida.
5. O administrador clicará em "sim" e excluirá o funcionário.

![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (11)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/8112ea72-8baf-44b1-8a01-410fc7c590f5)

**Fluxo Alternativo A**

1. O administrador irá acessar sua interface própria
2. Na interface do administrador terá a página "Funcionário".
3. O sistema exibirá a página "Funcionário". Na página "Funcionário" haverá uma lista com cada funcionário. Haverá um botão "excluir"ao lado de cada funcionário 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse funcionário?" será exibida.
5. O administrador clicará em "não" e não excluirá o funcionário.

![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (8)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/c3552f96-b179-48d9-8e88-c157280e867c)

### CDU 12 

**Fluxo Principal**
1. O cliente selecionará "Sair"
2. O sistema encerra sessão
3. O sistema recarrega para página inicial

![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (12)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/3631d87b-4909-410a-a5ec-d463dae30e87)
