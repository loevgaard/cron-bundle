<?php

namespace Loevgaard\CronBundle\Entity;

use Cron\CronExpression;

interface JobInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     *
     * @return JobInterface
     */
    public function setId(int $id): self;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     *
     * @return JobInterface
     */
    public function setName(string $name): self;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @param string $description
     *
     * @return JobInterface
     */
    public function setDescription(string $description): self;

    /**
     * @return string
     */
    public function getCommand(): string;

    /**
     * @param string $command
     *
     * @return JobInterface
     */
    public function setCommand(string $command): self;

    /**
     * @return string
     */
    public function getArguments(): string;

    /**
     * @param string $arguments
     *
     * @return JobInterface
     */
    public function setArguments(string $arguments): self;

    /**
     * @return int
     */
    public function getIdleTimeout(): int;

    /**
     * @param int $idleTimeout
     *
     * @return JobInterface
     */
    public function setIdleTimeout(int $idleTimeout): self;

    /**
     * @return int
     */
    public function getTimeout(): int;

    /**
     * @param int $timeout
     *
     * @return JobInterface
     */
    public function setTimeout(int $timeout): self;

    /**
     * @return CronExpression
     */
    public function getCronExpression(): CronExpression;

    /**
     * @param CronExpression $cronExpression
     *
     * @return JobInterface
     */
    public function setCronExpression(CronExpression $cronExpression): self;

    /**
     * @return string
     */
    public function getLog(): string;

    /**
     * @param string $log
     *
     * @return JobInterface
     */
    public function setLog(string $log): self;

    /**
     * @return string
     */
    public function getErrorLog(): string;

    /**
     * @param string $errorLog
     *
     * @return JobInterface
     */
    public function setErrorLog(string $errorLog): self;

    /**
     * @return bool
     */
    public function isEnabled(): bool;

    /**
     * @param bool $enabled
     *
     * @return JobInterface
     */
    public function setEnabled(bool $enabled): self;

    /**
     * @return bool
     */
    public function isSingleProcess(): bool;

    /**
     * @param bool $singleProcess
     *
     * @return JobInterface
     */
    public function setSingleProcess(bool $singleProcess): self;

    /**
     * @return int
     */
    public function getPid(): int;

    /**
     * @param int $pid
     *
     * @return JobInterface
     */
    public function setPid(int $pid): self;
}
