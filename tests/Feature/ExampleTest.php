<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_ticket_registration_form_is_displayed(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Formulir pendaftaran')
            ->assertSee('Nama mahasiswa')
            ->assertSee('Student Email')
            ->assertSee('Nomor WhatsApp')
            ->assertSee('Pilih kategori tiket')
            ->assertSee('type="submit"', false);
    }
}
