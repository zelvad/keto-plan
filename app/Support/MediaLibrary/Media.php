<?php

namespace Support\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use Support\WeservImages\WeservImages;

class Media extends BaseMedia
{
    private bool $withCropping = true;

    public function extra(array $extra): self
    {
        $this->extra = $extra; // @phpstan-ignore-line

        return $this;
    }

    public function withoutCropping(): self
    {
        $this->withCropping = false;

        return $this;
    }

    public function withCropping(): self
    {
        $this->withCropping = true;

        return $this;
    }

    public function getWidth(): int
    {
        return (int) $this->getCustomProperty('width', 0);
    }

    public function getHeight(): int
    {
        return (int) $this->getCustomProperty('height', 0);
    }

    public function getCaption(): ?string
    {
        return $this->getCustomProperty('caption');
    }

    public function toWeservImage(): WeservImages
    {
        $url = weserv($this->getUrl());
        $manipulations = $this->manipulations['*'] ?? [];

        if ($this->withCropping) {
            $cropData = array_filter([
                $manipulations['cropX'] ?? null,
                $manipulations['cropY'] ?? null,
                $manipulations['cropWidth'] ?? null,
                $manipulations['cropHeight'] ?? null,
            ], fn ($val) => !is_null($val));

            if (count($cropData) === 4) {
                $url->crop(...$cropData)->precrop();
            }
        }

        return $url;
    }
}
