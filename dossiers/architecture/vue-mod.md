# Vue modulaire

Le projet est composé de 4 couches : les controlleurs, les services, les repository et les modèles.

# Les controlleurs

Ils sont le point d'entré de l'application, ce sont eux qui fournissent les URL disponibles et ne possède aucune logique. Ils servent à faire le lien entre l'utilisateur
et les services.

# Les services

C'est ici qu'est implémenté toute la logique de l'application. Ils reçoivent les données de la requête par le controlleur mais se reponsent sur les repositories pour le lien
avec la base de données.

# Les repositories

Ils servent d'intermédiaire entre les services et la base de donnée. Ils ne font que récupérer ou insérer des données reçu depuis les services. Aucune logique métier n'est
implémentée ici. Renvoie les données en utilisants les modèles

# Les modèles

Ne sont que porteur d'informations sous forme structurée.
