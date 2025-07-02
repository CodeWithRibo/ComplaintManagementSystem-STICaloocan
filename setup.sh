#!/bin/bash

# Colors
GREEN='\033[0;32m'
CYAN='\033[0;36m'
BOLD='\033[1m'
NC='\033[0m' # No Color

echo -e "${CYAN}${BOLD}╔════════════════════════════╗"
echo -e "║  Unpacking dependencies... ║"
echo -e "╚════════════════════════════╝${NC}"

tar -xzf vendor.tar.gz

echo -e "${GREEN}${BOLD}✔ Vendor directory restored!"
echo -e "🚀 You're all set, Ribo!${NC}"
