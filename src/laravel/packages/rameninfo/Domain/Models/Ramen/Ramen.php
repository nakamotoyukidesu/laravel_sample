<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\Ramen;


final class Ramen
{
    private $ramen_id;

    private $name;

    private $category;

    private $image_url;

    private $address;

    public function __construct
    (
        RamenId $ramen_id,
        RamenName $name,
        RamenCategory $category,
        RamenImage $image,
        RamenAddress $address
    )
    {
        $this->ramen_id = $ramen_id;
        $this->name = $name;
        $this->category = $category;
        $this->image_url = $image;
        $this->address = $address;
    }

    public function ramen_id() : RamenId{
        return $this->ramen_id;
    }

    public function name() : RamenName{
        return $this->name;
    }

    public function category() : RamenCategory{
        return $this->category;
    }

    public function image_url() : RamenImage{
        return $this->image_url;
    }

    public function address() : RamenAddress{
        return $this->address;
    }

    public function toArray(){
        return [
            'ramen_id' => $this->ramen_id->value(),
            'name' => $this->name->value(),
            'category' => $this->category->value(),
            'image_url' => $this->image_url->value(),
            'address' => $this->address->value(),
        ];
    }

}
