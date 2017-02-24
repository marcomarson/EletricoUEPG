<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://portal.uepg.br/favicon.ico"/>
    <title>Controle de Lâmpadas - UEPG</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="{{ URL::asset('css/sb-admin.css') }}" rel="stylesheet">
</head>
<body id="app-layout">

  Estudos dirigidos da matéria de LFC
  Alunos: Diego Rafael Chiquito, Gianfranco Gobbo, Marcos Marson, Rogerio Junio Leachenski
<br>
  Estudo 1:
  <br>
  <br>
  1)

  Σ = {M,D,C,L,X,V,I}
  S → ABEV
  A→ M/MM/MMM/ɛ
  B →  CM/CD/(D/ɛ) ( ɛ /C/CC/CCC)
  E →  (XC/XL/(L/ ɛ) ( ɛ / X/XX/XXX)
  V →  IX/IV/(V/ ɛ) ( ɛ/I/II/III)

<br>
<br>
  2)
  Os problemas encontrados é que permite construir mais de uma árvore de derivação para uma mesma sentença. Isto representa um problema para o analisador sintático, pois ela não especifica com precisão a estrutura sintática de um programa. Este problema pode ser comparado aos dos autômatos não determinísticos, onde dois caminhos podem aceitar a mesma cadeia.

  DERIVAÇÕES:
  1 - Seja a gramática:
  C -> if b then C else C
  C -> if b then C
  C -> s
  Ela é ambígua desde que a cadeia:
     If b then if b then s else s
  Pode ser interpretada como
  (i) If b then (if b then s else s) Ou (ii) If b then (if b then s) else s
  A primeira é a preferida em LPs, pois utilizam a regra informal “case o else com o if mais próximo” que remove a ambiguidade.
  Podemos reescrever a gramática acima com 2 não-terminais C1 e C2:
  C1 -> if b then C1 | if b then C2 else C1 | s
  C2 -> if b then C2 else C2 | s
  O fato que somente C2 precede o else, garante que entre para then-else gerado por qualquer uma das produções deve aparecer ou um s ou outro else. Assim, (ii) nunca ocorre.
  (ii) If b then (if b then s) else s

  Definição do significado de ambiguidade:
  Seja G1 = ({E,T,F,U},(0,1,2,...,9},P,E)
  P = { E -> E + T | T
  T -> T * F | F
  F -> U | (E)
  U -> 0 | 1 | ... | 9}
  uma gramática para expressões aritméticas para inteiros de 0..9. Por que as LP não usam a gramática G2:
  P = { E -> E + E | E * E | (E) | F
  F -> 0 | 1 | ...| 9}
  que contém um menor número de símbolos e produções? A razão é que G2 é ambígua e G1 não é. Além de que em G2 + e * tem a mesma prioridade de resolução enquanto que na matemática eles não tem. Dada a expressão 2 + 3 * 5, ela é interpretada como?
  (2 + (3 * 5)) = 17 Ou ((2 + 3) * 5) = 25
  <br>
  <br>
  3)
          	É possível converter algumas gramáticas ambíguas em não ambíguas, porém não há um procedimento geral para fazer isso, assim como não existe um algoritmo para detecção de gramática ambíguas. Compiladores como o YACC incluem recursos para tornar não ambíguas alguns tipos de ambiguidade, por exemplo, usando as restrições de precedência e de associatividade.

  Ref: Parikh, Rohit. (January 1961). Language-generating devices Quarterly Progress Report, Research Laboratory of Electronics, MIT
  <br>
  <br>
  4)
          	Estas são três abordagens para a conversão de um programa escrito em linguagem de alto nível para a linguagem de máquina, para que este programa possa ser executado pelo computador.
          	Chamamos de INTERPRETADOR o programa conversor que faz a conversão de uma instrução e execução por vez, verificando se esta está escrita de forma correta, traduzindo-a para linguagem de máquina e em seguida executada pelo computador. Apenas uma instrução permanece na memória. Ou seja, a cada nova instrução convertida, se perde a anterior. Portanto, esta conversão deve ser feita em cada execução do programa.

          	Chamamos de COMPILADOR o programa conversor que primeiramente faz a conversão de todo o código de alto nível para a posterior execução. Ou seja, para cada instrução é verificado se esta encontra-se escrita corretamente e caso realmente esteja, ela é convertida e agora, diferente do que ocorre nos interpretadores, a instrução convertida não será executada, ela será armazenada na memória e se repete a mesma etapa para a próxima instrução até que o código chegue ao seu fim. Com todo o código já convertido sem erros, finalmente começa a execução pelo computador. Caso não exista nenhuma alteração no programa-fonte, não será necessária uma nova conversão para execuções posteriores, visto que o programa já convertido é armazenado na memória.

          	Chamamos de TRADUTOR, o programa que em vez de armazenar as instruções do programa-fonte como lhe é fornecido, traduz estas para um código intermediário que não exige tanto espaço na memória, e em seguida, este código intermediário é trabalhado por interpretadores.

  fonte: http://www.inf.ufsc.br/~j.barreto/cca/arquitet/arq4.htm
  <br>
  <br>
  5)
          	 Código fonte são as linhas de programação que formam um software em sua forma original. Inicialmente, um programador "escreve" o programa em uma certa linguagem —como C++ ou Visual Basic.
  Código objeto é a transformação do código fonte, através de um compilador, para uma linguagem que o computador "entende".
  Códigos intermediários são os códigos gerados pelos tradutores. Como os códigos compilados podem exigir muito espaço em memória, os códigos fonte são transformados em códigos intermediários para que estes possam ser trabalhados, em seguida, por interpretadores.

  fonte: http://www.inf.ufsc.br/~j.barreto/cca/arquitet/arq4.htm
  http://images.slideplayer.com.br/8/2262919/slides/slide_20.jpg
  <br>
  <br>
  6)
          	Fases do Compilador: A primeira fase de compilação é a análise léxica, é a fase em que o compilador analisa o código fonte caractere a caractere, buscando a separação e identificação dos elementos do código fonte, denominados símbolos léxicos ou tokens. É nessa fase também que o algoritmo é “limpo” de espaços em branco, labels e outros itens que não tenham nenhuma necessidade para a linguagem de máquina.
          	A segunda fase é a análise sintática. É nessa fase em que é analisada a cadeia léxica com o objetivo de se interpretar o seu programa, realizando instruções válidas. É o cerne do compilador. Daí então vem a análise semântica, essa fase determina como a lógica do código é descrita, visando em definir se suas estruturas podem, ou não ser construídas, levando em consideração escopo, visibilidade, consistência de tipo e outras particularidades de um programa.
          	Aí então vem a geração de código intermediário. É onde é dado início a árvore sintática, em uma representação intermediária do código fonte, essa linguagem é mais próxima à linguagem de objeto do que o código fonte. Um exemplo de linguagem intermediária é o código de 3 endereços (ex. A=2+2).
          	A fase a seguir é Otimização do código, é a fase em que é analisada toda a árvore sintática em busca de possíveis otimizações no código, tal como declarações não utilizadas, operações repetidas, ou até mesmo uma ordem de execução ruim para a pipeline é alterada, entre outras possíveis otimizações. A última fase é a geração do código final, que é fase em que o código otimizado é compilado, levando em consideração todas as otimizações realizadas. Nem todas as otimizações são independentes de processador e sua arquitetura, mas podem ser até duas ou 3 vezes mais eficiente que o código não otimizado.

            <br>
            <br>

  7)
          	Também chamado de preprocessor (pré-processador), é um programa que lê o arquivo de código-fonte e o altera de modo a prepará-lo para a compilação.

  Ref: http://o-que-significa.blogspot.com.br/2009/07/pre-compilador.html#.WBc8rOArLDc
  <br>
  <br>

  8)
          	Quando compilamos um código, transformamos este de uma linguagem de alto nível para linguagem de máquina. Esta linguagem de máquina é então lida pelo sistema operacional para a execução da aplicação. O problema é que cada sistema operacional possui uma configuração e compreende uma linguagem de máquina diferente. Isso faz com que uma aplicação deva ser escrita e compilada para cada plataforma na qual será executada. Uma solução para este problema é escrever uma aplicação voltada para uma máquina virtual. Assim, a máquina virtual sempre entenderá os códigos escritos para ela sendo que ela, por sua vez, estará adaptada ao sistema hospedeiro para poder executar a aplicação.

            <br>
            <br>

  9)
  1.Notação de Backus-Nuar
          	BNF (Backus Normal Form) ou Formalismo de Backus-Naur é uma meta-sintaxe utilizada para expressar gramáticas livres de contexto, sendo ela a notação mais usual para descrever gramáticas de linguagens de programação.
          	Para especificar uma BNF faz-se um conjunto de regras de derivação, escritas por:
  <símbolo> ::= _expressão_
          	Sendo o <símbolo> um não terminal e _expressão_ um conjunto de símbolos e/ou sequências separadas pela barra vertical, “|”, indicando uma escolha entre uma expressão ou outra.
          	Como exemplo, segue abaixo uma gramática para formação de expressões aritméticas simples:
  <expressão> ::= <valor>|<valor><operador><expressão>
  <valor> ::= <número>|<sinal><número>
  <número> ::= <semsinal>|<semsinal>.<semsinal>
  <semsinal> ::= <dígito>|<dígito><semsinal>
  <dígito> ::= 0|1|2|3|4|5|6|7|8|9
  <sinal> ::= +|-
  <operador> ::= +|-|/|*
          	Onde:
          	A expressão aritmética é data por <expressão>
  <expressão> é formada por um <valor> OU um <valor> seguido de um <operador> seguido por uma <expressão> (deste modo ilustra-se o uso da recursão em BNFs)
  <valor>, por sua vez, consiste em um <número> OU em um <sinal> seguido de um <número>
  <número> é composto por <semsinal> OU <semsinal> seguido de “.” seguido de <semsinal>
  <semsinal> consiste em um <dígito> OU um <dígito> seguido de <semsinal> (mais uma vez utiliza-se recursão)
  <dígito> pode ser 0, 1, 2, 3, 4, 5, 6, 7, 8 ou 9.
  <sinal> representa “+” ou “-“
  <operador>, por fim, será “+”, “-“, “/” ou “*”
  http://www.garshol.priv.no/download/text/bnf.html#id1.2.
  http://wiki.icmc.usp.br/images/2/21/Gramatica_4.pdf
  http://pt.wikipedia.org/wiki/Formalismo_de_Backus-Naur

  2. Grafo Sintático
          	O gráfico sintático pode representar todas as possíveis árvores de análise de forma eficaz em uma forma compacta para processamento adicional. Uma vez que todos os pontos sintaticamente ambíguos em um gráfico sintático, podemos facilmente nos concentrar nesses pontos para mais desambiguação.

  SEO J., SIMMONS R. F.,SYNTACTIC GRAPHS: A REPRESENTATION FOR AMBIGUOUS PARSE TREES THE UNION OF ALL. Disponível em <http://www.aclweb.org/anthology/J89-1002>.

  3. EBNF
          	É uma extensão a BNF (Extended-BNF) e foi desenvolvida para ampliar a facilidade de leitura e concisão entre as produções.
          	O símbolo  + define uma sequência de um ou mais elementos da classe marcada.
          	O símbolo  * define uma sequência de zero ou mais elementos da classe marcada.
          	Chaves “{” “}” podem ser usadas para agrupar elementos e colchetes “[” “]” podem ser usados para indicar elementos opcionais.
          	É importante saber que toda linguagem definida em uma EBNF pode ser transformada para as regras da BNF sem perder a suas características e respeitando a gramática.
            <br>
            <br>
  10)
  JAVA
  Modula 2

  C
  statement::=labeled_statement | compound_statement | expression_statement | selection_statement | iteration_statement | jump_statement
  http://www.csci.csusb.edu/dick/samples/c.syntax.html#Statements
  http://cui.unige.ch/db-research/Enseignement/analyseinfo
  <br>
  <br>
  11)
  JAVA

  LAÇOS
  CONDIÇÕES
  MODULA 2

  LAÇOS
  CONDIÇÕES
  C
  LAÇOS
  loop::=iteration_statement.
  iteration_statement::="while" "("expression")" statement | "do" statement "while" "("expression")" ";" | for_statement.
  for_statement::="for" "("expression ";" expression ";" expression")" statement,

  CONDIÇÕES

  conditional_expression::=logical_OR_expression | logical_OR_expression "?" expression ":" conditional_expression,

  http://www.csci.csusb.edu/dick/samples/c.syntax.html#Statements
  http://cui.unige.ch/db-research/Enseignement/analyseinfo
  <br>
  <br>
  12)

          	Na analise lexica se destacmr três atividades como fundamentais:

  •      	Extração e classificação dos tokens;
  •      	Eliminação de delimitadores e comentários;
  •      	Recuperação de Erros.

  Token
          	O objetivo principal da análise léxica é identificar sequências de caracteres que constituem unidades léxicas ("tokens"). O analisador léxico lê, caractere a caractere, o texto fonte, verificando se os caracteres lidos pertencem ao alfabeto da linguagem, identificando tokens, e desprezando comentários e brancos desnecessários.
          	Os tokens constituem classes de símbolos tais como palavras reservadas, delimitadores, identificadores, etc., e podem ser representados, internamente, através do próprio símbolo (como no caso dos delimitadores e das palavras reservadas) ou por um par ordenado, no qual o primeiro elemento indica a classe do símbolo, e o segundo, um índice para uma área onde o próprio símbolo foi armazenado (por exemplo, um identificador e sua entrada numa tabela de identifidadores).
  Além da identificação de tokens, o Analisador Léxico, em geral, inicia a construção da Tabela de Símbolos e envia mensagens de erro caso identifique unidades léxicas não aceitas pela linguagem em questão. A saída do Analisador Léxico é uma cadeia de tokens que é passada para a próxima fase, a Análise Sintática. Em geral, o Analisador Léxico é implementado como uma subrotina que funciona sob o comando do Analisador Sintático.
          	O analisador léxico tem a função de ler uma sequência de caracteres que constitui um programa-fonte e coleta, dessa sequência, os tokens que constituem esse programa.
          	Os tokens (símbolos léxicos) são unidades básicas de texto do programa. Eles são representados internamente por três informações: classe do token, valor do token e posição do token.
          	Classe do token – representa o tipo do token conhecido.
          	Valor do token – dependente da classe; podem ser divididos em dois grupos: tokens simples e tokens com argumento.
          	Posição do token – indica o local do texto fonte (linha e coluna) onde ocorreu o token.
  Tokens simples – não tem um valor associado, por exemplo como as palavras reservadas.
  Tokens com argumento – possuem um valor associado, por exemplo como os identificadores e as constantes.
          	As classes para palavras reservadas constituem-se em abreviações dessas, não sendo necessário passar seus valores para o analisador sintático.

          	Lexema: sequência de caracteres no programa-fonte que associa um padrão a um token e é uma instância do token.

  Referenica:https://pt.wikibooks.org/wiki/Constru%C3%A7%C3%A3o_de_compiladores/An%C3%A1lise_l%C3%A9xica
  http://www.facom.ufms.br/~ricardo/Courses/CompilerI/Lectures/Lec02.pdf
  <br>
  <br>
  13)
          	Um compilador foi construído para identificar e atribuir significado computacional a certas sequências de caracteres. Essas sequências contínuas correspondem a dois tipos de termos, as palavras reservadas da própria linguagem e os identificadores. As palavras reservadas são usadas para: As instruções ao pré-compilador, os tipos das variáveis usadas, os comandos básicos da linguagem estruturada, os delimitadores de comandos, linhas e procedimentos, e operadores da linguagem.

  Ref: http://www.unicamp.br/fea/ortega/info/aula0306.htm
  <br>
  <br>
  14)
          	Um algoritmo gerador de código, gera o código fonte de um analisador sintático, interpretador ou compilador de uma linguagem de programação. Na maioria dos casos ele é alimentado com a descrição sintática e semântica da linguagem independente de arquitetura, junto com uma descrição do conjunto de instruções da arquitetura independente de linguagem de programação.

  Ref: https://pt.wikipedia.org/wiki/Compilador_de_compilador
  <br>
  <br>
  15) O Coco é um compilador de compiladores, ou seja, predefine-se a sua linguagem e então o seu interpretador é gerado. Em suas funcionalidades, se inclui um Scanner, que é capaz de ler os arquivos de texto com todos os símbolos e blocos, bem como um parser, que é capaz de, com o arquivo de entrada sendo o Scanner, interpreta e analisa, achando todos os símbolos e definições de linguagem.

  <br>
  <br>
  16)Também chamado de scanner, esta parte do compilador quebra o código-fonte em símbolos significativos que o analisador pode trabalhar. Normalmente, o scanner retorna um tipo enumerado que representa o símbolo apenas digitalizado. A digitalização é o aspecto mais fácil e mais bem definido da compilação. As responsabilidades adicionais do scanner incluem a remoção de comentários, a identificação de palavras-chave e a conversão de números para formulário interno. As diretivas são os Character sets, que serve para o usuário declarar conjuntos de caracteres como números e digitos Tokens que são os símbolos reservados como while, Pragmas que são tokens que pode ocorrer em qualquer lugar na entrada do arquivo Comentarios, White Space e Case Sensitive, As palavras reservadas são identificadas pelo Scanner.
  <br>
  <br>
  17)
          	O tratamento de erros está voltado a falhas devido a muitas causas: erros no compilador, erros na elaboração do programa a ser compilado, erros no ambiente (hardware, sistema operacional), dados incorretos, etc. As tarefas relacionadas ao tratamento de erros consistem em detectar cada erro, reportá-lo ao usuário e possivelmente fazer algum reparo para que o processamento possa continuar.
          	Os erros podem ser classificados em erros léxicos, erros sintáticos, erros não independentes de contexto (semânticos), erros de execução e erros de limite.Os erros léxicos ocorrem quando um token identificado não pertence a gramática da linguagem fonte. Os erros sintáticos ocorrem quando alguma estrutura de frase não está de acordo com a gramática, como, por exemplo, parênteses sem correspondência. Os erros não independentes de contexto em geral são associados a não declaração de objetos como variáveis e erros de tipos. Os erros de execução ocorrem após a compilação, quando o programa já está sendo executado. Um exemplo típico é o da divisão por zero. Os erros de limite, ocorrem durante a execução e estão relacionados as características da máquina na qual o programa está sendo executado, como por exemplo, estouro de pilha.
          	Alguns compiladores encerram o processo de tradução logo ao encontrar o primeiro erro do programa-fonte. Esta é uma política de fácil implementação. Compiladores mais sofisticados, porém, detectam o maior número possível de erros visando diminuir o número de compilações

  fonte: wikipedia
  <br>
  <br>
  18)
          	Uma gramática é dita recursiva à esquerda se ela tiver um não-terminal A tal que A =>A para alguma cadeia w.
          	Método de Parsing TOP-DOWN não manipulam gramáticas recursivas à esquerda.
            <br>
            <br>
  19)
          	Para eliminar a recursão à esquerda, inserimos um novo não-terminal (E') e construímos recursão a direita:

  Gramatica:                                                 	Ajustando e eliminando a recursão à esquerda:
  E → (L) | a                                                 	E´ → E
  L → L , E | E                                             	E → (L) | a
                                                                     	L → E L´
                                                                     	L´ → , E L´ | Ɛ
  Referencia: Eliminação de Recursão à Esquerda e Fatoração à Esquerda - Profa. Tiemi Christine Sakata - FACENS - Faculdade de Engenharia de Sorocaba
  <br>
  <br>
  20)
  https://drive.google.com/open?id=0B8HrdpA-B9QSSHIyeWRNYXNScVU

  <br>
  <br>
  21)
          	 É um método de análise top-down, onde a ideia é aplicar recursão ao procedimento, usando pilhas, um buffer de entrada, com um fluxo de saída. A tabela preditiva em si, serve como um “gabarito” para o parser, indicando os acertos e os carros caso existam, conforme a sequência de entrada. Assim, tabela também indica se há uma ambiguidade. A tabela preditiva pode ser usada, além da verificação da gramática, para construir o AS. Para implementar o método de um não-terminal, podemos olhar a tabela e determinar para cada terminal válido quais são as sequências de ações a tomar, como, por exemplo, consumir um terminal ou invocar os métodos de outros não-terminais.

  Referencia: http://www.ssw.uni-linz.ac.at/Research/Projects/Coco/Doc/UserManual.pdf
  <br>
  <br>
  22)
          	Uma PRODUCTION  especifica a estrutura sintática de um símbolo não-terminal. Isso consiste de um lado esquerdo e um lado direito que são separados por um sinal igual. O lado esquerdo especifica o nome do não-terminal juntamente com seus atributos formais e as variáveis locais da PRODUCTION. O lado direito consiste de uma expressão EBNF que especifica a estrutura do não-terminal, assim como sua forma de atributos e ações semânticas.
          	As PRODUCTIONS podem ser dadas em qualquer ordem. Referências ainda não declaradas
  não-terminais são permitidos. Para cada não-terminal deve haver exatamente uma PRODUCTION. Em particular, deve haver uma PRODUCTION para o nome gramatical, que é o símbolo inicial da gramática.

  Referencia: http://www.ssw.uni-linz.ac.at/Research/Projects/Coco/Doc/UserManual.pdf
  <br>
  <br>
  23) A princípio a gramática lida pelo Coco/R deve ser LL(1), porém ela também consegue interpretar gramáticas que não são LL(1) utilizando os resolvers que faz a decisão de parsing baseado em um símbolo múltiplo ou em informações semânticas. O Coco/R checa a gramática para integridade, consistência, e não redundância, também reporta conflitos LL(1), em casos de conflitos temos os resolvers para ser utilizado Disponivel em: http://www.ssw.uni-linz.ac.at/Coco/Doc/UserManual.pdf
  <br>
  <br>
  26)
          	O papel de uma tabela de símbolos é passar informações de declarações para usos.Uma ação semântica entra com informações sobre o identificador x na tabela de símbolos, quando a declaração de x é analisada.
          	Uma ação semântica associada a uma produção como fator → id recupera a informação sobre o identificador da tabela de símbolos.

  Ref: https://erinaldosn.files.wordpress.com/2011/03/aula-5-tabelas-de-sc3admbolos.pdf
  <br>
  <br>
  28)
  COMPILER S


  CHARACTERS
  letter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".
  digit = '0' .. '9'.


  TOKENS
  number = digit {digit}.
  ident = letter {letter | digit | '_'}.


  PRODUCTIONS


  S = E.
  E = T  F .
  F = {"+" E| "*" E}.
  T = "a" | "b" | "c" | "(" E ")".


  END S.

  **********************
  Segue um exemplo de conteúdo em um arquivo de entrada.

  a + b * c + ( a ) + b

  <br>
  <br>
  29)
  A Hierarquia de Chomsky deﬁne quatro classes distintas de linguagens, denominadas tipos 0, 1, 2 e 3, as quais são geradas por gramáticas particularizadas em relação ao caso geral anteriormente apresentado, por intermédio de restrições que são aplicadas ao formato das produções α → β.
  Dá-se o nome de gramática linear à direita àquela cujas produções obedeçam todas às seguintes condições:
  •      	α ∈N
  •      	 β ∈Σ,β ∈N,β ∈ ΣN, ou β = ǫ, de forma não exclusiva.
  Gramática linear à esquerda é aquela em que todas as produções exibem as seguintes características:
  •      	α ∈N
  •      	β ∈Σ,β ∈N,β ∈NΣ, ou β = ǫ, de forma não exclusiva.
  Gramáticas lineares, à esquerda ou à direita, também conhecidas como gramáticas do tipo 3, geram linguagens denominadas regulares, ou simplesmente do tipo 3. As linguagens regulares constituem a classe de linguagens mais simples dentro da Hierarquia de Chomsky, a qual prossegue com linguagens de complexidade crescente até as linguagens mais gerais, do tipo 0.
  Uma gramática é dita livre de contexto, ou do tipo 2, se as suas produções possuírem apenas um símbolo não-terminal em seu lado esquerdo, e uma combinação qualquer de símbolos terminais e não-terminais no lado direito. Gramáticas desse tipo geram linguagens denominadas livres de contexto, ou do tipo 2. Formalmente:
  •      	α ∈N
  •      	β ∈V ∗
  As gramáticas do tipo 1, também conhecidas como sensíveis ao contexto, constituem a classe seguinte de gramáticas, na Hierarquia de Chomsky. A caracterização das gramáticas sensíveis ao contexto decorre da restrição, imposta ao formato das produções, de que o comprimento da cadeia do lado direito de cada produção seja no mínimo igual ao comprimento da cadeia do lado esquerdo, não havendo, portanto, possibilidade de redução do comprimento das formas sentenciais quando da realização de derivações em gramáticas deste tipo:
  •      	α ∈V ∗NV ∗
  •      	β ∈V ∗
  •      	|β|≥|α|
  As gramáticas pertencentes à última classe deﬁnida pela Hierarquia de Chomsky recebem a denominação de irrestritas, ou do tipo 0. Como o próprio nome sugere, trata se de gramáticas sobre as quais não é imposta nenhuma restrição quanto ao formato de suas produções, exceto pelo fato de que o lado esquerdo das mesmas deve sempre conter pelo menos um símbolo não-terminal:
  •      	α ∈V ∗NV ∗;
  •      	β ∈V ∗;
  •      	Não se exige a validade de qualquer relação restritiva entre |β| e |α|.

  <br>
  <br><br>
  <br><br>
  <br>
  Estudo 2:
  4) //Número
  CHARACTERS
    Digit = '0' .. '9'.
    Zero = '0'.
    NonZeroDigit = '1' .. '9'.

  TOKENS
    Number = Zero | (NonZeroDigit {Digit}).

  OU

  CHARACTERS
    Digit = '0' .. '9'.

  TOKENS
    Number = Digit {Digit}.

  //Ponto flutuante
  float = digit {digit} '.' digit {digit} ['E' ['+' | '-'] digit {digit}].

  //Identificador
  CHARACTERS
    Letter = 'A' .. 'Z' + 'a' .. 'z'.
    Digit = '0' .. '9'.
  TOKENS
    Ident = Letter {Letter | Digit}.

  //Reservado
  TOKENS
    Any = "ANY".
    Context = "CONTEXT".
    Ignore = "IGNORE".
    Pragmas = "PRAGMAS".
    Tokens = "TOKENS".
    Character = "CHARACTERS".
    End = "END".
    Ignorecase = "IGNORECASE".
    Productions = "PRODUCTIONS".
    Weak = "WEAK".
    Comments = "COMMENTS".
    From = "FROM".
    Nested = "NESTED".
    Sync = "SYNC".
    Compiler = "COMPILER".
    If = "IF".
    Out = "out".
    To = "TO".

  @Test
  public void testScan_token_Number_123() throws UnsupportedEncodingException {
      System.out.println("testScan_token_Number_123");
      // Initialize
      String sContent = "123";
      InputStream is = new ByteArrayInputStream(sContent.getBytes("UTF-8"));
      Scanner instance = new Scanner(is);
      Token expected = new Token();
      expected.kind = Parser._Number;
      expected.val = sContent;
      // Test
      Token result = instance.Scan();
      // Validate
      assertNotNull( result );
      assertEquals( expected.kind, result.kind );
      assertNotNull( result.val );
      assertEquals( expected.val, result.val );
  }

  @Test
  public void testScan_token_Any() throws UnsupportedEncodingException {
      System.out.println("testScan_token_Any");
      // Initialize
      String sContent = "ANY";
      InputStream is = new ByteArrayInputStream(sContent.getBytes("UTF-8"));
      Scanner instance = new Scanner(is);
      Token expected = new Token();
      expected.kind = Parser._Any;
      // Test
      Token result = instance.Scan();
      // Validate
      assertNotNull( result );
      assertEquals( expected.kind, result.kind );
      assertNotNull( result.val );
      assertEquals( sContent, result.val );
  }

  @Test
  public void testScan_token_Ident_x() throws UnsupportedEncodingException {
      System.out.println("testScan_token_Ident_x");
      // Initialize
      String sContent = "x";
      InputStream is = new ByteArrayInputStream(sContent.getBytes("UTF-8"));
      Scanner instance = new Scanner(is);
      Token expected = new Token();
      expected.kind = Parser._Ident;
      expected.val = sContent;
      // Test
      Token result = instance.Scan();
      // Validate
      assertNotNull( result );
      assertEquals( expected.kind, result.kind );
      assertNotNull( result.val );
      assertEquals( expected.val, result.val );
  }
  <br>
  <br>
  5) Conta com as seguintes funcionalidades:
  -Characters;
  -Sets;
  -Tokens;
  -Pragmas;
  -Comments;
  -White space;
  -Case sensitive.
  <br>
  <br>
  8) Análise sintática (também conhecido pelo termo em inglês parsing) é o processo de analisar uma sequência de entrada (lida de um arquivo de computador ou do teclado, por exemplo) para determinar sua estrutura gramatical segundo uma determinada gramática formal. Essa análise faz parte de um compilador, junto com a análise léxica e análise semântica. A análise sintática, ou análise gramatical é o processo de se determinar se uma cadeia de símbolos léxicos pode ser gerada por uma gramática.
  A análise sintática transforma um texto na entrada em uma estrutura de dados, em geral uma árvore, o que é conveniente para processamento posterior e captura a hierarquia implícita desta entrada. Através da análise léxica é obtido um grupo de tokens, para que o analisador sintático use um conjunto de regras para construir uma árvore sintática da estrutura.
  Analisadores sintáticos são determinísticos se sempre souberem que ação tomar independentemente da entrada de texto. Este comportamento é desejado e esperado na compilação de uma linguagem de programação. No campo de processamento de linguagem natural, pensava-se que essa a análise sintática determinística era impossível devido à ambiguidade inerente das linguagens naturais, em que diversas sentenças possuem mais de uma possível interpretação. Entretanto, Mitch Marcus propôs em 1978 o analisador sintático Parsifal, que consegue lidar com ambiguidades ainda que mantendo o comportamento determinístico.

  Referência: https://pt.wikibooks.org/wiki/Constru%C3%A7%C3%A3o_de_compiladores/An%C3%A1lise_sint%C3%A1tica
  <br>
  <br>
  9)
  Análise semântica é a terceira fase da compilação onde se verificam os erros semânticos, (por exemplo, fazer a divisão de um número inteiro por outro numero float, na linguagem C padrão ANSI)) no código fonte e coletam-se as informações necessárias para a próxima fase da compilação, que é a geração de código objeto.
  A análise semântica trata a entrada sintática e transforma-a numa representação mais simples e mais adaptada a geração de código. Esta camada do compilador fica igualmente encarregada de analisar a utilização dos identificadores e de ligar cada uma delas a sua declaração. Nesta situação verifica-se que o programa respeita as regras de visibilidade e de porte dos identificadores. Nesta fase é também esperado que no processo da compilação verifique que cada expressão definida tenha um tipo adequado conforme as regras próprias da linguagem.
  O objetivo da análise semântica é trabalhar nesse nível de inter-relacionamento entre partes distintas do programa. As tarefas básicas desempenhadas durante a análise semântica incluem a verificação de tipos, a verificação do fluxo de controle e a verificação da unicidade da declaração de variáveis. Dependendo da linguagem de programação, outros tipos de verificações podem ser necessários.

  Referência: https://pt.wikipedia.org/wiki/An%C3%A1lise_sem%C3%A2ntica
  <br>
  <br>
  10)  Uma semantic action é uma parte do codigo escrito na linguagem do Coco/R, ela é executada pelo gerador de parser na posição onde foi especificada na gramatica. As emantic actios são simplesmente copiadas para o gerador de parser sem a vereficação do Coco/R. A semantic action também pode conter declarações de variaveis locais. Toda production tem seu próprio conjunto de variaveis locais, que são retidas em recursive productions.. A opção da semantic acion no lado esquerdo de uma production (LocalDecl) destina-se a essas declarações, mas variaveis também podem ser declaradas em qualquer outro semantic action.
  <br>
  <br>
  11) Geram um arquivo da tabela de símbolos em java.
  <br>
  <br>
  12)
  Tabela de símbolos é uma estrutura de dados, geralmente uma árvore ou tabela de hash, utilizada em compiladores para o armazenamento de informações de identificadores, tais como constantes, funções, variáveis e tipos de dados. É utilizada em quase todas as fases de compilação, como a varredura, a análise sintática, a análise semântica, otimização e geração de código. Em cada fase ela pode ser utilizada como base para comparações ou mesmo atualizada com novos identificadores durante a saída de cada fase.
  Um compilador usa uma tabela de símbolos para guardar informações sobre os nomes declarados em um programa. A tabela de símbolos é pesquisada cada vez que um nome é encontrado no programa fonte. Alterações são feitas na tabela de símbolos sempre que um novo nome ou nova informação sobre um nome já existente é obtida.
  A gerência da tabela de símbolos de um compilador deve ser implementada de forma a permitir inserções e consultas da forma mais eficiente possível, além de permitir o crescimento dinâmico da mesma.
  Com isso é possível concluir que a tabela de símbolos serve como um banco de dados para o processo de compilação. Seu principal conteúdo são informações sobre tipos e atributos de cada nome definido pelo usuário no programa. Essas informações são colocadas na tabela de símbolos pelos analisadores léxicos e sintáticos e usadas pelo analisador semântico e pelo gerador de código.

  Referência: https://pt.wikipedia.org/wiki/Tabela_de_s%C3%ADmbolos
  <br>
  <br>
  13)
  A linguagem utilizada para a geração de um código em formato intermediário entre a linguagem de alto nível e a linguagem assembly deve representar, de forma independente do processador para o qual o programa será gerado, todas as expressões do programa original. Duas formas usuais para esse tipo de representação são a notação posfixa e o código de três endereços.

  Tipos de códigos intermediários:
  •	HIR – High Intermediate Representation
  •	Usada nos primeiros estágios do compilador
  •	Simplificação de construções gramaticais para somente o essencial para otimização/geração de código
  •	MIR – Medium Intermediate Representation
  •	Boa base para geração de código eficiente
  •	Pode expressar todas características de linguagens de programação de forma independente da linguagem
  •	Representação de variáveis, temporários, registradores
  •	LIR – Low Intermediate Representation
  •	Quase 1-1 para linguagem de máquina
  •	Dependente da arquitetura

  Referência: https://pt.wikibooks.org/wiki/Constru%C3%A7%C3%A3o_de_compiladores/Gera%C3%A7%C3%A3o_de_c%C3%B3digo_intermedi%C3%A1riohttps://pt.wikibooks.org/wiki/Constru%C3%A7%C3%A3o_de_compiladores/Gera%C3%A7%C3%A3o_de_c%C3%B3digo_intermedi%C3%A1rio
  <br>
  <br>
  14) Representada através de HIR (High Intermediate Representation). Esse tipo de representação intermediária é usada nos primeiros estágios do compilador e permite a simplificação de construções gramaticais, de forma que permita a otimização e geração do código. As formas de representar esse tipo de código intermediário é através de árvore e grafo de sintaxe, notações pós-fixada e pré-fixada e também, por meio de representações linearizadas.

  <br>
  <br><br>
  <br><br>
  <br>
  Estudo 3: não 7)b), 8, 9, 11, 13, 14
  <br>
  <br>
  1) Uma diretiva Action é um trecho de código escrito na linguagem alvo do Coco/R, por
  exemplo C#, Java ou C++, esse trecho de código é executado pelo analisador gerado na posição onde foi especificado na gramática.
  Uma diretiva Action pode possuir declarações de variáveis locais. Cada produção tem seu conjunto de variáveis locais, que estão retidas em produções recursivas.
  <br>
  <br>
  3) Os atributos de entrada são usados para passar valores para a produção de um nonterminal e os atributos de saída são usados para retornar valores da produção de um nonterminal para o processo que o chamou. Os atributos podem ser classificados como formais, que são especificados na declaração dos nonterminals à esquerda da produção.
  <br>
  <br>
  4) Conflitos LL(1) são aqueles conflitos analisáveis da esquerda para a direita com derivações canônicas à esquerda e 1 símbolo lookahead

  Exemplo 1:

  Exemplo 2:



  Exemplo 3:

  O conflito mostrado no exemplo 1 pode ser resolvido por fatorização, para isso extrai-se a parte comum dos elementos e então a move para p inicio, resultando em:

  O conflito do exemplo 2 pode ser resolvido pela seguinte produção:

  <br>
  <br>
  6)  Attributes in Java. Since Java does not support output parameters, the Java version
  of Coco/R allows only a single output attribute which is passed to the caller as a
  return value. However, the return value can be an object of a class that contains
  multiple values.
  If a nonterminal has an output attribute it must be the first attribute. It is denoted by
  the keyword out both in its declaration and in its use. The following example shows a
  nonterminal S with an output attribute x and two input attributes y and z (for
  compatibility with older versions of Coco/R the symbol '^' can be substituted for the
  keyword out ):
  S<out int x, char y, int z> = ... .
  This nonterminal is used as follows:
  ... S<out a, 'b', c+3> ...
  The production of the nonterminal T is translated to the following parsing method:
  int S(char y, int z) {
  int x;
  ...
  return x;
  }
  manual pagina 13

  7) import java.util.*;

  COMPILER TinyCode

  class IntVar {                       // variavel inteira
     public int lBound, uBound, iValue;
     public IntVar(int lb, ub, v) {
        lBound = lb;
        uBound = ub;
        iValue = v;
     }
  }
  class BoolVar {           // variavel logica
     public boolean bValue;
     public IntVar(v) {
        bValue = v;
     }

  //tabela de variaveis logicas
  Dictionary lbooleans = new HashTable();
  //tabela de variaveis inteiras
  Dictionary lints = new HashTable();
  //lista de comandos
  Vector lprogram = new Vector();
  //tabela de rotulos
  Dictionary llabels = new HashTable();
  int statementNo = 0; //contador do programa
  java.lang.String cmd ; //comando atual
  java.lang.String varName;  //variavel sendo processada
  java.lang.String progName; //programa sendo processado

  CHARACTERS
      letter = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".
      digit = "0123456789".

  TOKENS
      Identifier = letter {letter | digit}.
      Number = ['-'] digit {digit}.
      true = "true".
      false = "false".

  COMMENTS FROM "//" TO '\n'
  IGNORE '\r' + '\n' + '\t'

  PRODUCTIONS
      TinyCode = "program" Identifier (. progName = t.val; .)
                 "." ProgramBody.
      ProgramBody = ["var" DeclareVar { DeclareVar }] "begin" { Statement } "end." (. lprogram.add("end"); .) .
      DeclareVar = Identifier (. varName = t.val .)
                   ":" DeclareVarBody.
      DeclareVarBody = "integer"
                       "(" Number            (. int lbound = (Integer.valueOf(t.val)).intValue(); .)
                       ".." Number           (. int ubound = (Integer.valueOf(t.val)).intValue(); .)
                       ")" ":=" Number       (. int cvalue = (Integer.valueOf(t.val)).intValue(); .)
                       ";"                   (. lints.put(varName,new IntVar(lbound,ubound,cvalue)); .)
                   |  "boolean" ":=" (true | false) (. boolean bvalue = Boolean.parseBoolean(t.val); .) ";".
      Statement = [Identifier                (. labels.put(t.val,statementNo); .)
                  ":"] StatementBody.
      StatementBody = Assignment | Branching | Goto.

      Goto = "goto" Identifier               (. lprogram.add("goto " + t.val);
                                              statementNo++; .) ";".
      Assignment = "let" LValue              (. cmd = "asgn " + t.val + " "; .)
                   ":=" (RValue              (. cmd = cmd + t.val; .)
                   [OP                       (. cmd = cmd + " " + t.val; .)
                   RValue                    (. cmd = cmd + " " + t.val; .)
                   ]
               |
                   "not"                     (. cmd = cmd + "not"; .)
                   RValue                    (. cmd = cmd + t.val; .)
                   ) ";"                    (. program.add(cmd); statementsNo++; .).
      LValue = Identifier.
      RValue = Identifier | Number | true | false.
      OP = '+' | '-' | "and" | "or".
      Branching = "if"                       (. cmd = "if "; .)
                   CompareExpr
                   "goto"                    (. cmd = cmd + "goto"; .)
                   Identifier                (. cmd = cmd + t.val; .)
                   ";"
                   ["else" "goto"            (. cmd = cmd + "elsegoto"; .)
                   Identifier                (. cmd = cmd + t.val; .)
                   ";"]                     (. lprogram.add(cmd); statementNo++; .) .
      CompareExpr = RValue                   (. cmd = cmd + t.val; .)
                    CompareOp                (. cmd = cmd + " " + tval + " "; .)
                    RValue                   (. program.add(cmd); statmentNo++ .)  .
      CompareOp = '=' | "<>" | '<' | "<=" | '>' | ">=".
  END TinyCode.
  <br>
  <br>
  12 ) Linguagem Taste: Realizar operações matemáticas.
  <br>
  <br><br>
  <br><br>
  <br>
  Estudo 4:
  <br>
  <br>
  2) Taste tem algumas semelhanças com C# ou Java. Ele tem variáveis de tipo int e bool, bem como funções sem parâmetros. Permite atribuições, chamadas de procedimento, instruções if e while. Inteiros podem ser lidos de um arquivo e gravados no console, cada um deles em uma única linha. Ele tem expressões aritméticas (+, -, *, /) e expressões relacionais (==, <,>).
  Test.TAS acumula o código principal, main();
  Taste.IN as entradas do código.
  <br>
  <br>
  3) Test.TAS
  program Test {
      void Main() {
          int x;
          int y;
          int soma;
          soma=x+y;
          write soma;
      }
  }
  Taste.IN
  3 5

  4)1: E 3
  4: R
  5: S 0
  8: R
  9: S 1
  12: L 0
  15: L 1
  18: A
  19: S 2
  22: L 2
  25: W
  26: L
  27: R

  8
  <br>
  <br>
  5) Fazer uso de um sistema Unix (virtualizado ou não). Baixar a Coco/R e navegar na pasta Taste a partir do terminal. Editar e codificar o arquivo ‘Test.TAS’. Escolher as entradas em Taste.IN. Para obter um executável utilizamos o comando ‘make ./Taste Test.TAS’. Executamos o resultado.




</body>
</html>
