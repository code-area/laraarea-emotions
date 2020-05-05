<?php

namespace LaraAreaEmotion\Models\Traits;

use App\Models\Web\Emotion;
use LaraAreaEmotion\Models\Emotionable;

trait EmotionableTrait
{
    public function emotions()
    {
        return $this->morphToMany(Emotion::class, 'emotionable')
            ->using(Emotionable::class)
            ->withPivot(['user_id']);
    }

    /**
     * Create new reaction with Reactor to Reactable
     *
     * @param  $context
     * @param  $reactable
     * @return mixed
     */
    public function emotion($emotionId, $userId)
    {
        $emotionable = (new Emotionable())->create([
            'emotionable_type' =>  $this->getMorphClass(),
            'emotionable_id' =>  $this->getKey(),
            'emotion_id' =>  $emotionId,
            'user_id' =>  $userId,
        ]);

        return $emotionable;
    }

}
