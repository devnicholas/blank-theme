
<h1 align="center">Blank Theme</h1>
<div align="center">
Um tema base para a criação de temas personalizados no Wordpress

![Badge](https://img.shields.io/badge/license-MIT-blue?style=for-the-badge)
![Badge](https://img.shields.io/badge/Wordpress-6.1.1-brightgreen?style=for-the-badge&logo=wordpress)
![Badge](https://img.shields.io/badge/Docker-blue?logo=docker&style=for-the-badge)
</div>
<div id="tabela-de-conteudo">

# 📋 Tabela de conteúdos
* [Requisitos](#requisitos) 
* [Instalação](#instalacao) 
	* [Plugins](#plugins)
	* [Tecnologias](#tecnologias)
* [Features](#features)
	* [Campos customizados](#custom-fields)
	* [Conteúdos customizados](#custom-types)
	* [Exibir páginas](#pages)
	* [Exibir tipos de conteúdos customizados](#types)
* [Recomendações e boas práticas](#recomendations)
* [Autor](#author)
* [Licença](#license)

</div>

<div  id="requisitos">

# 👀 Requisitos

Em ambiente de **produção**:
 - PHP 7.4 ou superior
 - Wordpress 5.4 ou superior

Em ambiente de **desenvolvimento**:
- Node 
- Docker
- Yarn

</div>

<div id="instalacao">

# 🚀 Instalação

Em ambiente de **produção**:
Baixe o tema no formato .zip e vá até `Aparência > Temas` no seu painel do WordPress e clique em _Adicionar novo_. Envie o arquivo .zip que você baixou previamente e o tema estará pronto para ser ativado!

Em ambiente de **desenvolvimento**:
O processo pode ser feito da mesma forma que em produção, porém existe uma maneira mais fácil para trabalhar localmente com esse tema usando o *Docker*.  Ao rodar o comando: 
```bash
$ docker-compose up
```
Você irá iniciar uma instalação do wordpress que já terá seu tema pronto para ser ativado e todas as alterações feitas serão refletidas na pasta do tema dentro do container.
</div>
<div id="plugins">

## 🔗 Plugins
![Advanced Custom Fields](https://img.shields.io/badge/required-Advanced%20Custom%20Fields-blue)
O [Advanced Custom Fields](https://www.advancedcustomfields.com) é um plugin para criação de campos e tipos de conteúdos personalizados. O Tema possui forte integração com esse plugin, sendo obrigatório a instalação. Após a ativação do tema ele dará opção de já instalar o plugin sem precisar baixa-lo.

![Contact Form 7](https://img.shields.io/badge/optional-Contact%20Form%207-blue)
O [Contact Form 7](https://contactform7.com) permite a criação de formulários utilizando HTML e lida bem com as exceções e envio de formulários utilizando os recursos do Wordpress.

![Translate Press](https://img.shields.io/badge/optional-Translate%20Press-blue)
O [Translate Press](https://translatepress.com/) é indicado para sites multi-idiomas, pois permite a tradução de conteúdo de forma manual ou automática, inclusive a substituição de imagens baseado no idioma.
</div>
<div id="tecnologias">

## 🛠️ Tecnologias
O tema utiliza as seguintes tecnologias no seu funcionamento:

 - [Tailwind CSS](https://tailwindcss.com/docs)
 - [Advanced Custom Fields PRO](https://github.com/wp-premium/advanced-custom-fields-pro)
 - [TGM Plugin Activation](http://tgmpluginactivation.com/)
 - [Docker](https://www.docker.com/)

</div>
<div id="features">

# 📋 Features
Abaixo segue a lista de features presentes nesse tema que visam auxiliar no desenvolvimento ou mantê-lo organizado para futuras manutenções.
</div>
<div id="custom-fields">

## 📑 Campos customizados
Utilizando recursos do ACF e do ACF Pro, é possível criar campos customizados para cada tipo de post ou páginas específicas, facilitando a criação de um tema personalizado. 

Apesar de existir uma interface visual para a criação dos campos do ACF, é indicado que a criação aconteça via PHP. Dessa forma a sincronização entre diferentes ambientes não dependerá do banco de dados e sim dos arquivos.

Para essa criação, o ACF possui uma [documentação oficial](https://www.advancedcustomfields.com/resources/register-fields-via-php/). Porém o Blank Theme possui uma classe interna chamada `AcfBuilder` que irá facilitar esse processo, fazendo com que ele seja menos verboso.

Modelo de criação de um novo grupo de campos com um campo do tipo texto:
```php
$acf = new AcfBuilder('test_group', 'Grupo de teste');
$acf->setLocate('post');
$acf->createField('infos', 'Informações');
```
</div>
<div id="custom-types">

## 📑 Tipos customizados
É muito comum, durante o desenvolvimento de um site com Wordpress, a necessidade de criar um novo tipo de post, com categorias e tags próprias . Utilizando recursos do ACF e ACF Pro isso é perfeitamente possível e facilitado pelos helpers do Blank Theme.

Para criar um novo tipo de campo, basta criar uma nova instância da classe `CustomTypes`. Segue um exemplo de criação:
```php
$type = new CustomTypes('test', 'Teste');
$type->create();
```
</div>
<div id="pages">

## 📄 Exibir páginas
Após a criação da página pelo Wordpress, é possível criar o arquivo referente a ela. Para isso basta criar um novo arquivo dentro do diretório `templates/pages` com o nome `{slug}.php`, onde o slug irá corresponder ao slug da página criada. 

Por exemplo para a página com o slug `sobre` o arquivo ficaria `templates/pages/sobre.php`. Para a página `fale-conosco` ficaria `templates/pages/fale-conosco.php`.

Na ausência de um arquivo com o slug da página o Wordpress chamará outros arquivos conforme a [hierarquia de templates](https://developer.wordpress.org/themes/basics/template-hierarchy).
</div>
<div id="types">

## 📂 Exibir tipos de conteúdos customizados
Para exibir a página interna de um tipo de conteúdo customizado é necessário criar um arquivo dentro do diretório `templates/singles` com o nome `{slug}.php`, onde o slug irá corresponder ao slug do tipo de conteúdo. 

Por exemplo para o tipo de conteúdo com o slug `servicos` o arquivo ficaria `templates/singles/servicos.php`.

Na ausência de um arquivo com o slug do tipo de conteúdo o Wordpress chamará outros arquivos conforme a [hierarquia de templates](https://developer.wordpress.org/themes/basics/template-hierarchy).
</div>
<div id="recomendations">

# 💡 Recomendações

 - Mantenha o arquivo `functions.php` o mais enxuto possível, sempre que possível isole as funcionalidade e não trabalhe com blocos de códigos grandes dentro dele, isso aumenta a complexidade de manutenção. 🔨
 - Crie uma pasta `components` e reutilize, sempre que possível, seu código. 🤝
 - Ao utilizar o WooCommerce, faça uso dos Hooks, alterar o código fonte do WooCommerce não é uma boa prática pois você pode perder compatibilidade com futuras versões do plugin. [Essa é uma lista de todos os hooks que o WooCommerce possui](https://woocommerce.github.io/code-reference/hooks/hooks.html#hooks-template-files), use-os! 😉
 - Por fim, esse é um template para temas customizados, então tem o objetivo de proporcionar uma rápida resolução de problemas comuns no desenvolvimento de sites utilizando Wordpress. Se você identificou um problema comum que esse tema não resolve ou até uma melhor solução para um problema, sinta-se livre para contribuir! ❤️ 

</div>
<div id="author">

# 🙋‍♂️ Autor
<a href="https://devnicholas.github.io/">

<img style="border-radius: 50%;" src="https://avatars.githubusercontent.com/u/46843036" width="150px;" alt=""/>
<br />
<sub><b>Nicholas Stefano 🔥</b></sub></a>

<br />

[![Linkedin Badge](https://img.shields.io/badge/-Nicholas%20Stefano-blue?style=flat-square&logo=Linkedin&logoColor=white&link=www.linkedin.com/in/nicholas-stefano)](www.linkedin.com/in/nicholas-stefano)
[![Gmail Badge](https://img.shields.io/badge/nicholas.stefanob@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:nicholas.stefanob@gmail.com)](mailto:nicholas.stefanob@gmail.com)
</div>
<div id="license">

# 📝 Licença
Este projeto esta sobe a licença [MIT](./LICENSE).

Feito com ❤️ por Nicholas Stefano 👋🏽 [Entre em contato!](https://www.linkedin.com/in/nicholas-stefano)
</div>