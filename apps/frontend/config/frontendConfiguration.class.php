<?php

class frontendConfiguration extends sfApplicationConfiguration
{

    public function configure()
    {
        $this->dispatcher->connect('view.configure_format', array($this, 'configureMobileFormat'));
    }

    public function configureMobileFormat(sfEvent $event)
    {
        $request = $event['request'];
        
        $request->setRequestFormat('mobile');
    }
}
