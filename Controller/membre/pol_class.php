<?php
class pol_class {
    var $feed;
    function pol_class($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $pol_class = simplexml_load_file($this->feed);
        $pol_class_split = array();
        foreach ($pol_class->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $pol_class_split[] = '
                       
                        <div class="tm-about-box-2 margin-bottom-30">
							<a href="'.$link.'" target="_blank" title="" ><img src="'.$image.'" alt="image" class="tm-about-box-2-img img-responsive"></a>
							<div class="tm-about-box-2-text">
								<a href="'.$link.'" target="_blank" title="" ><h3 class="tm-about-box-2-title">' . $title . '</h3></a>
				                <p class="tm-about-box-2-description gray-text">'.$description.'</p>
				                <p class="tm-about-box-2-footer">'.$date.' | Partager : 
                                            <a href=" https://www.facebook.com/sharer/sharer.php?u='.$link.'" target="_blank" title="" ><i class="fa fa-facebook-square " aria-hidden="true"></i></a>
                                             <a href=" https://twitter.com/intent/tweet/?url='.$link.'" target="_blank" title="" ><i class="fa fa-twitter-square" aria-hidden="true" style="color:#36c6f3;"></i></a>
                                            <a href=" https://plus.google.com/share?url='.$link.'&hl={hl}" target="_blank" title="" ><i class="fa fa-google-plus-square" aria-hidden="true" style="color:#c13f3f;"></i></a>
                                </p>	
							</div>		                
						</div>
                       <br>
            ';
        }
        return $pol_class_split;
    }
    function display($numrows, $head) {
        $pol_class_split = $this->parse();
        $i = 0;
        $pol_class_data = '
       
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $pol_class_data .= $pol_class_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=pol_class_200', '', $trim);
        $pol_class_data.='</div></div>';
        return $pol_class_data;
    }
}
?>
