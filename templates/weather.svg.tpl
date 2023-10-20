<svg
   width="936"
   height="702"
   viewBox="0 0 936 702"
   version="1.1"
   id="weather"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:svg="http://www.w3.org/2000/svg">
  <defs
     id="defs1">
    <rect
       x="534.1142"
       y="56.222548"
       width="1020.8984"
       height="349.18874"
       id="rect1" />
  </defs>
  <g
     inkscape:label="Ebene 1"
     inkscape:groupmode="layer"
     id="layer_weather">
    <text
       xml:space="preserve"
       id="text1"
       style="font-size:29.6622px;white-space:pre;shape-inside:url(#rect1);display:inline;fill:#000000"
       transform="matrix(1.0277158,0,0,1.1324509,-144.00824,84.469506)"><tspan
         x="534.11328"
         y="83.284381"
         id="tspan2">Aktuelle Temperatur: <?= $this->e($currentTemperature) ?></tspan><tspan
         x="534.11328"
         y="120.36213"
         id="tspan4">Regenwahrscheinlichkeit: <?= $this->e($precipitation) ?></tspan></text>

    <?php $this->insert($currentWeatherSVG, ["x" => "65.596321", "y" => "97.400597", "width" => "200", "height" => "200"]) ?>
    <?php $this->insert($forecastWeatherSVG, ["x" => "553.17126", "y" => "414.16513", "width" => "200", "height" => "200"]) ?>
    <text
       xml:space="preserve"
       style="font-size:32px;fill:#000000"
       x="69.571854"
       y="443.27213"
       id="text3"><tspan
         sodipodi:role="line"
         id="tspan3"
         x="69.571854"
         y="443.27213">Wetter um <?= $this->e($forecastTime) ?> Uhr:</tspan></text>
  </g>
</svg>
