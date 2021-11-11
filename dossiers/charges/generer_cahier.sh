#!/bin/sh

pandoc --top-level-division=chapter -V geometry:margin=2cm -V fontsize=16pt -V documentclass=report --toc -o charges.pdf cahier_des_charges.md
