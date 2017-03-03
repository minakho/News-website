<?php
class maineco {
    var $feed;
    function maineco($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $maineco = simplexml_load_file($this->feed);
        $maineco_split = array();
        foreach ($maineco->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $maineco_split[] = '
                       
                        <div class="tm-about-box-2 margin-bottom-30">
							<a href="'.$link.'" target="_blank" title="" ><img src="'.$image.'" alt="image" class="tm-about-box-2-img img-responsive"></a>
							<div class="tm-about-box-2-text">
								<a href="'.$link.'" target="_blank" title="" ><h3 class="tm-about-box-2-title">' . $title . '</h3></a>
				                <p class="tm-about-box-2-description gray-text">'.$description.'</p>
				                <p class="tm-about-box-2-footer">'.$date.'</p>	
							</div>		                
						</div>
                       <br>
            ';
        }
        return $maineco_split;
    }
    function display($numrows, $head) {
        $maineco_split = $this->parse();
        $i = 0;
        $maineco_data = '
       
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $maineco_data .= $maineco_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=maineco_200', '', $trim);
        $maineco_data.='</div></div>';
        return $maineco_data;
    }
}
?>
