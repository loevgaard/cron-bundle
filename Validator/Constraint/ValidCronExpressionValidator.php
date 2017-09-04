<?php

namespace Loevgaard\CronBundle\Constraints;

use Cron\CronExpression;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ContainsAlphanumericValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        try {
            CronExpression::factory($value);
        } catch (\InvalidArgumentException $e) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}