<?php
class eco {
    var $feed;
    function eco($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $eco = simplexml_load_file($this->feed);
        $eco_split = array();
        foreach ($eco->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $eco_split[] = '
                           <div class="head-line">
                           <a href="'.$link.'" target="_blank" title=""><p class="line">' . $title . '</p></a>
                           </div>
            ';
        }
        return $eco_split;
    }
    function display($numrows, $head) {
        $eco_split = $this->parse();
        $i = 0;
        $eco_data = '
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $eco_data .= $eco_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=eco_200', '', $trim);
        $eco_data.='</div></div>';
        return $eco_data;
    }
}
?>
