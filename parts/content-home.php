<?php
echo '<article id="post-' . get_the_ID() . '" role="article">';
echo '<header class="article-header text-center">';
$mHeadlineStyle	 = get_field( "m_headline_style" );
if ($mHeadlineStyle) {
    $mHeadlineStyle = $mHeadlineStyle;
  } else {
    $mHeadlineStyle = "p";
  }
$mHeadlineSize = get_field( "m_headline_size" );
if ($mHeadlineSize) {
    $mHeadlineSize = $mHeadlineSize;
  } else {
    $mHeadlineSize = "15";
  }
$mheadlineColor	= get_field( "m_headline_color" );
if ($mheadlineColor) {
    $mheadlineColor = $mheadlineColor;
  } else {
    $mheadlineColor = "#000";
  }
$mStyle = ' style="font-size:'.$mHeadlineSize.'px; color:'.$mheadlineColor.'"';
echo '<'. $mHeadlineStyle . $mStyle .'>' . get_the_title() . '</'. $mHeadlineStyle .'>';
echo '</header></article>';