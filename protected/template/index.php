<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>
<!DOCTYPE html>
<html lang="<?php echo $this->getLanguage(); ?>">
<head>
  <jdoc:include type="head" />
  <link rel="stylesheet" href="//twitter.github.com/bootstrap/assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo $this->baseurl; ?>/style/custom.css">

</head>

<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <h1>Welcome Joomla! Platform MVC Example</h1>
      </div>
    </div>
  </div>
  <div class="container">
    <jdoc:include type="component" />
  </div>
</body>

</html>