<?php
class mainsport {
    var $feed;
    function mainsport($feed) {
        $this->feed = $feed;
    }
    function parse() {
        $mainsport = simplexml_load_file($this->feed);
        $mainsport_split = array();
        foreach ($mainsport->channel->item as $item) {
            $title = (string) $item->title; // Title
            $link = (string) $item->link; // Url Link
            $image = $item->enclosure['url'];
            $datetime = date_create($item->pubDate);
            $date = date_format($datetime, 'd M Y, H\hi');
            $description = (string) $item->description; //Description
            $mainsport_split[] = '
                       
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
        return $mainsport_split;
    }
    function display($numrows, $head) {
        $mainsport_split = $this->parse();
        $i = 0;
        $mainsport_data = '
       
    <div class="vas">
           <div class="title-head">
         ' . $head . '
           </div>
         <div class="feeds-links">';

        while ($i < $numrows) {
            $mainsport_data .= $mainsport_split[$i];
            $i++;
        }
        $trim = str_replace('', '', $this->feed);
        $user = str_replace('&lang=en-us&format=mainsport_200', '', $trim);
        $mainsport_data.='</div></div>';
        return $mainsport_data;
    }
}
?>
