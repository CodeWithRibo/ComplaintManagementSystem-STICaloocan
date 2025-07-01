#!/bin/bash
echo "Extracting dependencies..."
tar -xzf vendor.tar.gz
php artisan config:cache
echo "All set! ✅"

