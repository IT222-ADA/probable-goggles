<?php

class file{
    private $fileName;

    private $handle;
    
    public function __construct($fileName,$mode = 'r')
    {
        $this->fileName = $fileName;
        $this->handle = fopen($this->fileName,$mode);
    }

    public function __destruct()
    {
        if($this->handle){
            fclose($this->handle);
        }
    }

    public function read(){
        return fread($this->handle,filesize($this->fileName));
    }

    public function delete(){
        if(file_exists($this->fileName)){
            unlink($this->fileName);
        }
    }

    public function write($data){
        if($this->fileName){
            file_put_contents($this->fileName,$data);
        }
    }
}

$f = new file('sample.txt');
echo $f->read();
echo $f->write('Hello World! IM JOHN');
// $x = new file('images.jpg');
// header('Content-Type: image/jpg');
// echo $x->read();
// echo $x->delete();
