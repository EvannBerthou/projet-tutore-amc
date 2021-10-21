GROUP = $(shell ps aux | egrep '(apache|http)' | grep -v ^root | cut -d\  -f1 | head -n1)

all: generate_output

generate_output:
	@if ! [ -d "questions" ]; then \
		mkdir save; \
	fi
	@if ! [ -d "questions" ]; then \
		mkdir questions; \
		chgrp -R $(GROUP) questions; \
		chmod -R g+w questions; \
	fi 

	@if ! [ -d "output" ]; then \
		mkdir -p output/cr/corrections/pdf; \
		mkdir -p output/data; \
		mkdir -p output/exports; \
		mkdir -p output/scans; \
		chgrp -R $(GROUP) output; \
		chmod -R g+w output; \
	fi

clean:
	rm -dr output
	rm -dr save

charges:
	pandoc --top-level-division=chapter -V geometry:margin=2cm -V fontsize=16pt -V documentclass=report --toc -o charges.pdf cahier_des_charges.md
