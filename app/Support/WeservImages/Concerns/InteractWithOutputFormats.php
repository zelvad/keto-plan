<?php

namespace Support\WeservImages\Concerns;

use Support\WeservImages\Enums\Output;

trait InteractWithOutputFormats
{
    public function jpg()
    {
        return $this->output(Output::JPG);
    }

    public function webp()
    {
        return $this->output(Output::WEBP);
    }
}
