<?php

namespace LaraAreaEmotion\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emotion
 * @package LaraAreaEmotion\Models
 */
class Emotion extends Model
{
    /**
     * @var array
     */
    public $fillable = [
        'position',
        'key',
        'name',
        'additional'
    ];

    /**
     * @var string
     */
    protected $using = Emotionable::class;

    /**
     * @param string $related
     * @param string $name
     * @param null $table
     * @param null $foreignPivotKey
     * @param null $relatedPivotKey
     * @param null $parentKey
     * @param null $relatedKey
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function morphedByMany($related, $name, $table = null, $foreignPivotKey = null, $relatedPivotKey = null, $parentKey = null, $relatedKey = null)
    {
        return parent::morphedByMany($related, $name, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey)
            ->using(Emotionable::class)
            ->withPivot(['user_id']);
    }
}