<?php

declare(strict_types=1);

namespace rameninfo\Application\Usecases\Ramen;


use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use rameninfo\Domain\Models\Ramen\Ramen;
use rameninfo\Domain\Models\Ramen\RamenRepository;

final class SaveRamen
{
    private $ramenRepo;

    public function __construct(RamenRepository $ramenRepository)
    {
        $this->ramenRepo = $ramenRepository;
    }

    public function __invoke(Ramen $ramen):Ramen
    {
        DB::beginTransaction();
        try {
            $this->ramenRepo->save($ramen);
            DB::commit();
        }
        catch (Exception $e){
            report($e);
            DB::rollBack();
        }

        return $ramen;
    }
}
