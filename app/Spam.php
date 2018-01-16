<?php

namespace App;

class Spam
{
    public function detect($body)
    {
         $this->detectInvalidKeyWords($body);

        $this->detectKeyHeldDown($body);

         return false;
    }

    protected function detectInvalidKeyWords($body)
    {
        $invalidKeyWords = [
            'yahoo customer support',
        ];

        foreach ($invalidKeyWords as $keyWord)
        {
            if(stripos($body, $keyWord) !== false)
            {
                throw new \Exception('Your reply contains spam');
            }
        }
    }

    protected function detectKeyHeldDown($body)
    {
        if(preg_match('/(.)\\1{4,}/', $body))
        {
            throw new \Exception('Your reply contains spam');
        }
    }
}