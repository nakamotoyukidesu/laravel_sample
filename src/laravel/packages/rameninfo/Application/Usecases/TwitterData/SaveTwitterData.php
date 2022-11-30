<?php

declare(strict_types=1);

namespace rameninfo\Application\Usecases\TwitterData;

use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use rameninfo\Domain\Models\TwitterData\TwitterData;
use rameninfo\Domain\Models\TwitterData\TwitterDataRepository;
use Throwable;

final class SaveTwitterData
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
            $this->twitterdataRepo->save($twitterData);
            DB::commit();
        }
        catch (Throwable $e){
            report($e);
            DB::rollBack();
        }

        return $twitterData;

    }
}
