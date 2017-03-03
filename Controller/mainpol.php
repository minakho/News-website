<?php
class mainpol {
    var $feed;
    function mainpol($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $mainpol = simplexml_load_file($this->feed);
        $mainpol_split = array();
        foreach ($mainpol->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $mainpol_split[] = '
                       
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
        return $mainpol_split;
    }
    function display($numrows, $head) {
        $mainpol_split = $this->parse();
        $i = 0;
        $mainpol_data = '
       
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $mainpol_data .= $mainpol_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=mainpol_200', '', $trim);
        $mainpol_data.='</div></div>';
        return $mainpol_data;
    }
}
?>
