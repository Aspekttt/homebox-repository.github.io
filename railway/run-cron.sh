#!/bin/bash
while [ true ]
do
    echo "Running scheduler..."
    php artisan schedule:run --verbose --no-interaction &
    sleep 60
done
