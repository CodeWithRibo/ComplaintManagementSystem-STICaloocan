#!/bin/bash

# Colors
GREEN='\033[0;32m'
CYAN='\033[0;36m'
BOLD='\033[1m'
NC='\033[0m' # No Color

echo -e "${CYAN}${BOLD}╔════════════════════════════╗"
echo -e "║  Clearing Cache... ║"
echo -e "╚════════════════════════════╝${NC}"

php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan route:clear
php artisan optimize:clear

echo -e "${GREEN}${BOLD}✔ clear cache successfully"
echo -e "🚀 You're all set, Ribo!${NC}"
