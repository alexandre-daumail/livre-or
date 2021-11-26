# 📚 Livre d'or 📚

// Création <em>d'un livre d’or</em> permettant aux utilisateurs de laisser  leurs avis sur le site internet. //

# 📋 Description du projet

1)  Création d'une base de donnée "livre-or" contenant deux tables : "utilisateurs" et "commentaires".
2)  Création de différentes pages de navigation et connexion:

- `index.php`
- `inscription.php`
- `connexion.php`
- `profil.php`
- `livre-or.php`
- `commentaire.php`

La connexion à un compte d'utilisateur permet de laisser un commentaire sur le livre d'or.
Diverses fonctions peuvent être implémentées, par exemple l'administration du livre d'or: au lieu d'avoir à passer par la base de donnée,
un modérateur pourra accéder grâce à son compte admin à la liste des utilisateurs et à la modération des commentaires.
Un dictionnaire de mots injurieux ou obscènes peut aussi servir de filtre en premier abord.

# 📝 Quelques précisions

Sur la page `livre-or.php`, on voit l’ensemble des commentaires, organisés du plus 
récent au plus ancien. Chaque commentaire doit être composé d’un texte 
“posté le `jour/mois/année` par `utilisateur`” suivi du commentaire. Si
l’utilisateur est connecté, sur cette page figure également un lien vers la 
page d’ajout de commentaire.
