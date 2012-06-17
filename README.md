Esto es para saber si anda
seba ok
estoy en la movida, gabriel

hola

notas

Alias /canchitarwsymfony/sf C:/xampp/htdocs/canchitarwsymfony/lib/vendor/symfony/data/web/sf
<Directory C:/xampp/htdocs/canchitarwsymfony/web/sf>
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>

Alias /canchitarwsymfony C:/xampp/htdocs/canchitarwsymfony/web
<Directory C:/xampp/htdocs/canchitarwsymfony/web>
    AllowOverride All
    Order allow,deny
    Allow from all
</Directory>


cosas importante para no olvidar xd

git submodule update --init --recursive

php symfony plugin:publish-assets

./symfony propel:build-schema

./symfony propel:build-model


$this->forward('default', 'module');


./symfony generate:module frontend Empleado
./symfony propel:build-forms
./symfony propel:generate-module frontend empleado Empleado

//if('es' === sfContext::getInstance()->getUser()->getCulture())
comentar esta linea en el archivo mpformpropel.class.php en la carpeta plugins
