<?php

namespace App\Traits;

use Hashids\Hashids;

trait HashId
{
    public function getHashedIdAttribute()
    {
        $hashids = new Hashids(env('APP_KEY', 'your-secret-key'), 10);
        return $hashids->encode($this->id);
    }

    public static function decodeHash($hash)
    {
        $hashids = new Hashids(env('APP_KEY', 'your-secret-key'), 10);
        $decoded = $hashids->decode($hash);
        return !empty($decoded) ? $decoded[0] : null;
    }
}
