<?php


namespace rameninfo\Application\Usecases\Ramen;


use rameninfo\Domain\Models\Ramen\RamenRepository;

class ShowRamen
{
    private $ramenRepo;

    public function __construct(RamenRepository $ramenRepository)
    {
        $this->ramenRepo = $ramenRepository;
    }

    public function __invoke()
    {
        return $this->ramenRepo->show();
    }
}
