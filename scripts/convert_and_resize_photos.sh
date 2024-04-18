#!/bin/bash

# Define the directory containing the images
IMAGE_DIR="photos"
# Navigate to the photos directory
cd "$IMAGE_DIR"

# Loop over all jpeg files in the directory
for file in *.jpeg; do
    # Create a new filename with the .webp extension
    output="${file%.jpeg}.webp"

    # Convert and resize the image
    convert "$file" -quality 80 -resize '1920x1920>' "$output"
    echo "Converted $file to $output"

    # Delete the original JPEG file
    rm "$file"
    echo "Deleted $file"
done

# Navigate back to the original directory
cd ..

# Replace 'jpeg' with 'webp' in all CSV files in the current directory
for csv in *.csv; do
    sed -i 's/jpeg/webp/g' "$csv"
    echo "Updated $csv"
done

