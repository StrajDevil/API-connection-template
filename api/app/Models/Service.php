<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Service Model
 *
 * @property int $id ID record
 * @property string $name Name service
 * @property string $code Code service
 * @property string $created_at Create date
 * @property string $updated_at Update date
 */
class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    /**
     * Get fields from service with type field
     *
     * @return BelongsToMany
     */
    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(
                Field::class,
                'service_field',
                'serviceID',
                'fieldID'
            )
            ->select([
                'fields.*',
                'typeFields.code as type'
            ])
            ->join('typeFields', 'typeFields.id', '=', 'typeFieldID');
    }
}
