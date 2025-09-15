<?php

class LoggeError
{
    private array $messages = [];

    public function add(string $message): void
    {
        $this->messages[] = $message;
    }

    public function show(): void
    {
        if (empty($this->messages)) {
            echo "Nenhum erro encontrado.<br>";
            return;
        }

        echo "<b>Erros:</b><br>";
        foreach ($this->messages as $msg) {
            echo "- " . $msg . "<br>";
        }
    }
}
