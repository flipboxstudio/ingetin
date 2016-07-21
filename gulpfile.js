var elixir = require('laravel-elixir');

elixir(function(mix) {
  mix.scripts('./node_modules/material-design-lite/material.js', './assets/js/material.js');
  mix.webpack(['./resources/js/app.js'], './assets/js/popup.js');
  mix.sass('./resources/sass/app.scss', './assets/css/popup.css')
});
