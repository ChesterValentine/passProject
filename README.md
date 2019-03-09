# passProject

`git clone https://github.com/ChesterValentine/passProject.git`
```
composer update
yarn add bootstrap --dev

php bin/console doctrine:migrations:migrate

php bin/console doctrine:fixtures:load

php bin/console server:run 0.0.0.0:8000
```