<?php
class baseAuthRedirectFilter extends sfFilter {

    public function execute ($filterChain) {

        $url = $this->getContext()->getUser()->getAuthRedirectUrl();

        if(!strstr($url,$this->getParameter('moduleRoot')) && !empty($url))
            return $this->getContext()->getController()->redirect($url);

        $filterChain->execute();
    }
}
