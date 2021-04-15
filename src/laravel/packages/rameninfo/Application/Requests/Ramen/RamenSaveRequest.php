<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\Ramen;


use ArrayObject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
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
        return [
        ];
    }

    public function saveRamen(): array
    {
        $ramens = array();
        if ($this->file('json') == null) {
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
            Log::info('ここからファイル読み込み');
            Log::info((string)$this->file('json'));
//            $json_php = file_get_contents($_FILES['json']);
//            $ramen_array = json_decode($_FILES['json']);
            dd($this->file('json'));
            $ramen_array = $_FILES['json'];
            dd($ramen_array);
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
