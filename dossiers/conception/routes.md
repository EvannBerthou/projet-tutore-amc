# Routes

Liste de toutes les URLs qui seront disponibles sur le site. Elles sont séparées en 2 parties. La première partie concerne les URLs du front-end. C'est-à-dire, toutes les URLs
qui renverront vers une page HTML, et qui est donc utilisable par un utilisateur lambda.
La seconde partie concerne les URLs de l'API back-end. Elles renvoient des données qui ne sont pas utile aux utilisateurs mais seulement aux développeurs qui souhaitent
communiquer avec le service. Nous suivrons le format des API REST et appliquerons les bonnes pratiques. 

Les routes du front-end sont en français pour être facilement compréhensible par tout type d'utilisateur.
Les routes du back-end sont en anglais pour avoir une cohérece dans les termes techniques du code.

# Front-end
- /acceuil      : Page d'accueil du site
- /connexion    : Page où l'utilisateur se connecte
- /deconnexion  : Page qui déconnecte l'utilisateur et le renvoie sur l'accueil

- /admin : Sous partie de gestion de l'administrateur
    - /utilisateurs          : Affiche la liste des utilisateurs
    - /utilisateurs/nouveau  : Page de création d'un nouveau utilisateur
    - /utilisateurs/:id/     : Page de modification d'un utilisateur

- /mes-qcm        : Affiche la liste des QCM de l'utilisateur
- /modif-qcm      : Page de création/modification d'un QCM
- /correction-qcm : Page où l'utilisateur pourra donner les informations et récupérer la correction d'un QCM

# Back-end
- POST /login : {informations de connexion} : Connecte un utilisateur
- POST /logout : Déconnecte un utilisateur
- GET /users : Renvoie la liste de tous les utilisateurs
- GET /users/:id : Renvoie les informations d'un utilisateur
- POST /users : {information de compte} : Crée/modifie un nouveau utilisateur
- DELETE /users/:id : Supprime un utilisateur
- GET /qcm : Renvoie la liste de tous les QCM de l'utilisateur connecté
- POST /qcm/:id : {contenu du QCM} : Met à jour le QCM id
- POST /mark/:id : {Fichier PDF a corrigé} : Corrige un PDF et renvoie la note
- GET /generate/:id : Renvoie un PDF généré à partir du QCM

