## Projeto Empresa Junior
O objetivo deste desafio é usar o framework php `laravel` para criar um sistema de cadastro de empresas junior e das federações que elas pertencem. O 
sistema deve possuir autenticação, além ser capaz de realizar pesquisas a partir dos nomes das empresas junior.<br> 
Abaixo segue a lista dos requisitos:<br>
<ul>
    <li> 
        Deve ser desenvolvido o cadastro de empresas juniores e a listagem delas, geral e por federação.
    </li>
    <li>
        Cada Empresa Júnior é cadastrada com Nome da EJ e Federação a qual ela pertence.
    </li>
    <li> 
        Cada Federação é cadastrada com Nome e Estado de origem.
    </li>
    <li> 
        Deve ser possível pesquisar por uma Empresa Júnior.
    </li>
    <li> 
        O sistema de autenticação (além de ser funcional) não deve permitir que haja mais de um cadastro com o mesmo e-mail.
    </li>
</ul>

### Estrutura do projeto
Para o módulo de autenticação foi utilizado o pacote `Jetstream` para construção dos models e midlewares e o pacote `livewire` para geração das views.<br>
As funcionalidades foram implementadas seguindo o diagrama de classes da imagem abaixo.
<br>
![Diagrama de Classes](readme_resources/models.jpg?raw=true "Diagrama de Classes")
