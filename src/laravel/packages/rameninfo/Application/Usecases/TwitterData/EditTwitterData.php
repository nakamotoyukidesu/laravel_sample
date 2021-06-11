<?php

declare(strict_types=1);

namespace rameninfo\Application\Usecases\TwitterData;


use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use rameninfo\Domain\Models\TwitterData\TwitterData;
use rameninfo\Domain\Models\TwitterData\TwitterDataRepository;

final class EditTwitterData
{
    private $twitterdataRepo;

    public function __construct(TwitterDataRepository $twitterDataRepository)
    {
        $this->twitterdataRepo = $twitterDataRepository;
    }

    public function __invoke(TwitterData $twitterData)
    {
        DB::beginTransaction();
        try {
            $this->twitterdataRepo->edit($twitterData);
            DB::commit();
        }
        catch (Exception $e){
            report($e);
            DB::rollBack();
        }

        return $twitterData;
    }
}
