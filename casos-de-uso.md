# Documento de Casos de Uso

## Lista dos Casos de Uso

 - [CDU 01](#CDU-01): Cadastrar funcionário;
 - [CDU 02](#CDU-02): Cadastrar cliente;
 - [CDU 03](#CDU-03): Login;
 - [CDU 04](#CDU-04): Recuperar senha;
 - [CDU 05](#CDU-05): Agendamento;
 - [CDU 06](#CDU-06): Visualizar funcionários cadastrados;
 - [CDU 07](#CDU-07): Visualizar agendamento;
 - [CDU 08](#CDU-08): Cancelar agendamento;
 - [CDU 09](#CDU-09): Excluir funcionário;
 - [CDU 10](#CDU-10): Logout;
 - [CDU 11](#CDU-11): Alterar Email;
 - [CDU 12](#CDU-12): Alterar Senha;
 
 
 
## Lista dos Atores

 - Cliente;
 - Funcionários; 
 - Administrador;

## Diagrama de Casos de Uso
![Diagrama CDU (3)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/136659414/2eea3a72-5052-4dc3-a695-7016692a15d6)

### CDU 01 - Cadastrar Funcionario
**Fluxo Principal**

1. O administrador acessará a sua pagina inicial.
2. O sistema exibirá a página inicial.
3. O administrador seleciona "Cadastrar funcionário".
4. O sistema exibirá uma pagina de cadastro com um formulário de cadastro.
5. O administrador irá inserir os dados no formulário (nome, e-mail, senha, CPF, especialidade e gênero).
6. O administrador irá enviar os dados para o sistema. 
7. O funcionário será cadastrado.
   
![Diagrama sem nome drawio](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/6288b632-adba-4fcf-8065-4e50598f78e3)

**Fluxo Alternativo  A**

1. O administrador acessará a sua pagina inicial.
2. O sistema exibirá a página inicial.
3. O administrador seleciona "Cadastrar funcionário".
4. O sistema exibirá uma pagina de cadastro com um formulário de cadastro.
5. O administrador irá inserir os dados no formulário (nome, e-mail, senha, CPF, especialidade e gênero).
6. Sistema exibe mensagem informando o problema: "As informações inseridas já estão cadastradas".
7. Administrador repete o processo de cadastro.

![WhatsApp Image 2023-12-14 at 14 12 04](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/b69b65f8-e253-42ef-89d7-91570eda32de)

### CDU 02 - Cadastrar cliente

**Fluxo Principal**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome, sobrenome, e-mail, senha, cpf, data de nascimento e gênero).
5. O cliente irá enviar os dados para o sistema. 
6. O cliente será cadastrado.
   
![WhatsApp Image 2023-12-02 at 22 51 12](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/8e2b68f8-3cfa-4dd6-9153-a5bfb0a603dd)

**Fluxo Alternativo  A**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome, sobrenome, e-mail, senha, cpf, data de nascimento e gênero).
5. Sistema exibe mensagem informando o problema: "As credenciais inseridas já estão cadastradas".
6. O cliente irá inserir os dados corretamente.
7. O cliente irá enviar os dados para o sistema. 
8. O cliente será cadastrado.

![WhatsApp Image 2023-12-14 at 14 19 50](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/5afd03db-334a-4cd4-abe6-c44195960fc0)

 ### CDU 03 - Login
 
**Fluxo Principal**

1. O sistema exibirá a página inicial
2. O cliente clica em "Login".
3. O cliente será redirecionado para a página de login.
4. Os sistema exibirá os campos de email e senha.
5. Cliente entra com email e senha.
6. O sistema verifica as informações fornecidas pelo usuário.
7. O cliente está logado ao sistema.

![WhatsApp Image 2023-12-02 at 22 58 01 (1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/91bb2e8a-e810-469a-af48-69319353e6cc)

 **Fluxo Alternativo  A**

1. O sistema exibirá a página inicial do programa.
2. O cliente clica em "Login".
3. O cliente será redirecionado para a página de login.
4. Será exibido os campos de email e senha.
5. Cliente entra com email e senha.
7. O sistema informará ao cliente que as credenciais estão incorretos.

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/bea21e76-6d3a-47f5-b5f2-d03295669540)



### CDU 04 - Recuperar senha

**Fluxo Principal**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita o email de recuperação e seleciona "Recuperar".
4. O sistema envia para o email inserido uma senha provisória que deve ser usada para login".
5. O sistema retorna uma mensagem de confirmação de email enviado.

![WhatsApp Image 2023-12-02 at 23 52 41](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/b01e7182-740c-4fb6-a00a-c16c4ce1f6c8)

**Fluxo Alternativo  A**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita um email que não consta no banco de dados para a recuperação e seleciona "Recuperar".
4. O sistema indentifica que não consta aquele email e imprime na tela "Email Inválido".

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/d14c1dad-4419-4b24-8cbe-a60ea066413a)


### CDU 05 - Agendamento

 **Fluxo Principal**

1. O sistema exibirá os horários, especialização dos funcionários e os funcionários disponíveis para o cliente.
2. O cliente irá escolher o horário, especialização do funcionário e os funcionarios. 
3. O cliente irá clicar em "Agendar".
4. O cliente será redirecionado para outra página com a confirmação de seu agendamento.

![WhatsApp Image 2023-12-02 at 23 12 04](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/ab09f20d-e858-4ee0-ad92-b9d48e796e15)

**Fluxo Alternativo  A**

1.  sistema exibirá os horários e especialização dos funcionários.
2. O cliente irá escolher o horário e especialização do funcionário. 
3. O cliente irá clicar em "Agendar".
4. O sistema informará que o funcionário ou o horário não está disponivel.
5. O cliente escolherá outro funcionário ou outro horário.
6. O cliente irá clicar em "Agendar".
7. O cliente será redirecionado para outra página com a confirmação de seu agendamento.

![WhatsApp Image 2023-12-02 at 23 14 19](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/ccc0cb7b-454b-4407-a300-1e96b1ea7743)

### CDU 06 - Visualizar funcionários cadastrados

**Fluxo Principal**

1. O administrador possuirá uma interface própria para administradores.
2. Nessa interface terá um botão para ver os funcionários cadastrados.
3. O administrador clica nesse botão.
4. O sistema irá mostrar todos os funcionários cadastrados, com um botão para excluir os cadastros de funcionários.

![image](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/1ed019c9-d8c6-49ab-8210-2ac32c4ee6f9)


### CDU 07

**Fluxo Principal**
1. A pagina principal possuirá um botão "Visualizar agendamentos". 
2. O sistema encaminhará o cliente à pagina de visualização de agendamentos.
3. O cliente poderá ver os agendamentos feitos
   
![Fluxo Principal](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142700631/28a29710-9075-437f-83b9-d856d3800597)

### CDU 08 

**Fluxo Principal**
1. Na interface do funcionário terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou cliente clicará no botão "cancelar".
4. O sistema removerá o agendamento.

![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (15)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/136659414/2c630c3c-9454-499b-a130-3591bbc7b486).
)


### CDU 09

**Fluxo Principal**

1. O administrador irá acessar sua interface própria.
2. Na interface do administrador terá a página "Funcionários".
3. O sistema exibirá a página "Funcionários". Na página "Funcionários" haverá uma lista com cada cliente. Haverá um botão "excluir" ao lado de cada funcionário. 
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

### CDU 10

**Fluxo Principal**
1. O cliente selecionará "Logout"
2. O sistema encerra sessão
3. O sistema recarrega para página inicial

![WhatsApp Image 2023-12-02 at 23 01 30](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/d1badab7-edfb-404d-9cb0-cf5044727d01)

### CDU 11

**Fluxo Principal**

1. O Cliente selecionará na pagina perfil "Alterar Email"
3. O Cliente colocará a senha atual e o email novo desejado
4. O sistema mudará o email caso a senha esteja certa
5. O sistema redireciona o cliente para login com o email alterado
   
![WhatsApp Image 2023-12-02 at 23 37 06](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/4e8eac0c-f652-47b7-b6ee-69451d046c68)

**Fluxo Alternativo  A**

1. O Cliente selecionará na pagina perfil "Alterar Email"
3. O Cliente colocará a senha atual e o email novo desejado
4. O sistema indica que a senha esta errada

![WhatsApp Image 2023-12-02 at 23 41 09](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/97ed3b12-ea89-4f33-b69c-1fc2df014405)

### CDU 12

**Fluxo Principal**

1. O Cliente selecionará na pagina perfil "Alterar Senha"
3. O Cliente colocará a senha atual e senha nova
4. O sistema mudará a senha caso a senha atual esteja certa
5. O sistema redireciona o cliente para login com a senha alterada

![WhatsApp Image 2023-12-02 at 23 46 08](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/e101b867-1c17-4b3c-a421-104a2776394c)

**Fluxo Alternativo  A**

1. O Cliente selecionará na pagina perfil "Alterar Senha"
3. O Cliente colocará a senha atual e o senha nova desejada
4. O sistema indica que a senha esta errada
   
![WhatsApp Image 2023-12-02 at 23 41 09](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/86304821-da2f-456e-9db9-e630fb8daa92)
