<?php

namespace App\Models;

use Database\Factories\TicketRegistrationFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['full_name', 'student_email', 'phone', 'ticket_quantity', 'ticket_category'])]
class TicketRegistration extends Model
{
    /** @use HasFactory<TicketRegistrationFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'ticket_quantity' => 'integer',
        ];
    }
}
