<?php

namespace aeCorp\aec_utils\aec_event;

interface EventSubscriberInterface
{
    public function getEvents() : array;
}