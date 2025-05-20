<?php

test('Register status code', function () {
    $response = $this->get('/register');
    $response->assertStatus(200);
});

// test to register a user with these fielsds name, email, password
