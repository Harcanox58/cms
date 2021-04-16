<?php

class CHash
{

    public function Hash($data)
    {
        $hash = self::hashGostCrypto(self::hashGost(self::hashSnefru(self::hashSha512(self::hashSha1(self::hashMd5(($data)))))));
        return $hash;
    }
    private function hashMd5($data)
    {
        $hash = hash_init('md5', HASH_HMAC, '594f1fb93097a');
        hash_update($hash, $data);
        return hash_final($hash);
    }
    private function hashSha1($data)
    {
        $hash = hash_init('sha1', HASH_HMAC, '594f1fb93097a');
        hash_update($hash, $data);
        return hash_final($hash);
    }
    private function hashSnefru($data)
    {
        $hash = hash_init('snefru', HASH_HMAC, '594f1fb93097a');
        hash_update($hash, $data);
        return hash_final($hash);
    }
    private function hashSha512($data)
    {
        $hash = hash_init('sha1', HASH_HMAC, '594f1fb93097a');
        hash_update($hash, $data);
        return hash_final($hash);
    }
    private function hashGost($data)
    {
        $hash = hash_init('gost', HASH_HMAC, '594f1fb93097a');
        hash_update($hash, $data);
        return hash_final($hash);
    }
    private function hashGostCrypto($data)
    {
        $hash = hash_init('gost-crypto', HASH_HMAC, '594f1fb93097a');
        hash_update($hash, $data);
        return hash_final($hash);
    }
}
