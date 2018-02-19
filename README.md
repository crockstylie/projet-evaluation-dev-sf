# StarWars Dash Board

## Installation

Pour récupérer le projet, vous pouvez soit :

* Cloner le dépôt git :
```
git clone https://github.com/crockstylie/projet-evaluation-dev-sf.git
```

* Cliquer sur le bouton `Download`

Installer les dépendances à l'aide de `composer`: 

```
composer install
```

Pour installer la base de données :

```
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

### Authentification

Trois utilisateurs on été créés : 

* `user`/`userpass`
* `admin`/`adminpass`
* `superadmin`/`superadminpass`

### Design

Thème css Darkly récupéré sur https://bootswatch.com/3/darkly/

### Environnement de Developpement

* Windows 10 64 bits
* WampServer 3.1.1
* PHP 7.2.2
* Apache 2.4.29
* MySql 5.7.9
* IntelliJ IDEA 2017.1.2

### Commande Symfony

```
php bin/console application:informations
```
