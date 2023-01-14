<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Field Model
 *
 * @property int $id ID record
 * @property string $name Name field
 * @property string $code Code field
 * @property string $created_at Create date
 * @property string $updated_at Update date
 */
class Field extends Model
{
    use HasFactory;

    protected $table = 'fields';
}
