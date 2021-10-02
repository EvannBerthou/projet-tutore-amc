GROUP = $(shell ps aux | egrep '(apache|http)' | grep -v ^root | cut -d\  -f1 | head -n1)
all: generate_output

generate_output:
	@if ! [ -d "output" ]; then \
		mkdir -p output; \
		mkdir -p output/cr; \
		mkdir -p output/data; \
		mkdir -p output/exports; \
		mkdir -p output/scans; \
		chgrp -R $(GROUP) output; \
		chmod -R g+w output; \
	fi

clean:
	rm -dr output
	rm *.txt
