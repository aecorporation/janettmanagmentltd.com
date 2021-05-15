<?php

namespace aeCorp\aec_utils\aec_chainactions;

Interface InterfaceActionsInChain {

    public function nextAction(InterfaceActionsInChain $actionInChain) : void;

    public function execute(array $request = []) :void;

}
