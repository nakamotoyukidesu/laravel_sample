<?php

declare(strict_types=1);

namespace rameninfo\Application\Usecases\TwitterData;


use rameninfo\Domain\Models\TwitterData\TwitterDataRepository;

final class DeleteTwitterData
{
    private $twitterRepo;

    public function __construct(TwitterDataRepository $twitterDataRepository)
    {
        $this->twitterRepo = $twitterDataRepository;
    }

    public function __invoke(string $twitterId = null)
    {
        return $this->twitterRepo->delete($twitterId);
    }
}
