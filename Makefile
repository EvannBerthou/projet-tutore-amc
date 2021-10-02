all: generate_output

generate_output:
	if ! [ -d "output" ]; then mkdir -p output/{cr,data,exports,scans}; fi

clean:
	rm -dr output
	rm *.txt
