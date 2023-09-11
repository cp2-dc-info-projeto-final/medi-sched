# CASOS DE USO

## CDU Página de Login ( 1 ):
### Fluxo principal

1. O usuário entra na página de login do usuário.
2. O usuário insere seu endereço de e-mail e senha.
3. O usuário clica no botão "Entrar".
4. O sistema verifica o endereço de e-mail e a senha do usuário.
5. Se o endereço de e-mail e a senha estiverem corretos, o sistema permite que o usuário faça login.
6. Se o endereço de e-mail e a senha estiverem incorretos, o sistema exibe uma mensagem de erro.

### Fluxo alternativo  ( 2 ): Esqueceu a senha:

1. O usuário entra na página de login do usuário.
2. O usuário clica no link "Esqueceu a senha?".
3. O sistema envia um e-mail de redefinição de senha para o endereço de e-mail do usuário.
4. O usuário abre o e-mail e clica no link "Redefinir senha".
5. O sistema abre uma nova página onde o usuário pode inserir uma nova senha.
6. O usuário insere uma nova senha e clica no botão "Redefinir senha".
7. O sistema altera a senha do usuário e o usuário pode fazer login com a nova senha.

### Fluxo alternativo  ( 3 ): Senha ou e-mail incorreta

1. O usuário entra na página de login do usuário.
2. O usuário insere seu e-mail e senha.
3. O usuário clica no botão "Entrar".
4. O sistema verifica o e-mail e a senha do usuário.
5. Se o e-mail e a senha estiverem corretos, o sistema permite que o usuário faça login.
6. Se o e-mail e a senha estiverem incorretos, o sistema exibe uma mensagem de erro e pede ao usuário para tentar novamente.
7. O usuário tenta novamente com um e-mail diferente.
8. Se o e-mail estiver correto, o sistema envia um e-mail de redefinição de senha para o endereço de e-mail do usuário.
9. O usuário tenta novamente com uma senha diferente.
10. Se a senha estiver correta, o sistema permite que o usuário faça login.
11. Se a senha estiver incorreta, o sistema exibe uma mensagem de erro e pede ao usuário para entrar em contato com o suporte ao cliente.

## CDU Página de cadastro ( 2 ):


### Fluxo principal

1. O usuário acessa a página de cadastro.
2. O usuário insere seu nome, endereço de e-mail e senha.
3. O usuário clica no botão "Criar conta".
4. O sistema verifica o endereço de e-mail e a senha do usuário.
5. Se o endereço de e-mail e a senha estiverem corretos, o sistema cria uma conta para o usuário.
6. O sistema envia um e-mail de confirmação para o endereço de e-mail do usuário.
7. O usuário clica no link de confirmação no e-mail.
8. A conta do usuário é ativada e o usuário pode fazer login no sistema.

### Fluxo alternativo - E-mail incorreto

1. O usuário acessa a página de cadastro.
2. O usuário insere um endereço de e-mail incorreto.
3. O sistema exibe uma mensagem de erro e pede ao usuário para tentar novamente.
4. O usuário tenta novamente com um endereço de e-mail correto.
5. O sistema verifica o endereço de e-mail e a senha do usuário.
6. Se as credenciais estiverem corretas, o sistema cria uma conta para o usuário.
7. Um e-mail de confirmação é enviado para o endereço de e-mail fornecido.
8. O usuário clica no link de confirmação no e-mail.
9. A conta é ativada e o usuário pode fazer login no sistema.

## CDU Página de agendamento ( 3 ):

### Fluxo principal - Agendar Consulta Médica

1. O paciente seleciona "Agendar Consulta".
2. O sistema exibe uma lista de especialidades médicas disponíveis.
3. O paciente seleciona a especialidade desejada (por exemplo, Cardiologia).
4. O sistema exibe uma lista de médicos disponíveis na especialidade escolhida.
5. O paciente seleciona um médico e visualiza sua agenda.
6. O paciente escolhe uma data e horário disponíveis para a consulta.
7. O sistema solicita a confirmação do agendamento.
8. O paciente confirma o agendamento.
9. O sistema exibe uma confirmação de agendamento com os detalhes da consulta.
10. O sistema envia um e-mail ou SMS de confirmação para o paciente.

## Fluxo Alternativo 1: Paciente Não Encontra Horário Disponível

1. No passo 5 do fluxo principal, se o médico não tiver horários disponíveis próximos, o sistema exibe uma mensagem indicando que não há horários disponíveis e sugere tentar outra data ou médico.

## Fluxo Alternativo 2: Paciente Deseja Modificar Agendamento

1. O paciente acessa o sistema de agendamento.
2. O sistema exibe o painel do paciente.
4. O paciente seleciona "Meus Agendamentos".
5. O sistema exibe a lista de agendamentos do paciente.
6. O paciente seleciona o agendamento que deseja modificar.
7. O sistema exibe os detalhes do agendamento e opções para modificar ou cancelar.
8. O paciente escolhe "Modificar Agendamento".
9. O sistema exibe opções para escolher uma nova data e horário.
10. O paciente escolhe um novo horário e confirma a modificação.
11. O sistema exibe uma confirmação da modificação.

## Fluxo Alternativo 3: Paciente Deseja Cancelar Agendamento

1. O paciente acessa o sistema de agendamento.
2. O sistema exibe o painel do paciente.
3. O paciente seleciona "Meus Agendamentos".
4. O sistema exibe a lista de agendamentos do paciente.
5. O paciente seleciona o agendamento que deseja cancelar.
6. O sistema exibe os detalhes do agendamento e opções para modificar ou cancelar.
7. O paciente escolhe "Cancelar Agendamento".
8. O sistema solicita confirmação para o cancelamento.
9. O paciente confirma o cancelamento.
10. O sistema exibe uma confirmação do cancelamento.

## Fluxo Alternativo 4: Paciente Solicita Lista de Espera

1. No passo 5 do fluxo principal, se o médico não tiver horários disponíveis, o sistema oferece ao paciente a opção de entrar em uma lista de espera.
2. O paciente opta por entrar na lista de espera para o horário desejado.
3. Se um horário se tornar disponível devido a um cancelamento, o sistema notifica o paciente da lista de espera.

## Fluxo Alternativo 5: Paciente Esquece Senha

1. O paciente tenta fazer login, mas não lembra da senha.
2. O paciente seleciona a opção "Esqueci minha senha".
3. O sistema solicita o endereço de e-mail associado à conta.
4. O paciente insere o endereço de e-mail e solicita a redefinição da senha.
5. O sistema envia um e-mail com um link de redefinição de senha.
6. O paciente acessa o link e define uma nova senha.
7. O sistema confirma a alteração da senha e redireciona o paciente para o painel do paciente.

## Fluxo Alternativo 6: Médico Indisponível

1. No passo 3 do fluxo principal, se o paciente selecionar uma especialidade, mas todos os médicos dessa especialidade estiverem temporariamente indisponíveis, o sistema notifica o paciente e sugere que ele tente outra especialidade ou aguarde.

## Fluxo Alternativo 7: Erro Técnico Durante Agendamento

1. Durante qualquer ponto do fluxo principal, se ocorrer um erro técnico (como uma falha no servidor), o sistema exibe uma mensagem de erro ao paciente, pedindo para tentar novamente mais tarde.
2. O paciente pode recarregar a página ou retornar à página inicial.
