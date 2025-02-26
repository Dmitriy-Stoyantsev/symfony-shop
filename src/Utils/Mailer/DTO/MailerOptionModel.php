<?php

declare(strict_types=1);

namespace App\Utils\Mailer\DTO;

class MailerOptionModel
{
    /**
     * @var string
     */
    private $recipient;

    /**
     * @var string|null
     */
    private $cc;

    /**
     * @var string
     */
    private $subject;

    /**
     * @var string
     */
    private $htmlTemplate;

    /**
     * @var array
     */
    private $context;

    /**
     * @var string
     */
    private $text;

    public function getRecipient(): string
    {
        return $this->recipient;
    }

    public function setRecipient(string $recipient): MailerOptionModel
    {
        $this->recipient = $recipient;

        return $this;
    }

    public function getCc(): ?string
    {
        return $this->cc;
    }

    public function setCc(string $cc): MailerOptionModel
    {
        $this->cc = $cc;

        return $this;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): MailerOptionModel
    {
        $this->subject = $subject;

        return $this;
    }

    public function getHtmlTemplate(): string
    {
        return $this->htmlTemplate;
    }

    public function setHtmlTemplate(string $htmlTemplate): MailerOptionModel
    {
        $this->htmlTemplate = $htmlTemplate;

        return $this;
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function setContext(array $context): MailerOptionModel
    {
        $this->context = $context;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): MailerOptionModel
    {
        $this->text = $text;

        return $this;
    }
}
