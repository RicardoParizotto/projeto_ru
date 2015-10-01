UNIVERSIDADE FEDERAL DA FRONTEIRA SUL

Sistema que permite avaliação do serviço do RU e exibe estatísticas sobre os dados coletados pelo usuário.

Implementação no projeto:

	
	*Definição dos requisitos funcionais e não-funcionais;
	*Diagrama de casos de uso
	*Diagrama de classe;
	*Diagrama de sequência;
	*Diagrama de comunicação;
	*Diagrama de máquinas de estados;
	*Diagrama de atividades;
	*Diagrama de pacotes;
	*Diagrama de tempo;
	*Diagrama de implantação;

	*Modelagem do banco de dados;
	*Criação do banco de dados;
	*Criação dos layout do sistema;
	*Tela de apresentação dos cardápios;
	*Avaliação dos cardápios;
	*Formulários de inserção de cardápios;
	*Inserção de registros(cardápios) no banco de dados; 
	*Funções de estatísticas;
	
Detalhes:

	No sistema para avaliação de cardápios, já foi definido a estrutura do banco de dados, nele há tabelas que armazenam as informações
	sobre o cardápio(nome,descrição e ilustração), administrador(responsável pela manutenção dos registros no sistema) e por fim a 
	avaliação e comentários para algum cardápio específico.
	
	O layout do sistema já está definido, foram utilizados alguns componentes que permitem buscar no banco de dados os cardápios, e apresentá-los
    no menu inicial, de forma que o usuário possa visualizar e avaliar os cardápios, assim como fazer comentários.

	O formulário de inserção de um novo cardápio está implementado parcialmente, isto é, a inserção de dados no formulário é permitida, porém ainda
	é validada via javascript; esta verificação ocorre apenas com o PHP ao enviar o cadastro para o servidor. Deste modo, se os registros forem válidos,
	o mesmo é inserido no banco de dados. As imagens são armazenadas dentro da estrutura referenciada pelo banco de dados, ou seja, em uma pasta física 
    no disco. Além deste controle, também será implementado a parte de atualização e exclusão de registros, deste modo, será possível gerenciar
	um cardápio caso houverem erros de digitação, ou ainda se desejar removê-lo da base de dados.

	O sistema irá dispor de funcionalidades referentes a estatísticas dos cardápios, ou seja, a aceitação e a rejeição baseada na avaliação dos usuários.
	
	Inicialmente o sistema iria permitir ao usuário fazer um cadastro, mas foi decidido que esta parte não fará mais parte do projeto.
	

