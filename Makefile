all: generate_output

generate_output:
	mkdir -p output/{cr,data,exports,scans}

clean:
	rm -dr output
	rm *.txt
