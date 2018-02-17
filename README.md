# Évaluation pour le poste de développeur web (H/F)

## Avant propos

Le but de ce test est d'évaluer votre niveau d'expertise sur le framework Symfony (version 3.4.* dans le cas présent). 
Au travers du développement d'une petite application s'inscrivant dans l'univers de Star Wars, nous aborderons un certain nombre de concepts proposés par le framework.
Une fois terminé, vous nous ferez parvenir votre code par le moyen de votre choix (archive zip, lien vers github, gitbucket, ...).

Remarque : il est vivement conseillé de réaliser l'ensemble des tâches demandées. Cependant, certains points peuvent être bloquant. Dans ce cas, implémenter le maximum de choses qu'il vous est possible de faire et envoyer nous votre test en précisant les parties manquantes.

## Installation

Pour récupérer le projet, vous pouvez soit :

* Cloner le dépôt git :
```
git clone https://lab.openevents.fr/public-repository/projet-evaluation-dev-sf.git
```

* Cliquer sur le bouton `Download`

Installer les dépendances à l'aide de `composer`: 

```
composer install
```

## Cahier des charges

L'application proposera 2 sections principales : 
* La première permettant la gestion d'une flotte de vaisseaux
* La seconde la récupération d'une liste de personnages de la série depuis une API

Il sera nécessaire de s'authentifier avant d'accéder à une quelconque ressource de l'application.

Le design de l'application reposera sur l'utilisation de la librairie Bootstrap.

Enfin, une commande Symfony permettra de retourner des informations sur l'application.

### Authentification

Les données de cette application étant confidentielles, il sera nécessaire d'être authentifié pour les consulter.
Pour ce faire, vous mettrez en place :
* un formulaire de connexion avec identifiant et mot de passe.
* un bouton présent dans toutes les pages permettant la déconnexion. Celle-ci sera suivie par une redirection vers la page de connexion.

Les comptes utilisateurs seront configurés au sein du projet (provider type `in_memory`) .

### Design

Le design de l'application reposera sur l'utilisation de la librairie Bootstrap (version 3.3.7) fourni dans le projet (`web/css`). 

Sur chaque pages devra apparaître : 
* Le nom de l'application (de votre choix).
* La version de l'application. Ce numéro de version sera à définir dans le fichier `app/config/config.yml`.
* Le nom de l'utilisateur connecté.
* Un bouton permettant la déconnexion.

Proposez quelque chose de simple et clair, fonctionnel et ergonomique.

### Gestion de la flotte de vaisseaux

L'application devra permettre la gestion d'une flotte de vaisseaux (Starships). Les vaisseaux seront enregistrés en base de données (type MySQL).

Les vaisseaux possèdent les caractéristiques suivantes :
* Un nom. Exemple : `Faucon Millenium`.
* Un modèle. Exemple : `YT-1300`.
* Une longueur (en mètre). Exemple : `34.75`.
* Une vitesse maximale (en MGLT). Exemple : `75`  (pas de décimal, supérieur à 0).
* Un prix exprimé en CGS (Crédit Galactique Standard). Exemple : `1000000000000` (pas de décimal).
* Nombre de personnels navigants. Exemple : `4`.
* Nombre de passagers. Exemple : `6`.
* Date de création (au sens enregistrement MySQL)
* Date de modification (au sens enregistrement MySQL)

Toutes ces caractéristiques devront obligatoirement être renseignées. Vous mettrez en oeuvre toutes les vérifications nécessaires afin de respecter les formats et types demandés.

Règles complémentaires suite à une directive de l'Empire :
* le nombre de passagers ne doit pas être plus de 10 fois supérieur au nombre de personnels navigants. Dans le cas présent, il serait impossible de renseigner plus de 40 passagers.
* Un vaisseau peut avoir 0 passager mais a obligatoirement au moins 1 personne navigante.

### Liste des personnages de l'univers Star Wars

A partir de l'API `SWAPI` (https://swapi.co), récupérer une liste de personnages emblématiques de la licence et afficher le résultat dans une page de l'application.

URL pour la récupération des personnages : https://swapi.co/api/people/

A noter :
* Les appels vers cette API se feront côté serveur.
* Vous dédirez un service (au sens Symfony) pour tous les appels vers cette API. 
* Logger les éventuelles erreurs de communication avec l'API.
* La liste concernera seulement la première page de résultat (soit 10 personnages).

#### Films associés aux personnages

Dans le retour de l'API, vous constaterez qu'une liste de films est associée à chaque personnage dans lesquelles ils apparaissent.

Exemple de retour : 

```
{
            "name": "R2-D2", 
            "height": "96", 
            "mass": "32",
            "films": [
                "https://swapi.co/api/films/2/", 
                "https://swapi.co/api/films/5/", 
                "https://swapi.co/api/films/4/", 
                "https://swapi.co/api/films/6/", 
                "https://swapi.co/api/films/3/", 
                "https://swapi.co/api/films/1/", 
                "https://swapi.co/api/films/7/"
            ]
        }
```

Sans faire d'autre appel à l'API, vous mettrez en place une fonction Twig permettant de parcourir cette liste de liens et d'en ressortir seulement un tableau avec les numéros des films.

Exemple d'utilisation :

```twig
Apparition de R2-D2 dans les films : {{ convertFilmLinksToFilmIds(filmsLinks) | join(', ') }}
```
Rendu :

```
Apparition de R2-D2 dans les films : 2, 5, 4, 6, 3, 1, 7
```

#### Evénement Symfony

Nous aimerions connaitre le nombre de requête HTTP total envoyé vers cette API par l'application. Pour se faire :
* Créer un événement représentant un appel vers l'API
* Lancer cet événement pour chaque appel
* Créer un listener écoutant cet événement et mettre à jour le nombre d'appel total. Ce nombre sera stocké dans le fichier `number_of_api_calls` situé à la racine du projet.

### Commande Symfony

Une commande Symfony devra permettre d'afficher dans le terminal les informations suivantes : 
* Nom de l'application
* Version de l'application
* Version de Symfony
* Environnement d'éxécution

Exemple d'utilisation : 
```
php bin/console application:informations
```

Exemple de retour :
```
Nom de l'application : Test Foo Bar
Version : 1.0.0
Version de Symfony : 3.4.4
Environnement : dev
```

### Test unitaire

Vous rédigerez les tests unitaires de la classe en charge de requêter sur l'API `SWAPI`.