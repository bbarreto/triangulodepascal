#Triângulo de Pascal

Em estatística e probabilidade, uma das técnicas de descobrir a probabilidade de organizar um evento em diferentes formas utiliza-se do Triângulo de Pascal.

![Figura A: Triângulo de Pascal](https://upload.wikimedia.org/wikipedia/commons/2/24/Pascaltriangle2.PNG)

Também conhecido como **triângulo aritmético**, o Triângulo de Pascal é formado a partir de uma simples fórmula matemática: O valor numérico de um elemento de uma linha é igual à soma dos elementos imediatamente acima à direita e à esquerda (Relação de Stifel).

![Figura B: Relação de Stifel](https://upload.wikimedia.org/wikipedia/commons/9/97/Pascal3.png)

##Exemplo prático
Utilizando o triângulo da Figura A, descubra de quantas maneiras podemos organizar 5 em um número distinto de conjuntos. Para resolver o exemplo, vamos até a linha número 5, que possui os resultados 1, 5, 10, 10, 5 e 1.

As colunas também tem sua contagem iniciada do zero, então lemos a informação da seguinte forma:

- Para agrupar 5 pessoas em conjuntos de 0 pessoas, temos 1 única maneira possível: (0);
Para agrupar 5 pessoas em conjuntos de uma pessoa, temos 5 maneiras possíveis: (1), (2), (3), (4) e (5);
- Para agrupar 5 pessoas em conjuntos de 2 pessoas, temos 10 maneiras possíveis: (1,2), (1,3), (1,4), (1,5), (2,3), (2,4), (2,5), (3,4), (3,5) e (4,5);
- Para agrupar 5 pessoas em conjuntos de 3 pessoas, também temos 10 maneiras possíveis: (1,2,3), (1,2,4), (1,2,5), (1,3,4), (1,3,5), (1,4,5), (2,3,4), (2,3,5), (2,4,5) e (3,4,5);
- Para agrupar 5 pessoas em conjuntos de 4 pessoas, temos 5 maneiras: (1,2,3,4), (1,2,3,5), (1,2,4,5), (1,3,4,5) e (2,3,4,5)
- E, finalmente, para agrupar 5 pessoas em um conjunto de 5, temos somente uma maneira: (1, 2, 3, 4, 5).

Agora que já sabemos o que é e como é montado o Triângulo de Pascal, vamos trabalhar.

##Exercício

Desenvolver uma página em HTML onde o usuário informe o “Número de linhas do triângulo” (um número inteiro maior que zero) com um botão “Gerar triângulo de pascal”. Ao clicar no botão, o usuário é redirecionado para um script PHP que recebe o parâmetro e gera o triângulo em formato de imagem. A imagem gerada deve ser igual à Figura A.

###Regras

Deve ser utilizado puramente HTML e PHP+GD (sem nenhuma outra biblioteca auxiliar para a geração de imagem ou para o cálculo).
A imagem gerada deve ser um PNG transparente.

###3 dicas para o desenvolvimento

- O número de elementos na base é igual ao número da linha + 1. Linha 0 = 1 elemento, linha 1 = 2 elementos, linha 3 = 4 elementos e assim por diante.

- Para calcular o valor de um elemento da linha, utilize a fórmula de combinação simples:
`Cn,p = n! / (p! * (n-p)!)`, onde `n` é o número da linha e `p` o número da coluna.

- Utilize `imagettfbbox` do GD para calcular a largura e altura dos resultados. Isso ajudará a decidir qual o tamanho da imagem final a ser gerada.


###Competências analisadas

- Lógica de programação
- Utilização da biblioteca GD
- Conhecimentos básicos em matemática
- Organização do código