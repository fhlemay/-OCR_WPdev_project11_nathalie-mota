#!/bin/bash

# Get the directory of the current script
SCRIPT_DIR=$(dirname "$0")

# Path to the CSV file and photos directory
CSV_FILE="$SCRIPT_DIR/photos-nathalie-mota.csv"
PHOTOS_DIR="$SCRIPT_DIR/photos"

# Read the CSV file skipping the first line (header)
tail -n +2 "$CSV_FILE" | while IFS=',' read -r fichier titre reference categorie annee format type
do
  # Create a new post and capture the post ID
  POST_ID=$(wp post create --post_type=photo --post_title="$titre" --post_status=publish --porcelain)

  # Set the 'categorie' and 'format' taxonomies
  wp post term set $POST_ID categorie "$categorie"
  wp post term set $POST_ID format "$format"

  # Set custom fields
  wp post meta set $POST_ID type "$type"
  wp post meta set $POST_ID reference "$reference"

  # Upload and attach the thumbnail photo
  if [[ -f "$PHOTOS_DIR/$fichier" ]]; then
    wp media import "$PHOTOS_DIR/$fichier" --post_id=$POST_ID --featured_image --porcelain
  fi

  # Optional: Set the post date if 'année' is to be used as the post date
  # You might need to ensure the date format is correct for your setup
  wp post update $POST_ID --post_date="$annee-01-01"

done

echo "All posts have been created."
