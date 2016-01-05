<?php
	


?>

<div class="row">

	<?php

		foreach($model as $data) {

			echo $this->render('productbox', ['model' => $data]);
		}

	?>

</div>