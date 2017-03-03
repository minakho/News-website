<?php
class maintech {
    var $feed;
    function maintech($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $maintech = simplexml_load_file($this->feed);
        $maintech_split = array();
        foreach ($maintech->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $maintech_split[] = '
                       
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
        return $maintech_split;
    }
    function display($numrows, $head) {
        $maintech_split = $this->parse();
        $i = 0;
        $maintech_data = '
       
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $maintech_data .= $maintech_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=maintech_200', '', $trim);
        $maintech_data.='</div></div>';
        return $maintech_data;
    }
}
?>
