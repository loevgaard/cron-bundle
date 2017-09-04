<?php

namespace Loevgaard\CronBundle\Type;

use Cron\CronExpression;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class CronExpressionType extends Type
{
    const NAME = 'cron_expression';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    /**
     * @param string $value
     * @param AbstractPlatform $platform
     * @return CronExpression
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return CronExpression::factory($value);
    }

    /**
     * @param CronExpression $value
     * @param AbstractPlatform $platform
     * @return string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->getExpression();
    }

    public function getName()
    {
        return self::NAME; // modify to match your constant name
    }
}