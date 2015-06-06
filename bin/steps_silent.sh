#!/bin/bash

# Step 1. Installing symfony
composer create-project symfony/framework-standard-edition lantern 2.7.*
cd lantern/

# Step 2. Generate LMS bundle
php app/console generate:bundle --namespace=Technocrat/LMSBundle --format=yml --no-interaction

# Step 3. Disable local check and modify twig template

# Step 4. Generating doctrene entities: corse and unit
php app/console doctrine:generate:entity --entity=TechnocratLMSBundle:Course --format=yml --fields="name:string(255)" --with-repository --no-interaction
php app/console doctrine:generate:entity --entity=TechnocratLMSBundle:Unit --format=yml --fields="title:string(255) number:integer date_starts:date" --with-repository --no-interaction

# Step 5. Rename db tables
php app/console doctrine:schema:update --force

# Step 6.
# 6.1 Add $units, constructor and OneToMany relationship to Course
# 6.2 Add $course, ManyToOne and JoinColumn relationships to Unit
php app/console doctrine:schema:update --force
php app/console doctrine:generate:entities Technocrat

# Step 7. Adding controllers
php app/console doctrine:generate:crud --entity=TechnocratLMSBundle:Course --route-prefix=course --with-write --format=yml --no-interaction
php app/console doctrine:generate:crud --entity=TechnocratLMSBundle:Unit --route-prefix=unit --with-write --format=yml --no-interaction

# Step 8. Add __toString() to Course.php
