<?php

namespace LaraAreaEmotion\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

/**
 * Class Emotionable
 * @package LaraAreaEmotion\Models
 */
class Emotionable extends MorphPivot
{
    /**
     * @var string
     */
    protected $table = 'emotionable';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @param Model $parent
     * @param array $attributes
     * @param string $table
     * @param bool $exists
     * @return MorphPivot
     */
    public static function fromAttributes(Model $parent, $attributes, $table, $exists = false)
    {
        $instance = parent::fromAttributes($parent, $attributes, $table, $exists);
        $instance->fixTimestampsColumns($attributes);
        return $instance;
    }

    /**
     * @param Model $parent
     * @param array $attributes
     * @param string $table
     * @param bool $exists
     * @return MorphPivot
     */
    public static function fromRawAttributes(Model $parent, $attributes, $table, $exists = false)
    {
        $instance = parent::fromRawAttributes($parent, $attributes, $table, $exists);
        $instance->fixTimestampsColumns($attributes);
        return $instance;
    }

    /**
     * @TODO
     * @param $attributes
     */
    protected function fixTimestampsColumns($attributes)
    {
        if ($this->timestamps) {
            if (! key_exists($this->getCreatedAtColumn(), $attributes)) {
                unset($this->attributes[$this->getCreatedAtColumn()]);
            }
            if (! key_exists($this->getUpdatedAtColumn(), $attributes)) {
                unset($this->attributes[$this->getUpdatedAtColumn()]);
            }
            $this->syncOriginal();
        }
    }
}
