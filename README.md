# PIRequerimentos
Repositório para produção do Projeto Integrador: Requerimentos.

O objetivo do projeto é automatizar o sistema de requerimentos feitos até o presente momento de maneira impressa e manual, o sistema consiste em uma interface para os estudantes realizarem o autocadastro onde os seus dados serão inseridos no banco de dados, e após isso possam fazer seus requerimentos de justificativa de falta e segunda chamada pelo sistema informatizado, existe ainda uma interface para os coordenadores de curso que poderão acessar os requerimentos e deferir ou indeferir, alertando os envolvidos no processo e, por fim, existe ainda a interface destinada à CORES que vai confirmar o recebimento do atestado físico para justificar o requerimento.

Apresentada a proposta, vamos ao desenvolvimento do sistema. O fluxo dos requerimentos se dará da seguinte maneira:

Aluno solicita requerimento e entrega atestado presencialmente -> CORES confirma recebimento do atestado -> Coordenador analisa requerimento podendo deferir/indeferir -> Após decisão final, processo fica concluído

![fluxo_requerimentos](https://github.com/Felpopolho/PIRequerimentos/assets/135850880/f76a97b1-8f78-40d0-bec3-262cbf9d810d)

Primeiramente, criamos o banco de dados, planejando os processos e relacionamentos que acontecerão no sistema em produção. Com o banco criado pelo workbench e funcional, podemos implementar o código em php que vai manipular o banco e fazer possíveis alterações menores por meio do PHPMyAdmin.

O arquivo sql do banco está disponível no repositório e para fazer funcionar basta executar o script no terminal, dentro do mysql. Seguindo o caminho:

cd\ > cd mysql > cd bin > mysql -u root -p

Lembrando que a senha deve ficar vazia, só "dar enter" ;).

O desenvolvimento do projeto acontece seguindo o fluxo dos requerimentos, portanto começamos construindo o sistema de login e cadastro dos usuários, para existir um administrador do sistema que tem a responsabilidade de cadastrar novos coordenadores de curso, fizemos um breve cadastro quando se inicia o sistema pela primeira vez, uma chave de ignição, onde o administrador de sistema será cadastrado e poderá usar as credenciais escolhidas para acessar futuramente sua interface para cadastrar novos coordenadores.

Em seguida, foi desenvolvida a página de login, possibilitando que seja feito o login tando dos coordenadores, da CORES, dos estudantes e do administrador de sistema pelo mesmo formulário utilizando um switch case, uma vez que os identificadores de cada tipo de usuário tem tamanhos diferentes.

  Coordenadores/CORES: int(7) / 
  Alunos: int(12) / 
  Administrador de sistema: int(5) / 

Com a página de login funcionando e os usuários sendo direcionados para seus respectivos endereços quando feita a verificação de suas credenciais, é hora de criar a página de cadastro, esta serve unicamente para os estudantes, uma vez que o administrador de sistema é o responsável por cadastrar novos coordenadores. Para isso foi criado um simples formulário que solicita do aluno todos os dados necessários e salva os dados no banco de dados (sempre validando possíveis erros na inserção de dados), assim, este estudante recém cadastrado já pode fazer login no sistema.
