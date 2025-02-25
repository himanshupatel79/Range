Collision Detection - PHP Script

Author: Himanshu Patel
File Name: collision_detection.php
Created on: 25th February 2025

## Overview
This PHP script is designed to detect collisions between different shapes like rectangles and circles in 2D and 3D space. It checks if any two shapes in a set overlap and prints the detected collisions.

## Requirements

PHP 7.4 or later
PHPUnit (only if you want to run the tests)
Installation

** Ensure PHP is installed: **
Run php -v to check if PHP is installed.
If PHP is not installed, download and install it from https://www.php.net/downloads.

** Install PHPUnit (optional for running tests): **
If you want to run tests, use Composer to install PHPUnit:
composer require --dev phpunit/phpunit

## Usage

Save the script as collision_detection.php.
Run the script with the command:
php collision_detection.php

## How It Works

The script defines a Shape class that represents rectangles and circles.
The checkCollision() function checks if two shapes overlap.
The detectCollisions() function loops over the shapes and checks for collisions.
Example Output


Array
(
    [0] => Shape 0 collides with Shape 1
    [1] => Shape 3 collides with Shape 4
    [2] => Shape 5 collides with Shape 6
)
##Running Tests
To run tests, use the following command (if PHPUnit is installed):
phpunit CollisionDetectionTest.php

## Supported Features

Collision detection for rectangles and circles.
3D collision detection if depth values are provided.

## Troubleshooting
If PHP is not installed, download it from the official site.
If you see the "Class TestCase not found" error while running tests, ensure you're using:
use PHPUnit\Framework\TestCase;
If you installed PHPUnit using Composer, run tests with:
vendor/bin/phpunit CollisionDetectionTest.php

## License
This script is open-source and can be freely modified and distributed.
