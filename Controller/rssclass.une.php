<?php
class rss {
    var $feed;
    function rss($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $rss = simplexml_load_file($this->feed);
        $rss_split = array();
        foreach ($rss->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $rss_split[] = '
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                                <div class="tm-tours-box-2">	
                                    <a href="'.$link.'" target="_blank" title="" ><img src="'.$image.'" alt="image" class="img-responsive"></a>
                                    <div class="tm-tours-box-2-info">
                                        
                                            <h3 class="margin-bottom-15"><a href="'.$link.'" target="_blank" title="" ><strong><p>' . $title . '</p></strong></a></h3>
                                            <p>'.$date.'</p>
                                    </div>
                                    <a href="'.$link.'" class="tm-tours-box-2-link">Voir plus</a>
                                </div>
                            </div>
            ';
        }
        return $rss_split;
    }
    function display($numrows, $head) {
        $rss_split = $this->parse();
        $i = 0;
        $rss_data = '
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $rss_data .= $rss_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=rss_200', '', $trim);
        $rss_data.='</div></div>';
        return $rss_data;
    }
}
?>
