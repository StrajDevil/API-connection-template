<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Type Field Model
 *
 * @property int $id ID record
 * @property string $name Name type field
 * @property string $code Code type field
 * @property string $created_at Create date
 * @property string $updated_at Update date
 */
class TypeField extends Model
{
    use HasFactory;

    protected $table = 'typeFields';
}
