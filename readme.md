# Mapa dos Planos - Ação Educativa

# Temas utilizados

* [Twentytwelve](http://wordpress.org/extend/themes/twentytwelve/)
* [Ação Educativa (customizado)](https://github.com/pmarkun/mapadosplanos-theme)


Na pasta de temas:

    wget http://wordpress.org/extend/themes/download/twentytwelve.1.0.zip
    git clone git://github.com/pmarkun/mapadosplanos-theme.git
    
# Plugins utilizados

* [mapbox](http://wordpress.org/extend/plugins/mapbox/)
* [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/)
* [Attachments](http://wordpress.org/extend/plugins/attachments/)
* [Mapa dos Planos (customizado)](https://github.com/pmarkun/mapadosplanos-plugin)

Apenas para desenvolvimento:
 
* [CSV Importer](http://wordpress.org/extend/plugins/csv-importer/)
* [Import users from csv](http://wordpress.org/extend/plugins/import-users-from-csv/)

Apenas para o deploy:

* [WP-SuperCache](http://wordpress.org/extend/plugins/wp-super-cache/)
* [WP-reCAPTCHA](http://wordpress.org/extend/plugins/wp-recaptcha/)

Na pasta de plugins:

    wget http://downloads.wordpress.org/plugin/wp-super-cache.1.2.zip
    wget http://downloads.wordpress.org/plugin/wp-recaptcha.3.1.6.zip
    wget http://downloads.wordpress.org/plugin/attachments.1.6.2.1.zip
    wget http://downloads.wordpress.org/plugin/mapbox.1.1.1.zip
    wget http://downloads.wordpress.org/plugin/contact-form-7.3.3.1.zip
    wget http://downloads.wordpress.org/plugin/csv-importer.0.3.7.zip
    wget http://downloads.wordpress.org/plugin/import-users-from-csv.0.5.1.zip
    
    git clone git://github.com/pmarkun/mapadosplanos-plugin.git
    
# Como preparar os arquivos

Importar o `data/users.csv` usando o plugin Import users from csv. Isso vai importar todos os munícipios como nome de usuário atribuindo como senha o código do IBGE.

Conectar o ibge_educ.csv com o posts.csv:

    `csvjoin -c ibge,ibge posts.csv ibge_educ.csv > whole.csv`

Importar o `data/whole.csv` usando o plugin `CSV Importer`. Campos sem `csv_` são importados como custom fields.

As perguntas do IBGE foram todas importadas usando o formato A001 - onde 001 é o número da pergunta.
