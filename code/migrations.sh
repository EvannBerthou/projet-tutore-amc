#!/bin/sh

(yes | php bin/console doctrine:cache:clear-metadata || true) && 
    (yes | php bin/console doctrine:migrations:diff || true) && 
    (yes | php bin/console doctrine:migrations:migrate || true)
