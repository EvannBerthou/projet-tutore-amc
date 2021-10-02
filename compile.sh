PROJECT=$1

make
echo Compiling $PROJECT
cp $PROJECT output/$PROJECT
cd output
auto-multiple-choice prepare --mode s --data data --filter plain --n-copies 1 $PROJECT > /dev/null 2> /dev/null
rm $PROJECT
