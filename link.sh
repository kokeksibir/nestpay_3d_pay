find web -type f | while read file; do ln -s "$PWD/${file#./}" "../$file"; done
