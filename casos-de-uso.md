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
 - [CDU 10](#CDU-11): Alterar Email;
 - [CDU 11](#CDU-12): Alterar Senha;
 - [CDU 12](#CDU-10): Logout;
 
 
 
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
   
![WhatsApp Image 2023-12-14 at 15 41 43](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/8a75e95a-4122-4607-86dd-58af5e97f27f)

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
   
   ![WhatsApp Image 2023-12-14 at 15 59 48](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/88ae5f2d-6429-4364-a581-c580506f1595)

**Fluxo Alternativo  A**

1. O sistema exibirá a página inicial
2. O cliente clica em "Cadastro".
3. O sistema exibirá uma pagina de cadastro com um formulário.
4. O cliente irá inserir os dados no formulário (nome, sobrenome, e-mail, senha, cpf, data de nascimento e gênero).
5. Sistema exibe mensagem informando o problema: "As credenciais inseridas já estão cadastradas".
6. O cliente irá inserir os dados corretamente.
7. O cliente irá enviar os dados para o sistema. 
8. O cliente será cadastrado.

![WhatsApp Image 2023-12-14 at 14 25 17](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/940accdc-7db1-4d0e-86ca-f5d96997cd38)

 ### CDU 03 - Login
 
**Fluxo Principal**

1. O sistema exibirá a página inicial
2. O cliente clica em "Login".
3. O cliente será redirecionado para a página de login.
4. Os sistema exibirá os campos de email e senha.
5. Cliente entra com email e senha.
6. O sistema verifica as informações fornecidas pelo usuário.
7. O cliente está logado ao sistema.
   
![WhatsApp Image 2023-12-14 at 16 17 14 (1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/eb41fe1a-6bdc-4d08-88bd-b7612fe33590)

 **Fluxo Alternativo  A**

1. O sistema exibirá a página inicial do programa.
2. O cliente clica em "Login".
3. O cliente será redirecionado para a página de login.
4. Será exibido os campos de email e senha.
5. Cliente entra com email e senha.
7. O sistema informará ao cliente que as credenciais estão incorretos.

![WhatsApp Image 2023-12-14 at 15 01 07](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/2bf0c74a-f683-4447-99e5-9a6d28eeffde)

### CDU 04 - Recuperar senha

**Fluxo Principal**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita o email de recuperação e seleciona "Recuperar".
4. O sistema envia para o email inserido uma senha provisória que deve ser usada para login".
5. O sistema retorna uma mensagem de confirmação de email enviado.

![WhatsApp Image 2023-12-14 at 16 06 21 (1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/612a2c84-bf1e-4141-9cea-36fc14364253)

**Fluxo Alternativo  A**

1. O cliente seleciona a opção "Recuperar a senha "
2. O sistema requisita um email de recuperaçao.
3. O cliente digita um email que não consta no banco de dados para a recuperação e seleciona "Recuperar".
4. O sistema indentifica que não consta aquele email e imprime na tela "Email Inválido".

![WhatsApp Image 2023-12-14 at 15 06 28 (1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/a488f4f1-88ca-4d8d-b261-589aab489060)

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
   
![WhatsApp Image 2023-12-14 at 15 19 57](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/c74b77d6-e35a-4bb8-af94-e1e325c1097e)

### CDU 06 - Visualizar funcionários cadastrados

**Fluxo Principal**

1. O administrador possuirá uma interface própria para administradores.
2. Nessa interface terá um botão para ver os funcionários cadastrados.
3. O administrador clica nesse botão.
4. O sistema irá mostrar todos os funcionários cadastrados, com um botão para excluir os cadastros de funcionários.
   
![WhatsApp Image 2023-12-14 at 16 13 56 (1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/39bbab2d-dcd8-491a-aa65-b93f4054930c)

### CDU 07 - Visualizar agendamento

**Fluxo Principal**
1. A pagina principal possuirá um botão "Visualizar agendamentos". 
2. O sistema encaminhará o cliente à pagina de visualização de agendamentos.
3. O cliente poderá ver os agendamentos feitos

![WhatsApp Image 2023-12-14 at 16 25 06](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/0be9d9ba-f199-4752-9fb0-74c3a3376473)

### CDU 08 - Cancelar agendamento

**Fluxo Principal**
1. Na interface do usuario terá a página "agendamentos".
2. Dentro da página "agendamentos" cada agendamento que ainda não teve seu serviço prestado terá o botão "cancelar". 
3. O funcionário ou cliente clicará no botão "cancelar".
4. O sistema removerá o agendamento.

![279767478-5642a14b-db69-450c-bb23-506842798975 drawio (15)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/136659414/2c630c3c-9454-499b-a130-3591bbc7b486).
)

**Fluxo Alternativo A**

1. O usuario clicara para cancelar o agendamento
2. O sistema enviara uma mensagem de confirmação
3. O usuario clicara em não
4. O sistema retornara a pagina de agendamento

![WhatsApp Image 2023-12-14 at 16 39 25 (1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/a83106c2-c630-444b-9d3d-37632bed2353)

### CDU 09 - Excluir funcionário

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

### CDU 10 - Alterar Email

**Fluxo Principal**

1. O Cliente selecionará na pagina perfil "Alterar Email"
3. O Cliente colocará a senha atual e o email novo desejado
4. O sistema mudará o email caso a senha esteja certa
5. O sistema redireciona o cliente para login com o email alterado
   
![WhatsApp Image 2023-12-14 at 16 50 00](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/97b103bc-4b1a-4357-96f4-22d86500d9fa)

**Fluxo Alternativo  A**

1. O Cliente selecionará na pagina perfil "Alterar Email"
3. O Cliente colocará a senha atual e o email novo desejado
4. O sistema indica que a senha esta errada

![WhatsApp Image 2023-12-14 at 16 51 02](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/623eb28f-1231-4e5e-919b-7aba48ffbb26)

### CDU 11 - Alterar Senha

**Fluxo Principal**

1. O Cliente selecionará na pagina perfil "Alterar Senha"
3. O Cliente colocará a senha atual e senha nova
4. O sistema mudará a senha caso a senha atual esteja certa
5. O sistema redireciona o cliente para login com a senha alterada
   
![WhatsApp Image 2023-12-14 at 16 46 11 (1)](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/129e13a9-fd09-4a83-927e-62dea6bc42a0)

**Fluxo Alternativo  A**

1. O Cliente selecionará na pagina perfil "Alterar Senha"
2. O Cliente colocará a senha atual e a senha nova desejada
3. O cliente colocará a senha nova novamente para confirmação
4. O sistema indica que a senha está difirente da senha de confirmação
   
![WhatsApp Image 2023-12-14 at 16 48 07](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/e012fcb4-f3d6-4797-98ab-ce2062395822)

### CDU 12 - Logout

**Fluxo Principal**
1. O cliente selecionará "Logout"
2. O sistema encerra sessão
3. O sistema recarrega para página inicial

![WhatsApp Image 2023-12-02 at 23 01 30](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/142699957/d1badab7-edfb-404d-9cb0-cf5044727d01)





![Captura de tela 2023-12-14 171754](https://github.com/cp2-dc-info-projeto-final/medi-sched/assets/95931280/53d70da0-dfb1-43b6-b457-39a3195dbc15)


