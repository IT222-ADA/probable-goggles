<?php
abstract class Dumper{
    abstract public function dump($data);
}

class WebDumper extends Dumper{
    public function dump($data){
        echo'<pre>';
        var_dump($data);
        echo'</pre>';
    }
}

class ConsoleDumper extends Dumper{
    public function dump($data){
        var_dump($data);
    }
    
}

class DumperFactory{
    public static function getDumper(){
        return PHP_SAPI === 'cli' ? new ConsoleDumper() : new WebDumper();
    }
}

$webDumper = new WebDumper();
$webDumper->dump("HELLO IM HERE");

$console = new ConsoleDumper();
$console->dump('CONSOLE ME');

$dumper = DumperFactory::getDumper();
$dumper->dump("IM A LIVE");