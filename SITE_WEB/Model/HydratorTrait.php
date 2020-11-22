<?php


namespace App\Model;


trait HydratorTrait
{

    public function hydrate(array $data)
    {

        foreach ($data as $key => $value) {
            $words = explode("_",$key);
            $upperWords = array_map("ucfirst", $words);
            $key = implode("",$upperWords);
            $method = 'set' . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}