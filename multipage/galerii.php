<?php

require_once('head.html');

?>

<div id="wrap">
	<h3>Fotod</h3>
	<div id="gallery">
	    <?php
		    $pildid= array (
			    array('pilt'=>"pildid/nameless1.jpg", 'alt'=>'nimetu 1'),
				array('pilt'=>'pildid/nameless2.jpg', 'alt'=>'nimetu 2'),
				array('pilt'=>'pildid/nameless3.jpg', 'alt'=>'nimetu 3'),
				array('pilt'=>'pildid/nameless4.jpg', 'alt'=>'nimetu 4'),
				array('pilt'=>'pildid/nameless5.jpg', 'alt'=>'nimetu 5'),
				array('pilt'=>'pildid/nameless6.jpg', 'alt'=>'nimetu 6'),
			);
			
		    foreach ($pildid as $pilt) {
				echo $pilt['pilt'];
			}
		?>
		
		<img src="pildid/nameless1.jpg" alt="nimetu 1" />
		<img src="pildid/nameless2.jpg" alt="nimetu 2" />
		<img src="pildid/nameless3.jpg" alt="nimetu 3" />
		<img src="pildid/nameless4.jpg" alt="nimetu 4" />
		<img src="pildid/nameless5.jpg" alt="nimetu 5" />
		<img src="pildid/nameless6.jpg" alt="nimetu 6" />
	</div>
</div>

<?php

require_once('foot.html');

?>