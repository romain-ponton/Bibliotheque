<?php

test('Home status code', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

// test that this text 'Les derniers livres ajoutés' is present in the page case insensitive
test('home page has last books', function () {
    $response = $this->get('/');
    $response->assertSeeText('Les derniers livres ajoutés', false, true);
});
// test if  an html element with class 'content-container' is present in the page
test('home page has content container', function () {
    $response = $this->get('/');
    $response->assertSee('<div class="content-container">', false, true);
});

