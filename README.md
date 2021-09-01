![WordPress Boilerplate](https://uploaddeimagens.com.br/images/003/190/560/full/screenshot.png)
# WP Boilerplate
Esse tema se trata de um boilerplate - uma estrutura básica já pronta - com estilizações simples, ferramentas e métodos para uma inicialização de projetos personalizados em WordPress.
## O que vem nesse boilerplate?
Um tema personalizado com suporte para o [WooCommerce](https://br.wordpress.org/plugins/woocommerce/), estrutura pronta para criação de template personalizado com possibilidade de múltiplos idiomas. Possui o [Tailwind CSS v2.2.9](https://tailwindcss.com/docs) instalado por padrão.

## Setup

#### Instalação do WP Boilerplate
Baixe o tema no formato .zip e vá até `Aparência > Temas` no seu painel do WordPress e clique em _Adicionar novo_. Envie o arquivo .zip que você baixou previamente e o tema estará pronto para ser ativado!
#### Plugins recomendados
É fortemente recomendado o uso do [Advanced Custom Fields](https://www.advancedcustomfields.com) para a criação de campos personalizados para conteúdos.
Para o envio de e-mails utilizando SMTP, é recomendado o uso do [Easy WP SMTP](https://br.wordpress.org/plugins/easy-wp-smtp/), por ser fácil de configurar e possuir uma boa confiabilidade.
Para instalar um site multi-idiomas é recomendado o uso do [TranslatePress](https://translatepress.com/) que possibilita uma tradução simples pelo painel do Wordpress.

#### Usando o Tailwind CSS
Como framework frontend está pré-configurado o uso do [Tailwind CSS](https://tailwindcss.com/docs). Para fazer a estilização das páginas usar o arquivo `tailwind.css` e para compilar rodar o comando `npx tailwindcss -i ./tailwind.css -o ./style.css`. Pode ser usado o parâmetro `--watch` para a ferramenta ficar escutando as modificações no arquivo e buildar automáticamente. 
No momento da publicação em produção deve-se informar o `NODE_ENV=production` antes de executar o comando do build.

## Estrutura de arquivos
A estrutura informada a seguir fica em `wp-content\themes\wp-boilerplate`.
### Pastas
| Titulo | Objetivo |
|--|--|
| [Hooks](#hooks) | Armazenar os hooks do WooCommerce.
| Inc | Armazenar ovewrides e hooks de partes do WordPress
| JS | Armazenar arquivos .js consumidos no frontend
| Languages | Armazenar os arquivos de tradução do tema
| Template Parts | Armazenar partes isoladas do template
| Woocommerce | Armazenar arquivos do tema do woocommerce 
### Arquivos
Não serão explorados todos os arquivos do tema, apenas os considerados mais importantes. Para consultar o significado de algum arquivo que não esteja listado aqui [consulte a documentação](https://codex.wordpress.org/Theme_Development).
|Nome| Objetivo |
|--|--|
| functions.php | Armazenar as funções básicas relacionadas ao Tema. O arquivo base para a construção do tema. 
| header.php | Armazenar a estrutura inicial, ou cabeçalho, de qualquer página do tema.  Esse arquivo é invocado através da função `get_header()`.
| footer.php | Armazenar a estrutura final, ou rodapé, de qualquer página do tema. Esse arquivo é invocado através da função `get_footer()`.
| sidebar.php | Armazenar a estrutura de uma barra lateral ou qualquer seção que necessite de um widget do Wordpress. Esse arquivo é invocado através da função `get_sidebar()`.
| page.php | Armazenar a estrutura de uma página. Para ver como cria um arquivo para diferentes páginas veja o [tópico relacionado](#new-pages).
| single.php | Armazena a estrutura de um post. Para ver como cria um arquivo para diferentes tipos de posts veja o [tópico relacionado](#new-posts).
| woocommerce.php | Armazena a estrutura da página inicial da loja
| style.css | Armazena toda a estilização do tema que foi buildado pelo Tailwind CSS. Não é indicado fazer modificações nesse arquivo. Caso queira criar outros arquivos para segmentar a estilização lembre-se de chama-lo dentro do `functions.php`
| tailwind.css | Armazena toda a estilização customizada do projeto (botões, campos, etc).
| tailwind.config.js | Arquivo responsável pelas configurações do tailwind, como cores padrões, modificações do tema, etc.

<a id="new-pages"></a>
## Como criar novas páginas
Para criar novas páginas e ter acesso a um arquivo único especifico para aquela página deve-se copiar o arquivo `page.php` (ou o que você queira usar a estrutura base), e salva-lo com o nome `page-{slug}.php`, onde o slug deve ser substituído pelo slug da página criada. 
Por exemplo para a página com o slug `sobre` o arquivo ficaria `page-sobre.php`. Para a página `fale-conosco` ficaria `page-fale-conosco.php`

Caso não exista um arquivo especifico para a página o wordpress vai procurar pelo arquivo `page.php`. Caso não encontre irá exibir o `index.php`.

<a id="new-posts"></a>
## Como criar tipos de posts
Para criar um novo tipo de post e ter acesso a um arquivo único específico para aquele tipo de post deve-se copiar o arquivo `single.php` (ou o que você queira usar a estrutura base), e salva-lo com o nome `single-{post-type}.php` onde o post-type equivale ao slug do tipo do post.
Por exemplo para os posts do tipo `servicos` ficaria `single-servicos.php`.

É possível também especificar para um post dentro de um tipo, basta adicionar o slug do post no formato `single-{post-type}-{slug}.php`.

Caso não exista nenhum arquivo no formato descrito acima para aquele tipo de post o wordpress vai procurar pelo arquivo `single.php`. Caso não encontre irá exibir o `index.php`.

## Como criar novas categorias
Para criar um novo tipo de categoria e ter acesso a um arquivo único específico para aquela categoria deve-se copiar o arquivo `index.php` (ou o que você queira usar a estrutura base), e salva-lo com o nome `category-{slug}.php`, onde o slug deve ser substituído pelo slug da categoria criada. 
Por exemplo para a categoria `cases` ficaria `category-cases.php`.

Caso não exista um arquivo especifico para a categoria o wordpress vai procurar pelo arquivo `category.php`. Caso não encontre irá exibir o `index.php`.

<a id="hooks"></a>
## O que são e como usar os hooks?
Hooks, ou ganchos em português, são recursos que possibilitam a inserção de conteúdos por meio de funções dentro de uma determinada área do site sem precisar alterar o arquivo correspondente aquela área diretamente. Além de manter uma maior compatibilidade no site, faz com que a estrutura seja mais segmentada, facilitando manutenções futuras.

Esses recursos não estão presentes por padrão nesse tema, mas são facilmente incorporados caso haja necessidade.
Basta adicionar o seguinte código no template: `do_action('action_name')` e chamar dentro do arquivo `inc\template-functions.php` usando essa estrutura:

> add_action('action_name', 'your_function_name');
> function your_function_name() {
> // Seu código
> }

#### Hooks no WooCommerce
O WooCommerce por padrão possui uma imensa lista de hooks que podem ser aproveitados sem a necessidade de criar novos. Para visualizar consulte a [WooCommerce Code Reference](https://woocommerce.github.io/code-reference/hooks/hooks.html#hooks-template-files).

Para usar os hooks no WP Boilerplate basta seguir a estrutura indicada na pasts `hooks` na raiz do tema.

## Links de referência

 - https://developer.wordpress.org/themes/basics/template-hierarchy      
 - https://tableless.com.br/lojas-virtuais-com-woocommerce-ii-criando-temas-personalizados
