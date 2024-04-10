#!/bin/bash

# Define the list of page titles
declare -a pageTitles=("Accueil" "À propos" "Contact" "Mentions légales" "Vie privée")

# Loop through the page titles
for title in "${pageTitles[@]}"
do
   echo "Creating page: $title"
   # Use WP-CLI to create a page with the current title
   wp post create --post_type=page --post_title="$title" --post_status=publish
done

echo "All pages have been created."

