<?php
class techno {
    var $feed;
    function techno($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $techno = simplexml_load_file($this->feed);
        $techno_split = array();
        foreach ($techno->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $techno_split[] = '
                            <div class="head-line">
                           <a href="'.$link.'" target="_blank" title=""><p class="line">' . $title . '</p></a>
                           </div>
            ';
        }
        return $techno_split;
    }
    function display($numrows, $head) {
        $techno_split = $this->parse();
        $i = 0;
        $techno_data = '
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $techno_data .= $techno_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=techno_200', '', $trim);
        $techno_data.='</div></div>';
        return $techno_data;
    }
}
?>
