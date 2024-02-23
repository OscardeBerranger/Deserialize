<?php

namespace Core\Serializer;

class Serializer
{
    public static function serialize($toSerialize)
    {
        //$serialized = json_encode($toSerialize);
        //status http
        //interfae sérializable
        //serializable sur entité direct
        echo (json_encode($toSerialize));
    }

    public static function deserialize($toDeserialize, $type, string $format){
        $entity = new $type;
        $classType = new \ReflectionClass($type);
        $methods = $classType->getMethods();
        $usableMethod = [];
        foreach ($methods as $method){
            if (strtolower(substr($method->getName(), 0, 3)) === "set"){
                $usableMethod[]=$method;
            }
        }
        //foreach dans foreach ou changer le sens
        foreach ($usableMethod as $method){
            $supposedProperty = substr($method->getName(), 3);
        }
//        var_dump($usableMethod);
        die();
        return null;
    }
}