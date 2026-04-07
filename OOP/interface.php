<?php

interface logger{
    public function log($message);
}
class FileLogger implements Logger{
    private $handle;
    private $logFile;

    public function __construct($filename, $mode='a')
    {
        $this->logFile = $filename;
        $this->handle = fopen($filename, $mode) or die("could not open the log file");
    }

    public function log($message){
        $message = date('F j, Y, g:i a'). ': '. $message . "\n";
        fwrite($this->handle, $message);
    }

    public function __destruct()
    {
        if($this->handle){
            fclose($this->handle);
        }
    }
}
class DatabaseLogger implements Logger{
    public function log($message){
        echo sprintf("Log - %s - to the database\n", $message);
    }
}

$logger = new FileLogger('log.txt', 'w');
$logger->log('IT222 PHP logging in');
$logger->log('IT222 PHP logging out');
$loggers = [new FileLogger('log.txt'),new DatabaseLogger()];

foreach($loggers as $log){
    $log->log('log message');
    echo '<br>';
    $log->log('john');
}