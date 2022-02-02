# Qualités et points d'ouverture

Nous avons décidé de réaliser l'entièreté de l'application en tant qu'un seul projet, contenant à la fois le front-end et le back-end. Nous avons fait ce choix car cela
facilite le développement et élimine les difficultés liés au reliement de différentes projets comme ça serait le cas dans une architecture de micro-service. Mais ce choix
n'est pas sans conséquence. 
Cela pose des problèmes au niveau des performances. Si le back-end subit des ralentissements (par exemple lors de la génération de beaucoup de PDF), alors des ralentissements
seront aussi présent au niveau du front-end. De plus, nous pouvons rencontrer des problèmes lors d'une panne, si l'application tombe à cause du back-end, alors le front-end
sera lui aussi indisponible. Et enfin, aussi des soucis tant qu'à la multiplicité lors du déploiement. On ne peut que déployer un couple de front-end et de back-end. Il est
impossible de par exemple, déployer 3 back-end et 1 seul front-end afin de supporter une charge plus lourde sur les points de performance sensible.
