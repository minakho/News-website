<?php
class tech_favori {
    var $feed;
    function tech_favori($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $tech_favori = simplexml_load_file($this->feed);
        $tech_favori_split = array();
        foreach ($tech_favori->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $tech_favori_split[] = '
                           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-xxs-12">
                                <div class="tm-tours-box-2">	
                                    <a href="'.$link.'" target="_blank" title="" ><img src="'.$image.'" alt="image" class="img-responsive"></a>
                                    <div class="tm-tours-box-2-info">
                                        
                                            <h3 class="margin-bottom-15"><a href="'.$link.'" target="_blank" title="" ><strong><p>' . $title . '</p></strong></a></h3>
                                            <p>'.$date.'</p>
                                            <p> Partager : 
                                            <a href=" https://www.facebook.com/sharer/sharer.php?u='.$link.'" target="_blank" title="" ><i class="fa fa-facebook-square " aria-hidden="true"></i></a>
                                            <a href=" https://twitter.com/intent/tweet/?url='.$link.'" target="_blank" title="" ><i class="fa fa-twitter-square" aria-hidden="true" style="color:#36c6f3;"></i></a>
                                            <a href=" https://plus.google.com/share?url='.$link.'&hl={hl}" target="_blank" title="" ><i class="fa fa-google-plus-square" aria-hidden="true" style="color:#c13f3f;"></i></a>
                                            </p>
                                    </div>
                                    <a href="'.$link.'" class="tm-tours-box-2-link">Voir plus</a>
                                </div>
                            </div>
            ';
        }
        return $tech_favori_split;
    }
    function display($numrows, $head) {
        $tech_favori_split = $this->parse();
        $i = 0;
        $tech_favori_data = '
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $tech_favori_data .= $tech_favori_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=tech_favori_200', '', $trim);
        $tech_favori_data.='</div></div>';
        return $tech_favori_data;
    }
}
?>
