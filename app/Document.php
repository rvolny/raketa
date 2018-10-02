<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Document
 *
 * @property int $id
 * @property int $list_document_types_id
 * @property string $scan_front_path
 * @property string|null $scan_back_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereListDocumentTypesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanBackPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereScanFrontPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Document extends Model
{
    //
}
