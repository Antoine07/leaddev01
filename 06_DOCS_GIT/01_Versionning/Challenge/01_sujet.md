# Sujet 01

## Contraintes

Vous allez créer une petite application avec la technologie que vous souhaitez, par équipe de 2 en respectant le gitflow que nous avons vu en cours.

Chaque fonctionnalité devra être correctement commentée par vos soin, en appliquant les conventions pour faire vos commits. Définissez un Lead Dev dans l'équipe, vous alternerez les rôles durant la semaine sur les différents projets.


Utilisez un CRM (Customer Relationship Management), vous pouvez utiliser Trello par exemple, ou notion.so


Organiser le plus possible en amont les différentes features à developper et répatisseer le travail. Les développeurs push leurs features dans une branche dev et le Lead fait la revu du code avant de merger dans la branche master.


## Contexte

Vous créez un bouton qui lance trois dés et compte le nombre de fois que l'on obtient un brelan de 6, brelan = trois dés identiques; à chaque fois que l'on relance l'expérience, on garde en mémoire les expériences précédentes, vous pouvez garder soit tous les résultats obtenus, soit uniquement les brelans de 6.

Attention, vous devez fixer le nombre de fois que l'on lance cette expérience, une expérience étant un lancer de trois dés.

L'application possède trois pages : la page Home qui permet de lancer l'expérience, une page description qui décrit le jeu et une page permettant de consulter les statistiques.

## Page Home le jeu

Sur cette page vous avez un bouton pour lancer les dés aux nombres de 3. Un autre champ du formulaire permet de définir le nombre de fois que vous répétez l'expérience. Pour consuler les résultats un lien cliquable permet de voir la page des statistiques. Vous utiliserez les paramètres de react-router-dom de route pour afficher les résultats.

```txt
[Jeu] [Description]

Nombre d'expérience : [100]

[Lancer]

[Resultat] 
```
