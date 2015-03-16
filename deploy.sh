find web -type f | while read file; do cp "$file" "../$file"; done
