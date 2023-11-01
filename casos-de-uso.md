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

 - Cliente;
 - Funcionários; 
 - Administrador;

## Diagrama de Casos de Uso
![Diagrama CDU (3)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/136659414/687b06e2-3950-4ad8-8808-2e867532abc1)

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
   
![Fluxo Principal Funcionario](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/2579b643-8c6a-4a46-8cec-af4dbfb7b3cb)

**Fluxo Alternativo  A**

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
    
![Fluxo alternativo funcionario](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/a44b2040-efec-48e7-9124-fd8b9a7dd141)

**Fluxo Alternativo  B**

1. O funcionário terá que ter permissão do administrador para acessar a página de cadastro de funcionário.
2. O sistema exibirá a página inicial.
3. O funcionário clica em "Cadastro de funcionário".
4. O sistema exibirá uma pagina de cadastro com um formulário.
5. O funcionário irá inserir os dados no formulário (nome, e-mail, senha e cargo).
6. O funcionário irá enviar os dados para o sistema clicando no botão "Enviar".
7. O administrador terá que permitir o cadastro do funcionário
8. O administrador não permitirá o cadastro do funcionário
9. O sistema informará ao funcionário que o cadastro não foi permitido
   
![Fluxo alternativo funcionario2](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/2d8f1877-e687-456c-9a80-59ec47706777)

### CDU 02 

**Fluxo Principal**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome, e-mail, senha, cpf, data de nascimento).
5. O cliente irá enviar os dados para o sistema clicando no botão "Enviar".
6. O sistema informará ao cliente que o cadastro foi efetuado.

![Fluxo Principal Cliente](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/447a9514-e7a6-4568-bd25-4fbfc166c9ee)

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

![Fluxo alternativo Cliente](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/798c9c38-3ba4-4b35-967f-6576fa991f4a)

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

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/8c602529-5164-41ba-a3a7-4b0352be6aec)

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

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/c34d8f0a-7b8d-4491-91aa-1c5b863372d6)


### CDU 04 

**Fluxo Principal**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita o email de recuperação e seleciona "Recuperar".
4. O sistema envia para o email inserido uma senha provisória que deve ser usada para login".
5. O sistema retorna uma mensagem de cconfirmação de email enviado.

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/c402b964-07fc-4474-8bd8-ef037f589c1f)

**Fluxo Alternativo  A**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita um email que não consta no banco de dados para a recuperação e seleciona "Recuperar".
4. O sistema indentifica que não consta aquele email e imprime na tela "Email Inválido".

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/dd2e6f59-97c8-40a1-98a0-6c560ae13a82)

### CDU 05

 **Fluxo Principal**

1. O sistema exibirá os horários,especialização dos funcionários e os funcionários disponíveis na região do cliente.
2. O cliente irá escolher o horário,especialização do funcionário e os funcionarios disponíveis na região do cliente. 
3. O cliente irá clicar em "Agendar".
4. O cliente será redirecionado para outra página com o aviso "Agendamento efetuado!".

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/77c3bf7b-07d6-48a4-b204-2a8bdbff97d9)

**Fluxo Alternativo  A**

1.  sistema exibirá os horários,especialização dos funcionários e os funcionários disponíveis na região do cliente.
2. O cliente irá escolher o horário,especialização do funcionário e os funcionários disponíveis na região do cliente. 
3. O cliente irá clicar em "Agendar".
4. O sistema informará que o funcionário ou o horário não está disponivel.
5. O cliente escolherá outro funcionário ou outro horário.
6. O cliente irá clicar em "Agendar".
7. O cliente será redirecionado para outra página com o aviso "Agendamento efetuado!".

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/66ea8269-31ea-46d5-88e8-a1236ddde305)

### CDU 06 

**Fluxo Principal**

1. O administrador possuirá uma interface própria para administradores.
2. Nessa interface possuirá um botão "Listar usuarios".
3. O administrador clica nesse botão e será redirecionado para outra página.
4. Essa página possuirá todos os usuarios cadastrados.

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/14d14d2e-3e1d-4ca8-9f3d-9f26471360d4)

### CDU 07

**Fluxo Principal**  
1. O funcionário selecionará "serviços" na página principal
2. O sistema exibirá ao funcionário a lista de serviços.
3. O funcionário selecionará determinado serviço.
4. O funcionário criará datas e horários disponíveis 
5. O sistema confirmará datas e horários

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/f4b0e4d2-edf2-4ed2-87fa-6cdc4b6fc8da)

