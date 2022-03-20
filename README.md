# Generateur de QCM AMC

Projet tutoré pour le S3.

# Prérequis
- Linux (Testé sur Ubuntu et Arch Linnx)
- AMC 
- LaTeX
- Apache2 et PHP (Testé pour PHP8)
- Symfony
- MySQL
- Make (Optionnel) 

__Attention__ : Lors des tests, nous avons remarqués qu'AMC ne fonctionne pas avec OpenCV 4.4 !
  
# Structure du projet
```
.
├── code            # Code du projet (Projet Symfony)
├── dossiers        # L'ensemble des dossiers et documents (cahier des charges, dossier de conception, ...)
├── maquettes       # Maquettes du l'interface du site
├── README.md       # Ce fichier
```

# Maquettes
L'ensemble des maquettes sont dispnibles [ici](maquettes/README.md)

# Installation
Plusieurs manipulations on dû être faite pour que le déploiement avec GitHub action se fasse automatiquement.

- Gérer les groupes sur dossier /var/www/projet
- Activer mod\_rewrite : "# a2enmod rewrite" -> Pour ne pas avoir à mettre le index.php dans l'URL
