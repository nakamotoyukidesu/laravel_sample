<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\Ramen;


use Illuminate\Support\Str;
use rameninfo\Application\Requests\ApiRequest;
use rameninfo\Application\Requests\Requests;
use rameninfo\Domain\Models\Ramen\Ramen;
use rameninfo\Domain\Models\Ramen\RamenAddress;
use rameninfo\Domain\Models\Ramen\RamenCategory;
use rameninfo\Domain\Models\Ramen\RamenId;
use rameninfo\Domain\Models\Ramen\RamenImage;
use rameninfo\Domain\Models\Ramen\RamenName;

final class RamenSaveRequest extends ApiRequest implements Requests
{

    public function rules(): array
    {
        return [];
    }

    public function saveRamen(): array
    {
        $ramens = array();
        if (!$this->hasFile('json_array')) {
            $ramens = [];
            $ramen = new Ramen(
                RamenId::of((string)Str::uuid()),
                RamenName::of($this->name),
                RamenCategory::of($this->category),
                RamenImage::of($this->image_url),
                RamenAddress::of($this->address)
            );
            $ramens[$ramen->ramen_id()->value()] = $ramen;
            return $ramens;
        }else{
            $json_php = file_get_contents($this->file('json_array')->getRealPath());
            $ramen_array = json_decode($json_php);
            foreach ($ramen_array as $ramen){
                $ramen_one = new Ramen(
                    RamenId::of((string)Str::uuid()),
                    RamenName::of($ramen->name),
                    RamenCategory::of($ramen->category),
                    RamenImage::of($ramen->image_url),
                    RamenAddress::of($ramen->address)
                );
                $ramens[$ramen_one->ramen_id()->value()]  = $ramen_one;
            }
            return $ramens;
        }
    }
}
