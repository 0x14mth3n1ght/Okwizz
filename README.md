# Projet informatique et méthodes agiles

## Structure théorique du projet

```
pima2022-groupe9
├── README.md
└── src
    ├── models # contient les modèles
    │   └── model.php
    ├── public # contient les controllers (chargent des views en fonctions des besoins)
    │   ├── index.php
    │   ├── pseudo.css
    │   ├── pseudo.html
    │   └── stylesheet.css
    └── view # contient les views qui font appel aux controlleurs
        ├── footer.php
        ├── home.php
        ├── navbar.php
        └── question.php
```

## Lancement

```
php -S localhost:8080
#accéder avec le navigateur à : localhost:8080/src/public/index.php
```




