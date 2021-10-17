# Generateur de QCM AMC

Projet tutoré pour le S3.

# Prérequis
- Linux (Testé sur Ubuntu et Arch Linnx)
- AMC 
- LaTeX
- Apache2 et PHP (Testé pour PHP8)
- Make (Optionnel) 

__Attention__ : Lors des tests, nous avons remarqués qu'AMC ne fonctionne pas avec OpenCV 4.4 !
  
# Structure du projet
```
.
├── output          # Dossier où tous les fichiers sont générés par AMC
├── questions       # Dossier contenant les questions
├── src             # Code source du programme
├── README.md       # Ce fichier
├── compile.sh      # Script servant de wrapper à AMC
└── Makefile        # Makefile générant la structure du projet 
```

# Préparation
Premièrement, il faut gérer la structure du projet ainsi qu'appliquer les permissions nécessaires.
Toute cette partie a été automatisée dans un Makefile mais son utilisation n'est pas obligatoire.
```sh
$ make
```

# Utilisation
Pour générer un QCM depuis un fichier txt
```sh
$ ./compile.sh <fichier.txt>
```

# Maquettes
L'ensemble des maquettes sont dispnibles [ici](maquettes/README.md)
