<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\Ramen;


use Illuminate\Foundation\Http\FormRequest;
use Psy\Util\Str;
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
        return [
        ];
    }

    public function saveRamen():array
    {
        if ($this->file('json') != null) {
            return [new Ramen(
                RamenId::of((string)Str::uuid()),
                RamenName::of($this->name),
                RamenCategory::of($this->category),
                RamenImage::of($this->image_url),
                RamenAddress::of($this->address)
            )];
        }else{
            $ramen_array = json_decode(file_get_contents($this->file('json')));
            $ramens = array();
            foreach ($ramen_array as $ramen){
                $ramens += new Ramen(
                    RamenId::of((string)Str::uuid()),
                    RamenName::of($ramen->name),
                    RamenCategory::of($ramen->category),
                    RamenImage::of($ramen->image_url),
                    RamenAddress::of($ramen->address)
                );
            }
            return $ramens;
        }
    }
}
