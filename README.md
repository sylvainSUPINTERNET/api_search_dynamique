Mini API (Symfony 3 & AngularJS)
========================

Get started
--------------

>Installer les dépendances
```{r, engine='sh', count_lines}
composer install
```

>Crée la base de données
```{r, engine='sh', count_lines}
php bin/console doctrine:database:create 
```

>Import la base de données exemple fournie
```{r, engine='sh', count_lines}
$ mysql -u root -p -h localhost your_DB_name < api_test.sql
```

>Démarrer => http://localhost:8000
```{r, engine='sh', count_lines}
$ php bin/console server:run
```