**Fluxo Alternativo  A** 
1. O funcionário selecionará "serviços" na página principal
2. O sistema exibirá ao funcionário a lista de serviços.
3. O funcionário selecionará determinado serviço.
4. O funcionário criará datas e horários disponíveis
5. O sistema informará que determinadas datas e horários disponíveis já foram criados anteriormente

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/b28e9b96-30e3-410e-9cb7-2b8eaec71d6c)

### CDU 08

**Fluxo Principal**
1. A pagina principal possuirá um botão "Visualizar agendamentos". 
2. O sistema incaminhará o administrador, funcionário e cliente à pagina de visualização de agendamentos.
3. Os administradores e funcionários poderão ver os agendamentos feitos pelos clientes.
4. O cliente poderá ver os seus próprios agendamentos.
   
![Fluxo Principak visu](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/b29c0c2d-39cd-44df-971e-f687edd604fc)

### CDU 09 

**Fluxo Principal**
1. Na interface do funcionário terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou administrador clicará no botão "cancelar" e uma mensagem "Gostaria de cancelar esse agendamendo?" será exibida.
4. O funcionário ou administrador clicará em "sim" e a mensagem "cancelamento feito com sucesso!".

![aRabio saudito(1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/c1f49ac8-56f3-4df4-811b-7dceb381a93d)

**Fluxo alternativo A**
1. Na interface do funcionário terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou administrador clicará no botão "cancelar" e uma mensagem "Gostaria de cancelar esse agendamendo?" será exibida.
4. O funcionário ou administrador clicará em "não" e a mensagem "cancelamento negado!".

### CDU 10 
 
**Fluxo Principal**

1. O administrador irá acessar sua interface própria.
2. Na interface do administrador terá a página "Clientes".
3. O sistema exibirá a página "Clientes". Na página "Clientes" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada cliente. 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse cliente?" será exibida.
5. O administrador clicará em "sim" e excluirá o cliente. 

**Fluxo Alternativo  A**

1. O administrador irá acessar sua interface própria
2. Na interface do administrador terá a página "Clientes".
3. O sistema exibirá a página "Clientes". Na página "Clientes" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada cliente 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse cliente?" será exibida.
5. O administrador clicará em "não" e não excluirá o cliente.

### CDU 11 

**Fluxo Principal**

1. O administrador irá acessar sua interface própria.
2. Na interface do administrador terá a página "Funcionários".
3. O sistema exibirá a página "Funcionários". Na página "Funcionários" haverá uma lista com cada cliente. Haverá um botão "excluir"ao lado de cada funcionário. 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse funcionário?" será exibida.
5. O administrador clicará em "sim" e excluirá o funcionário.

%3CmxGraphModel%3E%3Croot%3E%3CmxCell%20id%3D%220%22%2F%3E%3CmxCell%20id%3D%221%22%20parent%3D%220%22%2F%3E%3CmxCell%20id%3D%222%22%20value%3D%22return%22%20style%3D%22html%3D1%3BverticalAlign%3Dbottom%3BendArrow%3Dopen%3Bdashed%3D1%3BendSize%3D8%3Bcurved%3D0%3Brounded%3D0%3B%22%20edge%3D%221%22%20parent%3D%221%22%3E%3CmxGeometry%20x%3D%22-0.0019%22%20relative%3D%221%22%20as%3D%22geometry%22%3E%3CmxPoint%20x%3D%22-390.5%22%20y%3D%22690%22%20as%3D%22targetPoint%22%2F%3E%3CmxPoint%20x%3D%22-130%22%20y%3D%22690%22%20as%3D%22sourcePoint%22%2F%3E%3CArray%20as%3D%22points%22%3E%3CmxPoint%20x%3D%22-260%22%20y%3D%22690%22%2F%3E%3C%2FArray%3E%3CmxPoint%20as%3D%22offset%22%2F%3E%3C%2FmxGeometry%3E%3C%2FmxCell%3E%3C%2Froot%3E%3C%2FmxGraphModel%3E

**Fluxo Alternativon A**

1. O administrador irá acessar sua interface própria
2. Na interface do administrador terá a página "Funcionário".
3. O sistema exibirá a página "Funcionário". Na página "Funcionário" haverá uma lista com cada funcionário. Haverá um botão "excluir"ao lado de cada funcionário 
4. O administrador clicará no botão "excluir" e uma mensagem de "Gostaria de excluir esse funcionário?" será exibida.
5. O administrador clicará em "não" e não excluirá o funcionário. 


### CDU 12 

**Fluxo Principal**
1. O cliente selecionará "Sair"
2. O sistema incerra sessão
3. O sistema recarrega para página inicial

