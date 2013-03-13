# Mapa dos Planos - Ação Educativa

# Temas utilizados

* [Twentytwelve](http://wordpress.org/extend/themes/twentytwelve/)
* [Ação Educativa (customizado)](https://github.com/pmarkun/mapadosplanos-theme)


Na pasta de temas:

    wget http://wordpress.org/extend/themes/download/twentytwelve.1.0.zip
    git clone git://github.com/pmarkun/mapadosplanos-theme.git
    
# Plugins utilizados

* [Email Alerts](http://wordpress.org/extend/plugins/email-alerts/)
* [WP Carousel](http://wordpress.org/extend/plugins/wp-carousel/)
* [mapbox](http://wordpress.org/extend/plugins/mapbox/)
* [Contact Form 7](http://wordpress.org/extend/plugins/contact-form-7/)
* [Attachments](http://wordpress.org/extend/plugins/attachments/)
* [WP CSV](http://wordpress.org/extend/plugins/wp-csv/)

Apenas para desenvolvimento:
 
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
    wget http://downloads.wordpress.org/plugin/import-users-from-csv.0.5.1.zip
    wget http://downloads.wordpress.org/plugin/wp-csv.1.3.6.zip
    wget http://downloads.wordpress.org/plugin/google-analytics-for-wordpress.4.2.8.zip
       
# Como preparar os arquivos

Importar o `data/users.csv` usando o plugin Import users from csv. Isso vai importar todos os munícipios como nome de usuário atribuindo como senha o código do IBGE.
