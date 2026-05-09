#!/bin/bash

# Colors
GREEN='\033[0;32m'
CYAN='\033[0;36m'
BOLD='\033[1m'
NC='\033[0m' # No Color

echo -e "${CYAN}${BOLD}╔════════════════════════════╗"
echo -e "║  Clearing Cache... ║"
echo -e "╚════════════════════════════╝${NC}"

# DELETE corrupted cache first
rm -rf bootstrap/cache/*

# Then regenerate fresh cache
php artisan config:clear
php artisan config:cache
php artisan route:clear
php artisan route:cache
php artisan view:clear
php artisan view:cache
php artisan optimize:clear

echo -e "${GREEN}${BOLD}✔ Cache cleared and regenerated successfully"
echo -e "🚀 You're all set, Ribo!${NC}"
