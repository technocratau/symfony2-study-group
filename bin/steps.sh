#!/bin/bash

# Step 1. Installing symfony
composer create-project symfony/framework-standard-edition lantern 2.7.*
cd lantern/

# Step 2. Generate LMS bundle
php app/console generate:bundle --namespace=Technocrat/LMSBundle 

# Step 3. Disable local check and modify twig template

# Step 4. Generating doctrene entities
php app/console doctrine:generate:entity --entity=TechnocratLMSBundle:Course
php app/console doctrine:generate:entity --entity=TechnocratLMSBundle:Unit

# Step 5. Rename db tables
php app/console doctrine:schema:update --force

# Step 6.
# 6.1 Add $units, constructor and OneToMany relationship to Course
# 6.2 Add $course, ManyToOne and JoinColumn relationships to Unit
php app/console doctrine:schema:update --force
php app/console doctrine:generate:entities Technocrat

# Step 7. Adding controllers
php app/console doctrine:generate:crud --entity=TechnocratLMSBundle:Course
php app/console doctrine:generate:crud --entity=TechnocratLMSBundle:Unit