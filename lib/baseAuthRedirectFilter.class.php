<?php
class baseAuthRedirectFilter extends sfFilter {

    public function execute ($filterChain) {

        $url = $this->getContext()->getUser()->getAuthRedirectUrl();
        $env = $this->getContext()->getConfiguration()->getEnvironmentRootUrl();
        if(!strstr($url,$this->getParameter('moduleRoot').$env.'.php') && !empty($url))
            return $this->getContext()->getController()->redirect($url);

        $filterChain->execute();
    }
}
