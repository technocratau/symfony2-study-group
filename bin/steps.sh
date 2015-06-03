#!/bin/bash

# Step 1. Installing symfony
composer create-project symfony/framework-standard-edition lantern 2.7.*
cd lantern/

# Step 2. Generate LMS bundle
php app/console generate:bundle --namespace=Technocrat/LMSBundle 

# Step 3. Disable local check and modify twig template