<?php

namespace App\Http\Traits;

trait TextHelperTrait
{
    public function getAbbreviatedNameAttribute()
    {
        $wordsInName = explode(' ', $this->name);

        if (sizeof($wordsInName) > 2) {
            $wordsInName = array_slice($wordsInName, 0, 2);
        }

        $acronym = '';

        foreach ($wordsInName as $word) {
            $acronym .= mb_substr($word, 0, 1);
        }

        return $acronym;
    }
}
