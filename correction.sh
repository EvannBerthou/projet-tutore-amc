PREFIX=".."
FICHIER=$(pwd)/$1

cd $PREFIX/output

auto-multiple-choice meptex --src questions_filtered-calage.xy --data data 

auto-multiple-choice getimages --copy-to scans $FICHIER 

auto-multiple-choice analyse --projet . scans/* --debug debug 

auto-multiple-choice prepare --mode b --data data --with xelatex questions_filtered.tex 

auto-multiple-choice note --data data 

chmod +w data/association.sqlite
auto-multiple-choice association --data data --set --student 1 --id 001 

echo "nom;prenom;id" > students.csv
echo "first;student;001" >> students.csv

sqlite3 data/association.sqlite 'insert into association_variables (name, value) values ("key_in_list", "id") on conflict(name) do update set value="id";' 

auto-multiple-choice annotate --project $(pwd) --names-file students.csv --association-key id --compose 1 --subject *-sujet.pdf --corrected *-corrige.pdf 

auto-multiple-choice export --data data --o exports/notes --module CSV --fich-noms students.csv 
