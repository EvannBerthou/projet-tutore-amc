<?php

namespace App\Entity;

abstract class QuestionTypeEnum {
    const TYPE_SIMPLE = 'simple';
    const TYPE_MULTIPLE = 'multiple';
    const TYPE_OUVERTE = 'ouverte';

    protected static $typeName = [
        self::TYPE_SIMPLE => 'Simple',
        self::TYPE_MULTIPLE => 'Multiple',
        self::TYPE_OUVERTE => 'Ouverte',
    ];

    public static function getTypeName($typeShortName) {
        if (!isset(static::$typeName[$typeShortName])) {
            return "Unknown type ($typeShortName)";
        }

        return static::$typeName[$typeShortName];
    }

    public static function getAvailableTypes() {
        return [self::TYPE_SIMPLE, self::TYPE_MULTIPLE, self::TYPE_OUVERTE];
    }
}
