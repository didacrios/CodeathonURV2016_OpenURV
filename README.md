# oGoose - Construïm el coneixement del futur
oGoose és un prototip de solució per incentivar la col·laboració entre universitaris i experts dels diferents àmbits en projectes d'investigació seguint la filosofia d'Open Access presentat a CodeAthon URV 2016

## Tecnologia emprada
- Sistema operatiu Debian GNU/Linux (v 8.2)
- Servidor web (Apache2 i Nginx) amd PHP (v 5.6+)
- Sistema gestor de BBDD Mysql (v 5.5.44)
- Entorn de desenvolupament Symfony (v 3.0.2)

## Instal·lació
- Clonar el repositori: ```git clone https://github.com/mitsurugi/CodeathonURV2016_OpenURV.git <directori_destí>```
- Accedir al directori on s'hagi clonat el projecte: ```cd <directori_destí>```
- Instal·lar les dependències: ```curl -sS https://getcomposer.org/installer | php && php composer.phar install```
- Copiar la plantilla del fitxer de configuració: ```cp app/config/parameters.yml.dist app/config/parameters.yml``` i editar-ho per incloure-hi la configuración de la BBDD: ```nano (o ´vi´) app/config/parameters.yml```
- Instal·lar els 'assets' (css, js, imatges de 'src/oGooseBundle/Resources/public' a 'web': ```php bin/console assets:install```
- Crear l'estructura de la base de dades: ```php bin/console doctrine:schema:update --force```

## Dades d'exemple
Al fitxer 'sampledata.sql', trobareu un volcat de la base de dades amb informació de prova

Enjoy :)