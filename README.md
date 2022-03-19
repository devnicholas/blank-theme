
<p align="center" id="sobre">
<img  src="https://uploaddeimagens.com.br/images/003/761/448/full/BLANK.png" alt="Blank Theme"  title="Blank Theme" width="180">
</p>
<h1 align="center">Blank Theme</h1>
<div align="center">
Um tema base para a criação de temas personalizados no Wordpress

![Badge](https://img.shields.io/badge/license-MIT-blue)
![Badge](https://img.shields.io/badge/Wordpress-4.9.1-brightgreen)
</div>
<div id="tabela-de-conteudo">

# 📋 Tabela de conteúdos
* [Sobre](#sobre) 
* [Requisitos](#requisitos) 
* [Instalação](#instalacao) 
	* [Plugins](#plugins)
	* [Tecnologias](#tecnologias)
* [Features](#features)
	* [Campos customizados](#custom-fields)
	* [Conteúdos customizados](#custom-types)
	* [Conteúdos padrão](#default-content)
	* [Exibir páginas](#pages)
	* [Exibir tipos de conteúdos customizados](#types)
	* [Envio de e-mails com SMTP](#smtp)
* [Recomendações e boas práticas](#recomendations)
* [Autor](#author)
* [Licença](#license)

</div>

<div  id="requisitos">

# 👀 Requisitos

Em ambiente de **produção**:
 - PHP 5.6 ou superior
 - Wordpress 5.4 ou superior

Em ambiente de **desenvolvimento**:
- Node 
- Docker
- Yarn

</div>

<div id="instalacao">

# 🚀 Instalação

Baixe o tema no formato .zip e vá até `Aparência > Temas` no seu painel do WordPress e clique em _Adicionar novo_. Envie o arquivo .zip que você baixou previamente e o tema estará pronto para ser ativado!
</div>
<div id="plugins">

## 🔗 Plugins
![Advanced Custom Fields](https://img.shields.io/badge/required-Advanced%20Custom%20Fields-blue)
O [Advanced Custom Fields](https://www.advancedcustomfields.com) é um plugin para criação de campos e tipos de conteúdos personalizados. O Tema possui bons helpers para ajudar o desenvolvimento com esse plugin e após a ativação do tema será exibido no Wordpress a recomendação de instalação do plugin.

![Contact Form 7](https://img.shields.io/badge/optional-Contact%20Form%207-blue)
O [Contact Form 7](https://contactform7.com) permite a criação de formulários utilizando HTML e lida bem com as exceções e envio de formulários utilizando os recursos do Wordpress. O tema também recomendará a instalação desse plugin após ser ativado.

![Translate Press](https://img.shields.io/badge/optional-Translate%20Press-blue)
O [Translate Press](https://translatepress.com/) é indicado para sites multi-idiomas, pois permite a tradução de conteúdo de forma manual ou automática, inclusive a substituição de imagens baseado no idioma.
</div>
<div id="tecnologias">

## 🛠️ Tecnologias
O tema utiliza as seguintes tecnologias no seu funcionamento:

 - [Tailwind CSS](https://tailwindcss.com/docs)
 - Suporte para [WooCommerce](https://br.wordpress.org/plugins/woocommerce/)
 - [TGM Plugin Activation](http://tgmpluginactivation.com/)
 - [Advanced Custom Fields PRO](https://github.com/wp-premium/advanced-custom-fields-pro)
 - Node*
 - Yarn*

*utilizados apenas em ambiente de desenvolvimento

</div>
<div id="features">

# 📋 Features
Abaixo segue a lista de features presentes nesse tema que visam auxiliar no desenvolvimento ou mantê-lo organizado para futuras manutenções.
</div>
<div id="custom-fields">

## 📑 Campos customizados
Utilizando recursos do ACF e do ACF Pro, é possível criar campos customizados para cada tipo de post ou páginas específicas, facilitando a criação de um tema personalizado. 

Por padrão, o ACF provê uma interface visual para a criação dos campos a partir do Wordpress, porém não é indicado a criação por lá devido que esses campos ficarão acoplados apenas ao banco de dados ativo no projeto além de ser possível a alteração indevida desses campos.

Portanto é indicado fazer o registro desses campos via PHP, conforme a [documentação oficial](https://www.advancedcustomfields.com/resources/register-fields-via-php/). O Blank Theme possui helpers que facilitam a criação desses campos, para consultar ver o arquivo `custom-fields/index.php`.

Modelo de criação de um novo grupo de campos:
```php
acf_add_local_field_group([
    'key' => 'my-group', // Slug do grupo
    'title' => 'My Group', // Como o grupo será chamado no wordpress
    'fields' => [ // Lista de campos que esse grupo terá
        create_field_custom(
            'my-field', // Slug do field [ÚNICO]
            'My Field', // Label do field
            'text', // Tipo do field ['text','image','file','repeater'...]
            [] // Demais opções do field
            [], // Sub-fields, se do tipo 'group' ou 'repeater', 
        ),
    ],
    'location' => [ // Para quais páginas/tipos de posts esses campos aparecerão
        [
            [
                'param' => 'page_slug', // Parâmetro para exibição dos campos ['post_type']
                'operator' => '==', // ['==', '!=', '>', '<']
                'value' => 'home', // Valor que será comparado
            ],
        ],
    ],
]);
```
</div>
<div id="custom-types">

## 📑 Tipos customizados
É muito comum, durante o desenvolvimento de um site com Wordpress, a necessidade de criar um novo tipo de post, com categorias e tags próprias . Utilizando recursos do ACF e ACF Pro isso é perfeitamente possível e facilitado pelos helpers do Blank Theme.

Para criar um novo tipo de campo, basta acessar o arquivo `custom-fields\custom-types.php` e seguir o modelo abaixo para a criação:
```php
create_custom_type(
    $slug, // Define o slug do tipo de post
    $name, // Define como esse tipo de post será chamado no wordpress
    $haveCategories, // Define se esse tipo de post terá categorias. [Default: false]
    $configs // Demais personalizações desse tipo de post
)
```
</div>
<div id="default-contents">

## 🗳️ Conteúdos padrão
Visando a maior facilidade na criação dos conteúdos que serão utilizados no projeto, é possível configurar quais páginas ou outros  tipos de conteúdos serão criados no momento da ativação do tema, não sendo necessária a criação individual de cada um deles.

Para isso, basta acessar o arquivo `configs\default-contents.php` e inserir no Array `$pages` os conteúdos que desejar criar seguindo o modelo:
```php
[
	'post_type'  =>  'page',
	'post_title'  =>  'Home', // O slug do post será criado a partir do title informado
	'post_status'  =>  'publish',
	'post_content'  =>  '',
	'post_author'  => $idUser, 
]
```
**❗Importante:** A criação das páginas só ocorrerá 1 única vez no momento da ativação do tema. Se após a ativação do tema for adicionados  novos conteúdos, eles não serão criados, a menos que o tema seja ativado novamente. Um comportamento que é recomendado adotar, dependendo da situação.
</div>
<div id="pages">

## 📄 Exibir páginas
Após a criação da página pelo Wordpress, é possível criar o arquivo referente a ela. Para isso basta criar um novo arquivo dentro do diretório `pages` com o nome `page-{slug}.php`, onde o slug irá corresponder ao slug da página criada. 

Por exemplo para a página com o slug `sobre` o arquivo ficaria `page-sobre.php`. Para a página `fale-conosco` ficaria `page-fale-conosco.php`.

Na ausência de um arquivo com o slug da página o Wordpress chamará outros arquivos conforme a [hierarquia de templates](https://developer.wordpress.org/themes/basics/template-hierarchy).
</div>
<div id="types">

## 📂 Exibir tipos de conteúdos customizados
Para exibir a página interna de um tipo de conteúdo customizado é necessário criar um arquivo dentro do diretório `contents` com o nome `content-{slug}.php`, onde o slug irá corresponder ao slug do tipo de conteúdo. 

Por exemplo para o tipo de conteúdo com o slug `servicos` o arquivo ficaria `content-servicos.php`.

Na ausência de um arquivo com o slug do tipo de conteúdo o Wordpress chamará outros arquivos conforme a [hierarquia de templates](https://developer.wordpress.org/themes/basics/template-hierarchy).
</div>
<div id="smtp">

## ✉️ Envio de e-mails com SMTP
Por padrão o Wordpress usa a função [mail( )](https://www.php.net/manual/pt_BR/function.mail.php) do PHP, que pode não funcionar corretamente em alguns tipos de servidores e possui baixa fidelidade de entrega. Por isso é recomendado o uso de um servidor SMTP para o envio de e-mails.

Para fazer a configuração, basta acessar o arquivo `configs\smtp.php` e preencher os dados utilizando o [PHPMailer](https://github.com/PHPMailer/PHPMailer).

Se você estiver usando o plugin do Contact Form 7, a integração com seus formulários já ocorrerá de forma automática. 

Para fins de testes e debug, recomendo a utilização da plataforma [MailTrap.io](https://mailtrap.io/), que é gratuita e possui fácil integração com Wordpress.
</div>
<div id="recomendations">

# 💡 Recomendações

 - Se tratando de um template para temas, não é interessante definir um desing pattern para esse projeto, já que ele deve funcionar para resolver diversos problemas. Porém nada impede (é recomendado) que uma vez definido o seu problema, você implementar um desing pattern utilizando esse tema! 🙂
 - Mantenha o arquivo `functions.php` o mais enxuto possível, sempre que possível isole as funcionalidade e não trabalhe com blocos de códigos grandes dentro dele, isso aumenta a complexidade de manutenção. 🔨
 - Crie uma pasta `components` e reutilize, sempre que possível, seu código. A pasta `template-parts` também tem esse objetivo para blocos de códigos que estejam dentro de loops. 🤝
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