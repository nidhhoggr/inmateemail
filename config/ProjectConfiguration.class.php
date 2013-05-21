<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  protected $routing = null;

  public function setup()
  {
    $this->enablePlugins(array('sfDoctrinePlugin','sfDoctrineGuardPlugin'));
    $this->enablePlugins('sfJQueryDateTimeFormWidgetPlugin');
    $this->enablePlugins('sfSelectTimeInputJQueryTimePickerPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('jqGridAdminTemplatePlugin');
  }

  public function getEnvironmentRootUrl() {
    $env = $this->getEnvironment();
    $env = ($env=="prod")?'':'_'.$env;
    return $env;
  }

  public function generateUrl($app, $name, $parameters = array())
  {
    return '/'.$app.$this->getEnvironmentRootUrl().'.php' . strtolower($this->getRouting($app)->generate($name, $parameters));
  }

  public function getRouting($app)
  {
    if (!$this->routing[$app])
    {
      $this->routing[$app] = new sfPatternRouting(new sfEventDispatcher());

      $config = new sfRoutingConfigHandler();
      $routes = $config->evaluate(array(sfConfig::get('sf_apps_dir').'/'.$app.'/config/routing.yml'));

      $this->routing[$app]->setRoutes($routes);
    }

    return $this->routing[$app];
  }
}
