<?php

namespace App\Models;

interface HasStartTime
{
    public function getStartsAt() : \DateTimeInterface;
}