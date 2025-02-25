<?php

/**
 * Author: Himanshu Patel
 * File: CollisionDetectionTest.php
 * Created: 2025-02-25
 * Description: PHPUnit test cases to validate the collision detection logic for various shape types.
 * This includes testing for rectangles, circles, and 3D rectangles.
 * The tests cover basic and edge case scenarios.
 */

use PHPUnit\Framework\TestCase; // Import the TestCase class
require_once 'collision_detection.php'; // Include the main collision detection logic file

class CollisionDetectionTest extends TestCase {

    /**
     * Test case for rectangle to rectangle collision detection.
     */
    public function testRectangleCollision() {
        $shape1 = new Shape(0, 0, 5, 5);   // Rectangle 1
        $shape2 = new Shape(4, 4, 5, 5);   // Rectangle 2 (touching Rectangle 1)

        // Assert that the two rectangles collide
        $this->assertTrue(checkCollision($shape1, $shape2));
    }

    /**
     * Test case for no rectangle to rectangle collision.
     */
    public function testNoRectangleCollision() {
        $shape1 = new Shape(0, 0, 5, 5);   // Rectangle 1
        $shape2 = new Shape(10, 10, 5, 5); // Rectangle 2 (far from Rectangle 1)

        // Assert that the two rectangles do not collide
        $this->assertFalse(checkCollision($shape1, $shape2));
    }

    /**
     * Test case for circle to circle collision detection.
     */
    public function testCircleCollision() {
        $shape1 = new Shape(2, 2, 2, 2, 'circle');  // Circle 1
        $shape2 = new Shape(3, 3, 2, 2, 'circle');  // Circle 2 (colliding with Circle 1)

        // Assert that the two circles collide
        $this->assertTrue(checkCollision($shape1, $shape2));
    }

    /**
     * Test case for no circle to circle collision.
     */
    public function testNoCircleCollision() {
        $shape1 = new Shape(0, 0, 2, 2, 'circle');  // Circle 1
        $shape2 = new Shape(10, 10, 2, 2, 'circle'); // Circle 2 (far from Circle 1)

        // Assert that the two circles do not collide
        $this->assertFalse(checkCollision($shape1, $shape2));
    }

    /**
     * Test case for rectangle to 3D rectangle collision detection.
     */
    public function test3DRectangleCollision() {
        $shape1 = new Shape(1, 1, 4, 4, 'rectangle', 1, 3); // 3D Rectangle 1
        $shape2 = new Shape(2, 2, 4, 4, 'rectangle', 2, 3); // 3D Rectangle 2 (colliding with 3D Rectangle 1)

        // Assert that the two 3D rectangles collide
        $this->assertTrue(checkCollision($shape1, $shape2));
    }

    /**
     * Test case for no 3D rectangle to 3D rectangle collision.
     */
    public function testNo3DRectangleCollision() {
        $shape1 = new Shape(1, 1, 4, 4, 'rectangle', 1, 3);  // 3D Rectangle 1
        $shape2 = new Shape(10, 10, 4, 4, 'rectangle', 1, 3); // 3D Rectangle 2 (far from 3D Rectangle 1)

        // Assert that the two 3D rectangles do not collide
        $this->assertFalse(checkCollision($shape1, $shape2));
    }

    /**
     * Test case for shape inside another shape (edge case).
     */
    public function testShapeInsideAnotherShape() {
        $shape1 = new Shape(0, 0, 10, 10);   // Larger rectangle (shape 1)
        $shape2 = new Shape(2, 2, 3, 3);    // Smaller rectangle inside larger rectangle (shape 2)

        // Assert that the smaller rectangle is inside the larger one, hence no collision
        $this->assertTrue(checkCollision($shape1, $shape2));
    }

    /**
     * Test case for shapes that touch but do not collide (edge case).
     */
    public function testShapesTouchingNoCollision() {
        $shape1 = new Shape(0, 0, 5, 5);   // Rectangle 1
        $shape2 = new Shape(5, 5, 5, 5);   // Rectangle 2 (touching Rectangle 1)

        // Assert that the two rectangles are touching but do not collide
        $this->assertFalse(checkCollision($shape1, $shape2));
    }
}

