<?php


namespace Larabill\Sms;

use Exception;
use Larabill\Helper\SmsHelper;

class SmsMessage
{
    protected array $lines;
    private string $to;

    public function to($to): SmsMessage
    {
        $this->to = $to;
        return $this;
    }

    public function line($line = ''): SmsMessage
    {
        $this->lines[] = $line;
        return $this;
    }

    /**
     * @throws Exception
     */
    public function send()
    {
        if (!$this->to || !count($this->lines)) {
            throw new Exception('SMS not correct.');
        }

        SmsHelper::send(['mobile' => $this->to, 'message' => collect($this->lines)->join("\n", "")]);
    }
}
