<?php
class sport {
    var $feed;
    function sport($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $sport = simplexml_load_file($this->feed);
        $sport_split = array();
        foreach ($sport->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $sport_split[] = '
                            <div class="head-line">
                           <a href="'.$link.'" target="_blank" title=""><p class="line">' . $title . '</p></a>
                           </div>
            ';
        }
        return $sport_split;
    }
    function display($numrows, $head) {
        $sport_split = $this->parse();
        $i = 0;
        $sport_data = '
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $sport_data .= $sport_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=sport_200', '', $trim);
        $sport_data.='</div></div>';
        return $sport_data;
    }
}
?>
