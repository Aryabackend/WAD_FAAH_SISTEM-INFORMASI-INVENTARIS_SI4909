<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_homepage_redirects_to_supplier_page(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('supplier.index'));
    }
}
