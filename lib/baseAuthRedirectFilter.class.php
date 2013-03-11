<?php
class baseAuthRedirectFilter extends sfFilter {

    public function execute ($filterChain) {

        $url = $this->getContext()->getUser()->getAuthRedirectUrl();
        $env = $this->getContext()->getConfiguration()->getEnvironmentRootUrl();

        if(!strstr($url,$this->getParameter('moduleRoot').$env.'.php') && !empty($url)) {
            $redirect_url = sfConfig::get('sf_app_root_path') . $url;
            $redirect_url = str_replace('//','/',$redirect_url);

            return $this->getContext()->getController()->redirect($redirect_url);
        }

        $filterChain->execute();
    }
}
