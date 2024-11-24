<?php

test('the page loads', function () {
    $this->get(route('index'))
        ->assertOk()
        ->assertViewIs('index');
});
