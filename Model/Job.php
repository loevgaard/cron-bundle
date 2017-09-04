<?php

namespace Loevgaard\CronBundle\Model;

use Cron\CronExpression;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Loevgaard\CronBundle\Validator\Constraints\ValidCronExpression;

/**
 * @ORM\MappedSuperclass
 */
abstract class Job implements JobInterface
{
    /**
     * @var mixed
     */
    protected $id;

    /**
     * The name of the job. Only used as a reference
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="191")
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $name;

    /**
     * Description of the job. Only used as a reference
     *
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="191")
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $command;

    /**
     * @var string
     *
     * @Assert\Length(max="191")
     *
     * @ORM\Column(type="string", length=191, nullable=true)
     */
    protected $arguments;

    /**
     * @var int
     *
     * @Assert\GreaterThanOrEqual(0)
     *
     * @ORM\Column(type="int")
     */
    protected $idleTimeout;

    /**
     * @var int
     *
     * @Assert\GreaterThanOrEqual(0)
     *
     * @ORM\Column(type="int")
     */
    protected $timeout;

    /**
     * @var CronExpression
     *
     * @Assert\NotBlank()
     * @ValidCronExpression
     *
     * @ORM\Column(type="cron_expression")
     */
    protected $cronExpression;

    /**
     * The output log
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="191")
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $log;

    /**
     * The error log
     *
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="191")
     *
     * @ORM\Column(type="string", length=191)
     */
    protected $errorLog;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $enabled;

    // @todo create property for setting a 'singleton' job

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setName(string $name) : JobInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @inheritdoc
     */
    public function setDescription(string $description) : JobInterface
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * @inheritdoc
     */
    public function setCommand(string $command) : JobInterface
    {
        $this->command = $command;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getArguments(): string
    {
        return $this->arguments;
    }

    /**
     * @inheritdoc
     */
    public function setArguments(string $arguments) : JobInterface
    {
        $this->arguments = $arguments;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getIdleTimeout(): int
    {
        return $this->idleTimeout;
    }

    /**
     * @inheritdoc
     */
    public function setIdleTimeout(int $idleTimeout) : JobInterface
    {
        $this->idleTimeout = $idleTimeout;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @inheritdoc
     */
    public function setTimeout(int $timeout) : JobInterface
    {
        $this->timeout = $timeout;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCronExpression(): CronExpression
    {
        return $this->cronExpression;
    }

    /**
     * @inheritdoc
     */
    public function setCronExpression(CronExpression $cronExpression) : JobInterface
    {
        $this->cronExpression = $cronExpression;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLog(): string
    {
        return $this->log;
    }

    /**
     * @inheritdoc
     */
    public function setLog(string $log) : JobInterface
    {
        $this->log = $log;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getErrorLog(): string
    {
        return $this->errorLog;
    }

    /**
     * @inheritdoc
     */
    public function setErrorLog(string $errorLog) : JobInterface
    {
        $this->errorLog = $errorLog;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @inheritdoc
     */
    public function setEnabled(bool $enabled) : JobInterface
    {
        $this->enabled = $enabled;
        return $this;
    }
}
