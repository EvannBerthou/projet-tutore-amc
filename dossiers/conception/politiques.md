# Politiques et stratégies

#" Mécanisme de stockage
L'utilisation d'une base de donnée est centrale au fonctionnement de l'application.
En effet, l'ensemble des QCM, ne seront pas stockés sur l'appareil de l'utilisateur
mais sur le serveur qui fournis l'application. Cela permet à un utilisateur de pouvoir 
avoir accès à tous ces QCM peut importe d'où. Nous nous tournerons vers un système
de base de donéne relationnel de part notre habitude de son utilisation ainsi que
sa facilité à s'intégrer avec des ORM (cf 7.). Grâce à l'ORM nous avons pas besoin de
réaliser, en plus de la conception objet, une conception de la base de donnée. Ainsi
il est primordial que la conception objet soit stable.

## Politique de sauvegarde
Même dans des cas extrèmes, le total de la taille de la base de donnée restera 
relativement faible (au max quelques giga-octects). Il est donc possible d'effectuer
régulièrement des sauvegarde de l'entièreté de la base. 

De plus, comme tous les PDF sont généré à la volée et non stockés sur le serveur,
en cas de necessité d'appliquer une sauvegarde, cela ne nuit pas à l'opérabilité de 
l'application puisque les PDF sont regénérés de zéro à chaque fois.

## Politique de sécurité

Notre application étant une application web, elle sera publiquement accessible par
Internet et donc très vulnérable à tout type d'attaques.
Premièrement, il est indispensable que le site soit sécurisé à l'aide d'une connexion
HTTPS afin de pouvoir sécuriser au minimum les échanges entre le navigateur et le
serveur en particulié dans les scénarios critiques comme lors d'une connexion où
le mot de passe pourrait être intercepté. De plus, il faut réduire au maximum la surface
d'attaque du serveur. Il faut garder uniquement le serveur web dessus pour éviter
tout tentative d'attaque sur un autre service.

Il est bien évident que les mots de passe seront aussi crypté dans la base de donnée pour
ralentir au maximum les hackers si fuite à lieu et pouvoir prévenir les utilisateurs
dans les temps. Pour cela nous utiliserons des fonctions fournis par des librairies
qui ont déjà fait leurs preuves plutôt que d'essayer d'implémenter notre propre 
algorithme.

L'administrateur sera le seul à pouvoir modifier le mot de passe des utilisateurs.
