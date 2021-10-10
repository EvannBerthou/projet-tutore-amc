PREFIX=".."
PROJECT=$1

echo Compiling $PROJECT
cp $PREFIX/questions/$PROJECT $PREFIX/output/$PROJECT
cd $PREFIX/output
auto-multiple-choice prepare --mode s --data data --filter plain --n-copies 1 $PROJECT > /dev/null 2> /dev/null
rm $PROJECT
