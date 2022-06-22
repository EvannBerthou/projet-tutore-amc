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
auto-multiple-choice prepare --mode s --data data --filter plain --n-copies 1 tmp > /tmp/log.txt 2> /tmp/error.txt

cp ../tmp_filtered-corrige-student.pdf 001.pdf

auto-multiple-choice prepare --mode b --data ./data/ --filter plain tmp > /tmp/log.txt 2> /tmp/error.txt
auto-multiple-choice meptex --src tmp_filtered-calage.xy --data data
auto-multiple-choice getimages 001.pdf --copy-to scans
auto-multiple-choice analyse --data data --cr cr scans/*
auto-multiple-choice note --data data
auto-multiple-choice association-auto --data data --notes-id id --liste ../students.csv --liste-key no --debug /tmp/association-001.log
auto-multiple-choice export --data data -o notes.csv --fich-noms ../students.csv --module CSV 
