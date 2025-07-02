# Use official PHP image
FROM php:8.2-cli

# Set working directory
WORKDIR /app

# Copy all files into the container
COPY . .

# Expose the port Render will use
EXPOSE 10000

# Start PHP server on port 10000 (Render requires this port)
CMD ["php", "-S", "0.0.0.0:10000"]
