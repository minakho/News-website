<?php
class pol {
    var $feed;
    function pol($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $pol = simplexml_load_file($this->feed);
        $pol_split = array();
        foreach ($pol->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $pol_split[] = '
                        <div class="head-line">
                           <a href="'.$link.'" target="_blank" title=""><p class="line">' . $title . '</p></a>
                           </div>
            ';
        }
        return $pol_split;
    }
    function display($numrows, $head) {
        $pol_split = $this->parse();
        $i = 0;
        $pol_data = '
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $pol_data .= $pol_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=pol_200', '', $trim);
        $pol_data.='</div></div>';
        return $pol_data;
    }
}
?>
