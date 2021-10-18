<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello!</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/resources/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/resources/favicon-16x16.png">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" id="site-theme" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  </head>
  <body>
    <button id="switch" onclick="toggleTheme()">Switch theme (beta)</button>
  <section class="section">
    <div class="container">
    <figure class="image is-3by1">
      <img id="logo-image" src="/resources/vicetrail-logo.svg">
    </figure>
    </div>
  </section>
  <section class="section">
      <div class="container">
        <?php require('layout/form.php') ?>
      </div>
  </section>
  <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column">
            <?php require('layout/table.php') ?>
          </div>
          <div class="column">
            <?php require('layout/general_stats.php') ?>
          </div>
        </div>
      </div>
  </section>
  </body>
  <script src="js/index.js"></script>
</html>