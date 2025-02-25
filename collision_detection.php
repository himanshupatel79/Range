<?php

/**
 * Author: Himanshu Patel
 * File: collision_detection.php
 * Created: 2025-02-25
 * Description: Contains the logic for collision detection between different shapes (rectangles, circles, and 3D shapes).
 * The solution is scalable and can be easily extended to support additional shapes or more complex collision logic.
 */

class Shape {
    public $x, $y, $z, $width, $height, $depth, $type;

    /**
     * Shape constructor to initialize the shape's properties.
     *
     * @param int $x The x-coordinate of the shape.
     * @param int $y The y-coordinate of the shape.
     * @param int $width The width of the shape.
     * @param int $height The height of the shape.
     * @param string $type The type of the shape (rectangle or circle).
     * @param int $z The z-coordinate for 3D shapes (default 0).
     * @param int $depth The depth of the shape (default 0).
     */
    public function __construct($x, $y, $width, $height, $type = 'rectangle', $z = 0, $depth = 0) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
        $this->type = $type;
    }
}

/**
 * Function to check if two shapes are colliding.
 *
 * @param Shape $shape1 The first shape.
 * @param Shape $shape2 The second shape.
 * @return bool Returns true if the shapes collide, false otherwise.
 */
function checkCollision($shape1, $shape2) {
    // Rectangle to Rectangle collision (2D)
    if ($shape1->type === 'rectangle' && $shape2->type === 'rectangle') {
        return !(
            $shape1->x + $shape1->width <= $shape2->x ||
            $shape2->x + $shape2->width <= $shape1->x ||
            $shape1->y + $shape1->height <= $shape2->y ||
            $shape2->y + $shape2->height <= $shape1->y
        );
    }

    // Circle to Circle collision (2D)
    if ($shape1->type === 'circle' && $shape2->type === 'circle') {
        $dx = $shape1->x - $shape2->x;
        $dy = $shape1->y - $shape2->y;
        $distance = sqrt($dx * $dx + $dy * $dy);
        return $distance < ($shape1->width + $shape2->width) / 2;
    }

    // Rectangle to 3D Rectangle collision (3D)
    if ($shape1->type === 'rectangle' && $shape2->type === 'rectangle' && $shape1->depth > 0 && $shape2->depth > 0) {
        return !(
            $shape1->z + $shape1->depth <= $shape2->z ||
            $shape2->z + $shape2->depth <= $shape1->z
        );
    }

    // No collision detected
    return false;
}

/**
 * Function to detect collisions between a list of shapes.
 *
 * @param array $shapes An array of Shape objects.
 * @return array An array of collision messages.
 */
function detectCollisions($shapes) {
    $collisions = [];

    // Efficient collision detection using nested loop
    for ($i = 0; $i < count($shapes); $i++) {
        for ($j = $i + 1; $j < count($shapes); $j++) {
            if (checkCollision($shapes[$i], $shapes[$j])) {
                $collisions[] = "Shape $i collides with Shape $j";
            }
        }
    }
    return $collisions;
}

// Example shapes for collision detection
$shapes = [
    new Shape(0, 0, 5, 5),      // Rectangle
    new Shape(4, 4, 5, 5),      // Rectangle
    new Shape(10, 10, 3, 3),    // Rectangle
    new Shape(2, 2, 2, 2, 'circle'),    // Circle
    new Shape(3, 3, 2, 2, 'circle'),    // Circle
    new Shape(1, 1, 4, 4, 'rectangle', 1, 3),    // 3D Rectangle
    new Shape(2, 2, 4, 4, 'rectangle', 2, 3)     // 3D Rectangle
];

// Detect collisions and print the results
$collisions = detectCollisions($shapes);
print_r($collisions);
