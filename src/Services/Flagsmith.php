<?php
namespace Menezes\LaravelFlagsmith\Services;

use Flagsmith\Flagsmith as FS;
use Flagsmith\Models\Flags;
use Illuminate\Support\Facades\App;

abstract class Flagsmith {

    private static $flags;

    private static $identity_flags;

    public static function conn() {
        return App::make(FS::class);
    }

    private static function getIdentityFlags(string $identifier = null): Flags {
        if (!self::$identity_flags) {
           self::$identity_flags = self::conn()->getIdentityFlags($identifier);
        }

        return self::$identity_flags;
    }

    public static function isIdentityEnabled(string $feature, string $identifier = null): bool {
        $flags = self::getIdentityFlags($identifier);
        return $flags->isFeatureEnabled($feature);
    }

    public static function getIdentityValue(string $feature, string $identifier = null) {
        $flags = self::getIdentityFlags($identifier);
        return $flags->getFeatureValue($feature);
    }


    private static function getFlags(): Flags {
        if (!self::$flags) {
            self::$flags = self::conn()->getEnvironmentFlags();
        }

        return self::$flags;
    }

    public static function isEnabled(string $feature, string $identifier = null): bool {
        $flags = self::getFlags($identifier);
        return $flags->isFeatureEnabled($feature);
    }

    public static function getValue(string $feature, string $identifier = null) {
        $flags = self::getFlags($identifier);
        return $flags->getFeatureValue($feature);
    }

}