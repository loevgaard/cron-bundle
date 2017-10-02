<?php

namespace Loevgaard\CronBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ValidCronExpression extends Constraint
{
    public $message = 'The string "{{ string }}" is not a valid cron expression.';
}
