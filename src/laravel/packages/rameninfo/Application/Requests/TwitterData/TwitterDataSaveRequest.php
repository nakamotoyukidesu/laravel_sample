<?php

declare(strict_types=1);

namespace rameninfo\Application\Requests\TwitterData;


use rameninfo\Application\Requests\ApiRequest;
use rameninfo\Application\Requests\Requests;
use rameninfo\Domain\Models\TwitterData\AccountName;
use rameninfo\Domain\Models\TwitterData\SearchQuery;
use rameninfo\Domain\Models\TwitterData\RamenId;
use rameninfo\Domain\Models\TwitterData\TwitterData;
use rameninfo\Domain\Models\TwitterData\TwitterId;

final class TwitterDataSaveRequest extends ApiRequest implements Requests
{

    public function rules(): array
    {
        return [];
    }

    public function saveTwitterData(array $ramen): array
    {
        $data_array = array();
        if (!$this->hasFile('json_array')){
            foreach ($ramen as $ramen_one){
                $twitter_data = new TwitterData(
                    RamenId::of($ramen_one->ramen_id()->value()),
                    TwitterId::of($this->twitter_id),
                    SearchQuery::of($this->search_query),
                    AccountName::of($this->account_name)
                );
                $data_array[$twitter_data->twitter_id()->value()];
            }
            return $data_array;
//            Ramenモデルのramen_idプロパティをtwitterdataのramen_idにセットしないと
        }else{
            $json_php = file_get_contents($this->file('json_array')->getRealPath());
            $twitter_data_array = json_decode($json_php);
        }
    }

}
