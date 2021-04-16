<?php


namespace rameninfo\Application\Usecases\Ramen;


use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use rameninfo\Domain\Models\Ramen\RamenId;
use rameninfo\Domain\Models\Ramen\RamenRepository;

final class FindRamen
{
    private $ramenRepo;

    public function __construct(RamenRepository $ramenRepository)
    {
        $this->ramenRepo = $ramenRepository;
    }

    public function __invoke(string $ramenId)
    {
        return $this->ramenRepo->find($ramenId);
    }
}
