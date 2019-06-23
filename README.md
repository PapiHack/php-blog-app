# BlogApp Project (TP1 AL)

Petite application représentant un blog avec des articles et catégories. Chaque article est associèe à une catégorie. Il est également possible de commenter un article.

# Description de l'architecture du projet

## config  

Ce repertoire contient comme son nom l'indique toute la configuration de l'app.
Le fichier `database.php` contiendra les paramètres de connexion à votre BD.
Le fichier `autoloader.php` permet le chargement automatique des classes lors de leurs instanciations (pas besoin de `require` ou `include`).

## public  

C'est ce dossier que vous devriez faire pointer votre serveur web. Il contient les ressources accessibles publiquement, c'est à dire tout ce qui est fichier statique (css, js, images, etc).

## src  

Il contient l'entiereté de l'application, en d'autres termes tout le code source.

- `Data` contient tout ce qui données en quelque sorte. En l'occurence ici il ne contient qu'une classe représentant une connexion à votre BD.
Attention : J'y implémente le `pattern singleton`.  

- `Core` contient ce qu'on appelle du `core framework` plus précisément un ensemble d'utilitaires indispensables et facilitant le bon fonctionnement de l'app. `Helpers` contient des helpers que j'ai codé afin de me faciliter le rendu des fichiers statiques

- `Enity` contient les entités (objets métier).  

- `Manager` contient les managers respectifs aux entités.

- `Utilities` contient des utilitaires.

- `ViewLoader` repertorie nos `Controllers`

- `Templates` contient l'ensemble des `Views`.

# Notes

J'utilise un FrontController (controlleur frontal) combiné d'un système de routage basique au niveau de `public/index.php`
