<?php

declare(strict_types=1);

namespace rameninfo\Domain\Models\Ramen;

use rameninfo\Domain\Models\TwitterData\TwitterData;

interface RamenRepository {

    public function save(Ramen $ramen);

    public function find(string $ramenId);

    public function show(string $extentions=null);

    public function delete(string $ramenId=null);

    public function edit(Ramen $ramen);
}
