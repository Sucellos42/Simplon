# Exercices de création de pages PHP

Dans cette première série d'exercices en PHP, nous ne fabriquons pas encore de vraies pages web mais des prémices de pages, qui deviendront de vraies pages web avec du HTML structuré dès les sprints suivant.


Les exercices sont répartis en trois niveaux de difficulté. Le premier niveau est celui que vous devez assimiler, les deux suivants sont du bonus, pour ceux qui veulent aller plus loin :).

- Créez un dossier spécifique qui contiendra tous les fichiers de l'exercice.
- Ouvrez un terminal dans ce même dossier et lancez ensuite la commande `php -S localhost:9000`
- Pour chaque question il faut fabriquer un nouveau fichier php `page-1.php`, `page-2.php`, etc.
- Toutes les pages sont alors accessibles dans votre navigateur à l'aide des URL :`http://localhost:9000/page-1.php`, etc.

> Petite astuce, pour pouvoir afficher des sauts de ligne dans votre navigateur, un saut de ligne habituel ne suffit pas. Vous pouvez vous y prendre de la façon suivante par exemple :
> 
> ```php
> define('NL', '<br/>');
> echo "Je suis la première ligne" . NL . "Je suis la deuxième ligne";
> ```
> 
> Ce sera pratique pour nos affichages, en attendant de découvrir en profondeur HTML


## Niveau 1


### Page 1

Créez un fichier qui affiche du texte à l'écran à l'aide de la commande `echo`.

> [voir la correction](./correction/page-1.php)

### Page 2

Créez un fichier qui affiche 100 fois la même phrase à l'écran, sur 100 lignes.

> [voir la correction](./correction/page-2.php)

!!! note "Méthode"

    - il faut avoir une phrase
    - on veut l'afficher à l'écran
      - on veut même l'afficher 100 fois
      - et on veut que cet affichage se fasse sur 100 lignes



### Page 3

Créez un fichier qui affiche 1 citation au hasard, chaque fois qu'on rappelle la page. (Vous créerez un tableau de citations)

> [voir la correction](./correction/page-3.php)


!!! note "méthode"

    - on me demande d'afficher une citation mais on n'a pas de citation !!!!
    - créer DES citations --> utiliser un tableau qui va contenir des citations
    - choisir une citation au hasard dans ce tableau
    - afficher cette citation



### Page 4

Créez un fichier qui affiche 10 fois la même citation au hasard.

> [voir la correction](./correction/page-4.php)

!!! note "méthode"

    - On crée plusieurs citations et on les met dans un tableau
    - On prend au hasard une citation dans le tableau
    - Tant qu'on n'a pas affiché 10 fois cette citation :
      - on affiche la citation prise au hasard


### Page 5

Créez un fichier qui affiche 10 citations au hasard (potentiellement plusieurs fois les même, peu importe).

> [voir la correction](./correction/page-5.php)

### Page 6

Complétez le fichier php ci-dessous pour qu'il affiche un pokémon de chaque type au hasard :

```php
<?php
$typeFeu = ['Dracoufeuille', 'Ponitouille', 'Sulfurette'];
$typeEau = ['Carabistouille', 'Ramoulette', 'Pykoukwak'];
$typeTerre = ['Bulbizouille', 'Empilflouille', 'Ortiche'];
// ???
```

> [voir la correction](./correction/page-5.php)

### Page 7

Complétez le fichier php ci-dessous pour qu'il affiche 3 fois le même pokémon de chaque type au hasard :

Par exemple :

```
Dracoufeuille
Dracoufeuille
Dracoufeuille
Ramoulette
Ramoulette
Ramoulette
Empilflouille
Empilflouille
Empilflouille
```

```php
<?php
$typeFeu = ['Dracoufeuille', 'Ponitouille', 'Sulfurette'];
$typeEau = ['Carabistouille', 'Ramoulette', 'Pykoukwak'];
$typeTerre = ['Bulbizouille', 'Empilflouille', 'Ortiche'];
// ???
```

> [voir la correction](./correction/page-7.php)

### Page 8

Complétez le fichier php ci-dessous pour qu'il affiche 3 pokémons de chaque type au hasard :

Par exemple :

```
Dracoufeuille
Ponitouille
Dracoufeuille
Carabistouille
Ramoulette
Pykoukwak
Bulbizouille
Ortiche
Empilflouille
```

```php
<?php
$typeFeu = ['Dracoufeuille', 'Ponitouille', 'Sulfurette'];
$typeEau = ['Carabistouille', 'Ramoulette', 'Pykoukwak'];
$typeTerre = ['Bulbizouille', 'Empilflouille', 'Ortiche'];
// ???
```









## Niveau 2


### Page 10

Créez une page PHP qui affiche un titre dans une balise `h1` et un paragraphe dans une balise `p`.

```php

```


### Page 11

Créez une page PHP qui affiche un titre dans une balise `h1` et une citation au hasard dans une balise `p`.

```php

```

### Page 12

Créez une page PHP qui affiche un titre dans une balise `h1`, une citation au hasard dans un paragraphe, et un Pokemon au hasard dans un deuxième paragraphe.

> Vous devez créer deux paragraphes, vous aurez donc deux balises `p` l'une à la suite de l'autre.

```php

```

### Page 13

Créez une page PHP qui affiche un titre et 5 paragraphes, affichant chacun une citation au hasard.

```php

```

### Page 14

Créez une page PHP qui affiche un titre et 5 citations au hasard, affichées dans une liste à puce (à l'aide des balises `ul` et `li`.

```php

```

### Page 15

Créez une page PHP qui affiche un titre et qui affiche tous les pokémons de type feu dans une liste, puis tous les pokémons de type eau dans une autre liste et enfin tous les pokémons de type terre dans une troisième liste.

```php

```


### Page 16

Créez une page PHP qui affiche en titre **Sommaire** et qui contient une liste à puce de liens (à l'aide de la balise HTML `a`) vers les autres pages du niveau 2 (page 10 à page 15 donc).

```php

```





## Niveau 3


### Exercice 20

- Créez un fichier `header.php` qui contienne votre nom et la date du jour
- Insérez ce fichier en début de toutes les pages du niveau 2


### Exercice 21

- Créez un fichier PHP qui affiche de manière dynamique l'URL de la page (genre `http://localhost:9001/exo-21.php`)
- Ajoutez dans ce fichier un deuxième affichage qui affiche tout ce qui trouve après un `?` dans l'URL (par exemple, pour l'URL `http://localhost:9001/exo-21.php?nom=Bob` afficherait `nom=Bob`) 


### Exercice 22

- Créez un fichier `exo-22.html` qui contient un formulaire `form`, affiche un champ de formulaire `input` et un bouton `submit`
- Ce fichier soumet votre formulaire vers une page PHP `exo-22.php`
- Votre fichier PHP affiche le texte que vous avez saisi dans le formulaire HTML


### Exercice 23

Créez un fichier PHP qui se connecte à une base de données et affiche les 10 premières lignes d'une table (genre une table de la base Employes ?)



### Exercice 24

- Créez un formulaire HTML qui demande de saisir un nom de Pokemon
- Créez une base de données, contenant une table de Pokémons et insérez-y quelques données au hasard (pas en PHP, à la main)
- Créez un fichier PHP qui reçoit le nom du pokemon saisi dans le formulaire HTML et affiche toutes ses informations s'il existe en base ou affiche 'Le Pokemon est inconnu' s'il n'existe pas en base.


### Exercice 25

Codez Instagram, mais en mieux, vous avez 30 minutes.



