<?php
class une {
    var $feed;
    function une($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $une = simplexml_load_file($this->feed);
        $une_split = array();
        foreach ($une->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $une_split[] = '
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
        return $une_split;
    }
    function display($numrows, $head) {
        $une_split = $this->parse();
        $i = 0;
        $une_data = '
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $une_data .= $une_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=une_200', '', $trim);
        $une_data.='</div></div>';
        return $une_data;
    }
}
?>
