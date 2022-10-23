<?php

namespace Support\WeservImages\Concerns;

use Support\WeservImages\Enums\Fit;

trait InteractWithFitFormats
{
    public function fitCover()
    {
        return $this->fit(Fit::COVER);
    }

    public function fitOutside()
    {
        return $this->fit(Fit::OUTSIDE);
    }

    public function fitInside()
    {
        return $this->fit(Fit::OUTSIDE);
    }

    public function fitContain()
    {
        return $this->fit(Fit::CONTAIN);
    }
}
