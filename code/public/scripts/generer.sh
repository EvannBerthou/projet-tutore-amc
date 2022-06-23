#!/bin/bash

PROJECT_DIR=$1

create_project() {
    mkdir $PROJECT_DIR
    mkdir $PROJECT_DIR/cr
    mkdir $PROJECT_DIR/cr/corrections
    mkdir $PROJECT_DIR/cr/corrections/jpg
    mkdir $PROJECT_DIR/cr/corrections/pdf
    mkdir $PROJECT_DIR/cr/diagnostic
    mkdir $PROJECT_DIR/cr/zooms
    mkdir $PROJECT_DIR/data
    mkdir $PROJECT_DIR/exports
    mkdir $PROJECT_DIR/scans
}

# Création d'un nouveau projet
[ -d $PROJECT_DIR ] && rm -dr $PROJECT_DIR
create_project

pushd $(pwd) > /dev/null
cd $PROJECT_DIR
# Possible perte de perf à cause d'une utilisation du disque dur au lieu de passer par la ram
# Écriture du QCM dans un fichier
 echo -e "$2" > tmp
auto-multiple-choice prepare --mode s --data data --filter plain --n-copies 1 tmp 

# Nettoyage des fichiers crées
cp tmp /tmp/data
rm tmp
cat tmp_filtered-sujet.pdf
popd > /dev/null
#rm -dr $PROJECT_DIR
