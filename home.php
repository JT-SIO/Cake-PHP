<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        ConnectionManager::get($name)->getDriver()->connect();
        // Pas d'exception signifie que la connexion a réussi
        $connected = true;
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();

        // Récupérer les détails de l'exception sans utiliser getAttributes()
        if ($connectionError instanceof PDOException) {
            // Si l'exception est liée à PDO, extraire des informations supplémentaires
            $errorInfo = $connectionError->errorInfo ?? null;
            if ($errorInfo && isset($errorInfo[2])) {
                $error .= '<br />' . $errorInfo[2];
            }
        }

        if ($name === 'debug_kit') {
            $error = 'Try adding your current <b>top level domain</b> to the
                <a href="https://book.cakephp.org/debugkit/5/en/index.html#configuration" target="_blank">DebugKit.safeTld</a>
            config and reload.';
            if (!in_array('sqlite', \PDO::getAvailableDrivers())) {
                $error .= '<br />You need to install the PHP extension <code>pdo_sqlite</code> so DebugKit can work properly.';
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CyberCafé Arras Games
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'home']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <h1>
                Arras Games 🍰
            </h1>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <div class="content">
                <div class="row">
                    <h1>Bienvenue</h1>
                    <nav class="top-nav">
                        <div class="top-nav-links">
                            <ul>
                            <li><a target="_blank" rel="noopener" href="http://localhost/e-commerce2/login/">Connexion</a></li>
                            <li><a target="_blank" rel="noopener" href="http://localhost/e-commerce2/forfait/index/">Forfait</a></li>
                            <li><a target="_blank" rel="noopener" href="http://localhost/e-commerce2/machine/index/">Machine</a></li>
                            <li><a target="_blank" rel="noopener" href="http://localhost/e-commerce2/inscriptions/index/">Inscriptions</a></li>
                            <li><a target="_blank" rel="noopener" href="http://localhost/e-commerce2/users/index/">Utilisateur</a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
